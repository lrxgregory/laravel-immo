<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title class="text-4xl font-bold underline">@yield('title')</title>
</head>

<body>
    <div class="container mx-auto px-4">

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif
        <h1>@yield('content')</h1>
    </div>
</body>

</html>
