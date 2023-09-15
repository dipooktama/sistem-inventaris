<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $siteName }}</title>
</head>
<body>
    @include('partials.topbar')

    <div class='container-fluid'>
        <div class="flex flex-row min-h-screen">
            @include('partials.sidebar')
            <div class="min-h-full w-full flex flex-col overflow-auto">
                <main class="
                    col-md-9 ml-sm-auto col-lg-10
                    container mx-auto h-5/6 max-w-full
                    px-4 py-4 transition-all overflow-auto
                ">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>

<script>
    // timer & calendar
    function updateDateAndClock() {
        const clockElement = document.getElementById('clock');
        const dateElement = document.getElementById('date');

        // get clock
        const currentTime = new Date();
        const hours = currentTime.getHours().toString().padStart(2,'0');
        const minutes = currentTime.getMinutes().toString().padStart(2,'0');
        const seconds = currentTime.getSeconds().toString().padStart(2,'0');
        const amPM = hours >= 12 ? 'PM' : 'AM';
        const timeString = `${hours}:${minutes}:${seconds} ${amPM}`;

        // get day
        const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
        const dateString = currentTime.toLocaleDateString('id-ID', options);

        clockElement.textContent = timeString;
        dateElement.textContent = dateString;
    }

    setInterval(updateDateAndClock, 1000);

    updateDateAndClock();

    // sidebar toggle
    function getSVGicon1() {
        return `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M10.21 14.77a.75.75 0 01.02-1.06L14.168 10 10.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M4.21 14.77a.75.75 0 01.02-1.06L8.168 10 4.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
        `;
    }

    function getSVGicon2() {
        return `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M15.79 14.77a.75.75 0 01-1.06.02l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 111.04 1.08L11.832 10l3.938 3.71a.75.75 0 01.02 1.06zm-6 0a.75.75 0 01-1.06.02l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 111.04 1.08L5.832 10l3.938 3.71a.75.75 0 01.02 1.06z" clip-rule="evenodd" />
        </svg>
        `;
    }

    const sidebarToggle = document.getElementById('sidebarToggle');
    const toggleIconContainer = document.getElementById('toggleIconContainer');
    const navSidebar = document.getElementById('navSidebar');
    let isToggled = false; // initial state

    sidebarToggle.addEventListener('click', function() {
        //console.log(isToggled);
        isToggled = !isToggled;
        //console.log(isToggled);
        const iconSvg = isToggled ? getSVGicon2() : getSVGicon1();
        toggleIconContainer.innerHTML = iconSvg;
        navSidebar.classList.toggle('navHide');
    });

    toggleIconContainer.innerHTML = getSVGicon2(); // initial state render
</script>
</html>
