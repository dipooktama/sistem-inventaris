@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4">Devices</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-col justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Input new device</h2>

        </div>
        <form action="{{ route('communication.store') }}" method="POST">
            @csrf
            <div class="flex flex-col mt-2">
                <label for="group">Group:</label>
                <input type="text" name="group" id="group" class="border border-black">
            </div>
            <div class="flex flex-col mt-2">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="border border-black">
            </div>
            <div class="flex flex-col mt-2">
                <label for="deviceGroup">Device Group:</label>
                <input type="text" name="deviceGroup" id="deviceGroup" class="border border-black">
            </div>
            <button type="submit" class="
            mb-2 mt-4 px-2 py-1
            hover:bg-[#0e0e0e] hover:text-white
            border border-black rounded-lg
            ">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
