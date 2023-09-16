<header class="px-4 py-4 flex justify justify-between items-center top-0 bg-white shadow-md">
    <div class="flex">
        <button id="sidebarToggle"
            class="border mr-4 transition-all"
            aria-label="Toogle Sidebar"
            data-toggled="true"
        >
            <span id="toggleIconContainer"></span>
        </button>

        <h1 class="mr-2 text-gray-800">{{ $siteName }}</h1>
    </div>

    <p class="text-sm"><span id="date">Jan 01, 2023</span> - <span id="clock">12:00:00 AM</span></p>

    <div class="flex flex-row">
        <p class="ml-2 text-gray-800">Hello Admin</p>
    </div>
</header>
