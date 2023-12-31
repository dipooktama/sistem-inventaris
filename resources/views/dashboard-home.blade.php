@extends('layouts.dashboard')

@section('content')
<h2 class="text-center font-bold text-4xl my-4">Dashboard</h2>
<div class="flex flex-wrap justify-center items-center space-x-4">
    @foreach ($navMenu as $index => $item)
        @if ($index == 0)
            @continue
        @endif
        
        <div class="bg-white rounded-lg shadow-lg p-4 mt-4">
            <h2 class="text-xl font-semibold mb-2">{{ $item['name'] }}</h2>
            <p class="text-gray-600">
                A summary of data from each section would be put here.
            </p>
        </div>
    @endforeach
</div>
@endsection
