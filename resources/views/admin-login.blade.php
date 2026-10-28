<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md">

        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8"> Admin Login </h2>
        <form action="/Admin-Login" method="POST" class="space-y-5">
            @csrf
            
           @if ($errors->has('login'))
           <div class="text-red-500 text-sm">
            {{ $errors->first('login') }}
             </div>
              @endif

            <div>
                <label for="admin_name" class="block text-gray-600 mb-2"> Admin name</label>

                <input type="text" id="admin_name" name="admin_name"
                placeholder="Enter Admin name"
                class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                @error('name')
                <div class="text-red-500">{{$massge}}</div>
                @enderror
            </div>

            <div>
                <label for="password"
                    class="block text-gray-600 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Admin password"
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                     @error('password')
                <div class="text-red-500">{{$massge}}</div>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-medium transition duration-200">
                Login
            </button>

        </form>
    </div>

</body>
</html>