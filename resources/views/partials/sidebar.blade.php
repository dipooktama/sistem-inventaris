<nav id="navSidebar" class="
    flex flex-col bg-[#0e0e0e] grow
    duration-500 text-gray-100
    min-h-full transition-all
    w-64 opacity-100 translate-x-0
">
    <h2 class="pl-4 pt-5 pb-3 font-extrabold text-lg">Menu</h2>
    <hr>
    <ul class="flex flex-col relative">
        @foreach ($navMenu as $navItem)
            <li class="
                hover:bg-gray-100 hover:text-gray-800
                pl-4 py-2
            ">
                <a href={{ $navItem['route'] }} class="flex flex-row h-max">
                    {{ $navItem['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
