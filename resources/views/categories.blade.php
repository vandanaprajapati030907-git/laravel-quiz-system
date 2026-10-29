<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title>Categories</title>
        @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name={{$name}}></x-navbar>
   
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md">

        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8"> Add  </h2>
        @if (session('success'))
    <p class="text-green-600 mb-4">
        {{ session('success') }}
    </p>
@endif
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 p-3 text-red-700">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
        <form action="{{ url('/admin-categories') }}" method="POST" class="space-y-5">
            @csrf
            <div>

                <input type="text" name="Category"
                placeholder="Enter Category name"
                class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
</div>

            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-medium transition duration-200">
                Add
            </button>

        </form>
<div class="mt-8">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">
        All Categories
    </h3>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-3 py-2">ID</th>
                    <th class="border border-gray-300 px-3 py-2">Category Name</th>
                    <th class="border border-gray-300 px-3 py-2">Creator</th>
                    <th class="border border-gray-300 px-3 py-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="border border-gray-300 px-3 py-2">
                            {{ $category->id }}
                        </td>
                        <td class="border border-gray-300 px-3 py-2">
                            {{ $category->name }}
                        </td>
                        <td class="border border-gray-300 px-3 py-2">
                            {{ $category->creater }}
                        </td>
                
                            <td class="border border-gray-300 px-3 py-2 text-center">
    <form action="{{ url('/admin-categories/' . $category->id) }}"
          method="POST"
          onsubmit="return confirm('Are you sure you want to delete this category?');">
        @csrf
        @method('DELETE')

        <button type="submit"
                title="Delete category"
                class="text-gray-700 hover:text-red-600">
             <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#1f1f1f"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg>
        </button>
    </form>
</td>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border border-gray-300 px-3 py-3 text-center text-gray-500">
                            No categories added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>
</body>
</html>
