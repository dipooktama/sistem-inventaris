@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4">Communication</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-row justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Data Summary</h2>
            <a href="/communication/create">
            <button class="
                mb-2 px-2 py-1
                hover:bg-[#0e0e0e] hover:text-white
                border border-black rounded-lg
            ">
                +New Input
            </button></a>
        </div>
        <!--p class="text-gray-600">
            A summary of data from each section would be put here.
        </p-->
        <table>
            <thead></thead>
            <tbody>
                @foreach ($listCom as $item)
                    <tr>
                        <td>{{ $item.id }}</td>
                        <td>{{ $item.device_uuid }}</td>
                        <td>{{ $item.activities }}</td>
                        <td>{{ $item.minutes }}</td>
                        <td>{{ $item.time_category }}</td>
                        <td>{{ $item.total_minutes_in_year }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
