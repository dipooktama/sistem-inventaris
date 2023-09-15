@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4">{{ $group }}</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-col justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Create New Job Task/Activity</h2>

        </div>
        <form action="{{ $actionUrl }}" method="POST">
            @csrf
            <div class="flex flex-col mt-2">
                <label for="activities">Job Task/Activity :</label>
                <textarea name="activities" id="activities" cols="30" rows="5" class="border border-black" required></textarea>
            </div>
            <div class="flex flex-col mt-2">
                <label for="hasil">Hasil Pembacaan :</label>
                <input type="text" name="hasil" id="hasil" class="border border-black" required>
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
