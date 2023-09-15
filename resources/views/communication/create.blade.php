@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4">Communication</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-col justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Input new activities</h2>

        </div>
        <form action="{{ route('device.store') }}" method="POST">
            @csrf
            <div class="flex flex-col mt-2">
                <label for="device_uuid">Select Device:</label>
                <select name="device_uuid" id="device_uuid" class="form-control">
                    @foreach ($listDevice as $device)
                        <option value="{{ $device->id }}">{{ $device->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col mt-2">
                <label for="activities">Activity:</label>
                <textarea name="activities" id="activities" cols="30" rows="5" class="border border-black"></textarea>
            </div>
            <div class="flex flex-col mt-2">
                <label for="minutes">minute:</label>
                <input type="number" name="minutes" id="minutes" class="border border-black">
            </div>
            <div class="flex flex-col mt-2">
                <label>Time Category:</label>
                <div class="form-check">
                    <input type="radio" name="time_category" value="daily" id="daily" class="form-check-input" required>
                    <label for="daily" class="form-check-label">Daily</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="time_category" value="weekly" id="weekly" class="form-check-input" required>
                    <label for="weekly" class="form-check-label">Weekly</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="time_category" value="monthly" id="monthly" class="form-check-input" required>
                    <label for="monthly" class="form-check-label">Monthly</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="time_category" value="yearly" id="yearly" class="form-check-input" required>
                    <label for="yearly" class="form-check-label">Yearly</label>
                </div>
            </div>
            <div class="flex flex-col mt-2">
                <label for="total_minutes_in_year">Total Minutes:</label>
                <input type="number" name="total_minutes_in_year" id="total_minutes_in_year" class="border border-black">
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
