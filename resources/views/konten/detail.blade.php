@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4 capitalize">{{ $group }}</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-row justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Job Activities for {{ $device }}</h2>
            <a href="/communication/createActivity?device={{ $device_id }}">
            <button class="
                mb-2 px-2 py-1
                hover:bg-[#0e0e0e] hover:text-white
                border border-black rounded-lg
            ">
                +Tambah Job Task/Activities
            </button></a>
        </div>
        <!--p class="text-gray-600">
            A summary of data from each section would be put here.
        </p-->
        <table class="min-w-full divide-y divide-gray-200 border table-fixed">
            <thead>
                @php
                    // todo: nanti dipindahin ke tempat yg bener
                    $tableHeader = ['No', 'Job Task/Activities', 'Hasil Pembacaan']
                @endphp
                @foreach ($tableHeader as $item)
                    <th class="p-2">{{ $item }}</th>
                @endforeach
            </thead>
            <tbody>
                @if ($listCom->isEmpty())
                    <tr>
                        <td colspan="3" class="p-4 text-lg text-center">
                            Belum ada data...<br />
                            <a href="/communication/createActivity?device={{ $device_id }}"
                                class="py-2 px-1 underline hover:text-blue-600">
                                buat baru disini
                            </a>
                        </td>
                    </tr>
                @else
                    @foreach ($listCom as $index => $item)
                        <tr>
                            <td class="p-2 w-20 text-center">{{ $index+1 }}</td>
                            <td class="p-2 w-80 text-center">{{ $item->activities }}</td>
                            <td class="p-2 w-40 text-center">{{ $item->hasil }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
