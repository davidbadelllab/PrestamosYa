<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-r from-green-100 to-blue-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg">
        <div class="text-center mb-6">
            <span class="text-5xl">👋</span>
            <h1 class="text-3xl font-semibold text-gray-700 mt-3">Create Your Account!</h1>
            <p class="text-gray-500">Let's get you started</p>
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">🙍‍♂️ Name</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">📧 Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">🔑 Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">🔒 Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Terms & Privacy -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <label for="terms" class="flex items-center">
                        <input type="checkbox" name="terms" id="terms" required class="mr-2">
                        <span class="text-sm text-gray-600">
                            I agree to the <a href="{{ route('terms.show') }}" target="_blank" class="underline text-blue-500 hover:text-blue-700">Terms of Service</a> and
                            <a href="{{ route('policy.show') }}" target="_blank" class="underline text-blue-500 hover:text-blue-700">Privacy Policy</a>
                        </span>
                    </label>
                </div>
            @endif

            <!-- Register Button -->
            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">
                    Already registered?
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold transition duration-300">
                    🚀 Register
                </button>
            </div>


            </div>
        </form>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
