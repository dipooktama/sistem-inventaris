@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4 capitalize">{{ $group }}</h2>
<div class="flex flex-wrap
    justify-center items-center
    space-x-4
">
    <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-full">
        <div class="flex flex-col justify justify-between">
            <h2 class="text-xl font-semibold mb-2">Update User {{ $userValues->name }}</h2>

        </div>
        <form action="{{ $actionUrl }}" method="POST">
            @csrf
            <div class="flex flex-col mt-2">
                <label for="username">New Username :</label>
                <input type="text" name="username" id="username" class="border border-black" placeholder="{{ $userValues->username }}" value="{{ $userValues->username }}" required>
            </div>
            <div class="flex flex-col mt-2">
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" class="border border-black" placeholder="{{ $userValues->name }}" value="{{ $userValues->name }}" required>
            </div>
            <div class="flex flex-col mt-2">
                <label for="position">Position (Jabatan) :</label>
                <input type="text" name="position" id="position" class="border border-black" placeholder="{{ $userValues->position }}" value="{{ $userValues->position }}" required>
            </div>
            <div class="flex flex-col mt-2">
                <label for="role">Role :</label>
                <select name="role" id="role" required>
                    @foreach ($listRole as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <!--div class="flex flex-col mt-2">
                <label for="password">New Password :</label>
                <input type="password" name="password" id="password" class="border border-black" placeholder="New Password" required>
            </div-->
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
