<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Baloo 2', sans-serif;
        }
    </style>
    <title>Munal Stores | Register</title>
</head>

<body class="bg-gray-100">

    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex justify-center items-center h-full">
                <div class="w-full max-w-md">

                    <!-- Alert -->
                    <div class="fixed bottom-0 right-0 mb-4 mr-4" id="alert">
                        <!-- Display your alert here as needed -->
                    </div>

                    <div class="bg-white rounded-lg p-8 shadow-md">
                        <h2 class="text-center text-2xl font-bold mb-6">Create Your Account</h2>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                                <strong>Oh sorry!</strong> There were some issues with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <!-- Full Name input -->
                                <div>
                                    <input id="name" name="name" type="text" required
                                        class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600"
                                        placeholder="{{ __('Full Name') }}" />
                                </div>

                                <!-- User Name input -->
                                <div>
                                    <input id="username" name="username" type="text" required
                                        class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600"
                                        placeholder="{{ __('User Name') }}" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <!-- Email input -->
                                <div>
                                    <input id="email" name="email" type="text" required
                                        class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600"
                                        placeholder="{{ __('Email Address') }}" />
                                </div>

                                <!-- Phone Number input -->
                                <div>
                                    <input id="phone" name="phone" type="number" required
                                        class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600"
                                        placeholder="{{ __('Phone Number') }}" />
                                </div>
                            </div>

                            <!-- Password input -->
                            <div class="mb-4">
                                <input id="password" name="password" type="password" required
                                    class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600"
                                    placeholder="{{ __('Password') }}" />
                            </div>

                            <!-- Confirm Password input -->
                            <div class="mb-4">
                                <input id="password-confirm" type="password" name="password_confirmation" required
                                    class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600"
                                    placeholder="{{ __('Confirm Password') }}" />
                            </div>

                            <!-- Gender input -->
                            <div class="mb-4">
                                <select name="gender" id="gender"
                                    class="form-input w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-600">
                                    <option value="" disabled selected class="text-gray-700 bg-white">--Select
                                        Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="inline-block px-7 py-3 bg-green-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>

                        <p class="text-sm font-semibold mt-4">
                            Already Registered?
                            <a href="{{ route('login') }}"
                                class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">{{ __('Login') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        setTimeout(function() {
            $("#alert").slideUp();
        }, 3000);
    </script>

</body>

</html>
