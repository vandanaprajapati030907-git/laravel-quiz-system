<nav class="bg-white shadow-md px-4 py-3">
    <div class="flex justify-between items-center">
        <div class="text-2xl text-gray-700 hover:text-blue-500">
            Quiz-System
        </div>

        <div class="space-x-4">
            <a class="text-gray-700 hover:text-blue-500"
               href="{{ url('/dashboard') }}">
                Dashboard
            </a>

            <a class="text-gray-700 hover:text-blue-500"
               href="{{ url('/admin-categories') }}">
                Categories
            </a>

            <a class="text-gray-700 hover:text-blue-500"
               href="{{ url('/admin-quiz') }}">
                Quiz
            </a>

            <span class="text-gray-700">
             Welcome, {{ $name }}
            </span>

            <a class="text-gray-700 hover:text-blue-500"
               href="{{ url('/Admin-Login') }}">
                Logout
            </a>
        </div>
    </div>
</nav>
