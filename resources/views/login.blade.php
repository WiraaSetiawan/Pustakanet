<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- 
        COLOR PALLETE
        SECONDARY = #96EFFF
        PRIMARY = #5FBDFF
        DARK = #7B66FF
        LIGHT = #C5FFF8
     -->
     <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,200&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#96EFFF] to-[#7B66FF] min-h-screen">

    <div class="flex flex-col items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Login</h2>

        <form class="flex flex-col" method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="username" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Username" required>
        <input type="password" name="password" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Password" required>
            <div class="flex items-center justify-between flex-wrap">
                <label for="remember-me" class="text-sm text-gray-900 cursor-pointer">
                <input type="checkbox" id="remember-me" class="mr-2">
                Remember me
                </label>
                <a href="#" class="text-sm text-blue-500 hover:underline mb-0.5">Forgot password?</a>
                <p class="text-gray-900 mt-4"> Don't have an account? <a href="/register" class="text-sm text-blue-500 -200 hover:underline mt-4">Signup</a></p>
            </div>
            @if($errors->has('error'))
        <span class="text-red-500">{{ $errors->first('error') }}</span>
           @endif
        <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">Login</button>
        </form>
    </div>
    </div>
</body>
</html>