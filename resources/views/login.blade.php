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
    <main class="py-4 px-4 flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg p-4 mt-4 w-80 h-100">
            <h1 class="text-3xl text-center font-semibold mb-2">Login</h1>
            <form action="#" method="POST" class="py-4 px-2 my-2 mx-2">
                <label for="username" class="flex flex-col my-4">Username
                    <input type="text" name="username" id="username" placeholder="Username" required
                        class="border border-black rounded"/>
                </label>
                <label for="password" class="flex flex-col my-4">Password
                    <input type="password" name="password" id="password" placeholder="Password" required
                        class="border border-black rounded"/>
                </label>

                <button type="submit" class="
                    w-full mt-4 py-2 px-4
                    bg-blue-600 rounded-lg text-white border
                    hover:bg-white hover:border-blue-600 hover:text-gray-600">
                    Login
                </button>
            </form>
        </div>
    </main>
</body>
</html>
