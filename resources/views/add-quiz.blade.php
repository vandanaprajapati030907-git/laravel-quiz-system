<!DOCTYPE html>
<html>
<head>
    <title>Add Quiz</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar :name="$name" />

    <div class="p-8">
        <h1 class="text-2xl font-bold">Add Quiz</h1>
        <p>Welcome, {{ $name }}</p>
    </div>
</body>
</html>