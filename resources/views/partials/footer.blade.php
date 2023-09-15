@php
    $currentYear = date('Y');
    $version = '1.0.0';
@endphp

<footer class="
    px-4 py-4 flex
    justify-between items-center
    mb-0 mt-auto bg-gray-100 h-20
    relative drop-shadow-[0 -6px 4px rgba(0, 0, 0, 0.07)]
">
    <div class="flex items-center">
        <p class="mr-2">
            Copyright &copy; {{ $currentYear }} {{ $siteName }}
        </p>
    </div>

    <div class="text-right">
        <p class="text-sm">Version {{ $version }}</p>
    </div>
</footer>
