@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4 capitalize">{{ $group }}</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-row justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Data Summary</h2>
            <a href="{{ '/'.$group.'/create' }}">
            <button class="
                mb-2 px-2 py-1
                hover:bg-[#0e0e0e] hover:text-white
                border border-black rounded-lg noCopy
            ">
                +New Input
            </button></a>
        </div>
        <!--p class="text-gray-600">
            A summary of data from each section would be put here.
        </p-->
        <table class="min-w-full divide-y divide-gray-200 border table-fixed">
            <thead>
                @php
                    // todo: nanti dipindahin ke tempat yg bener
                    $tableHeader = ['No', 'Peralatan', 'Merk/Type', 'Freq (MHz)', 'Action']
                @endphp
                @foreach ($tableHeader as $item)
                    @if ($item == 'Action')
                        <th class="p-2 noCopy">{{ $item }}</th>
                    @else
                        <th class="p-2">{{ $item }}</th>
                    @endif
                @endforeach
            </thead>
            <tbody>
                @foreach ($listCom as $index => $item)
                    <tr>
                        <td class="p-2 w-20 text-center">{{ $index+1 }}</td>
                        <td class="p-2 w-80 text-center">{{ $item['name'] }}</td>
                        <td class="p-2 w-80 text-center">{{ $item['merk_type'] }}</td>
                        <td class="p-2 w-40 text-center">{{ $item['freq'] }}</td>
                        <td class="p-2 w-80 text-center">
                            <div class="w-full flex flex-row justify-center gap-4 noCopy">
                                <a href="/communication/detail?device={{ $item['id'] }}">
                                    <button class="
                                        border border-black
                                        rounded-lg px-2 py-1 text-center
                                        hover:bg-slate-800 hover:text-slate-300
                                    ">
                                        Detail
                                    </button>
                                </a>
                                <a href="/communication/update?device={{ $item['id'] }}">
                                    <button class="
                                        border border-black
                                        rounded-lg px-2 py-1 text-center
                                        hover:bg-slate-800 hover:text-slate-300
                                    ">
                                        Update
                                    </button>
                                </a>
                                <button id="deleteButton-{{ $index+1 }}" class="
                                    border border-black
                                    rounded-lg px-2 py-1 text-center
                                    hover:bg-red-600 hover:text-white"
                                    data-id="{{ $item['id'] }}"
                                    >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id='deleteModal' class="container min-w-full fixed inset-0 flex items-center justify-center z-10 hidden">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="bg-white p-6 rounded shadow-md z-10">
        <div class="flex justify-center mb-4">
            <p>Are you sure?</p>
        </div>
        <div class="flex justify-center gap-4 px-4">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="
                    rounded px-4 py-2
                    outline outline-1 outline-green-400
                    bg-white text-slate-800
                    hover:bg-green-400 hover:text-slate-200"
                >Delete</button>
            </form>
            <button class="
                w-1/2 rounded px-4 py-2
                outline outline-1 outline-red-400
                bg-white text-slate-800
                hover:bg-red-400 hover:text-slate-200"
                onclick="cancelDelete()"
            >No</button>
        </div>
    </div>
</div>

<script>
    const deleteButtons = document.querySelectorAll('[id^="deleteButton-"]'); // Select all buttons with IDs starting with "deleteButton-"

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', async function() {
            console.log('clicked');
            const id = button.getAttribute('data-id'); // Retrieve the data-id attribute value from the clicked button
            document.getElementById('deleteModal').classList.remove('hidden');
            const form = document.getElementById('deleteForm');
            form.action = `/surveillance/delete?device=${id}&group=surveillance`;
        });
    });

    async function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    async function cancelDelete() {
        hideDeleteModal();
    }
</script>
@endsection
