@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4 capitalize">{{ $group }}</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-col justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Input New Device</h2>

        </div>
        <form action="{{ $actionUrl }}" method="POST">
            @csrf
            <div class="flex flex-col mt-2">
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" class="border border-black" placeholder="Nama Perangkat" required>
            </div>
            <div class="flex flex-col mt-2">
                <label for="merk_type">Merk/Type :</label>
                <input type="text" name="merk_type" id="merk_type" class="border border-black" placeholder="PAE/T6T" required>
            </div>
            <div class="flex flex-col mt-2">
                <label for="freq">Frequency (MHz) :</label>
                <input type="text" name="freq" id="freq" class="border border-black" placeholder="118.3" required>
            </div>
            <button type="submit" class="
            mb-2 mt-8 px-2 py-2 w-full
            hover:bg-[#0e0e0e] hover:text-white
            border border-black rounded-lg
            ">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
