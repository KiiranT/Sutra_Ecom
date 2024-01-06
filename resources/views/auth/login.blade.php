<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add link to Baloo 2 font -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Baloo 2', sans-serif;
        }
    </style>
    <title>Munal Stores | Login</title>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-8 mt-16">
        @if (session('success'))
            <div class="bg-green-500 text-white font-bold rounded-lg px-4 py-3 shadow-md mb-2 w-64 sm:w-96">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @elseif (session('error'))
            <div class="bg-red-500 text-white font-bold rounded-lg px-4 py-3 shadow-md mb-2 w-64 sm:w-96">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <div class="max-w-lg mx-auto bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Welcome to <a href="{{ route('front.home') }}"
                    class="text-blue-900">Munal Stores</a>! Please login</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input id="email" name="email" type="text"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="{{ __('Email Address') }}" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input id="password" name="password" type="password"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="{{ __('Password') }}" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <input type="checkbox" onclick="togglePasswordVisibility()"
                        class="mt-2 text-sm text-gray-600 cursor-pointer"> Show 
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-blue-600 border rounded focus:outline-none focus:ring focus:border-blue-300" />
                        <label for="remember" class="ml-2 text-sm text-gray-600">Remember Me</label>
                    </div>
                    {{-- <a href="{{ route('password.request') }}" class="text-sm text-blue-600">Forgot Your Password?</a> --}}
                </div>

                <button type="submit"
                    class="w-full mt-4 bg-green-500 text-white font-medium py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:border-blue-300">
                    {{ __('Login') }}
                </button>

                <p class="text-sm mt-4">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700">
                        {{ __('Register') }}
                    </a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>
