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

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

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
