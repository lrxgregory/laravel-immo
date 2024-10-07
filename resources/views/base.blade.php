<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>

<body>
    {{-- Navbar --}}
    @include('shared.navbar')

    <div class="container mx-auto px-4 py-6">

        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="mt-auto py-6">
            <div class="container mx-auto px-4">
                <!-- Votre contenu footer ici -->
            </div>
        </footer>
</body>

</html>
