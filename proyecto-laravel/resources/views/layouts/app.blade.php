<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Control Personal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex flex-col">

    <!-- Header Principal -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Bienvenido a tu panel</h1>
                <strong class="text-indigo-600">{{auth()->user()->name}}</strong>
            </div>
        </div>
    </header>

    <!-- Barra de Navegación Original Adaptada -->
    <nav class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Botón Hamburguesa Móvil -->
            <div class="flex items-center justify-end h-12 sm:hidden">
                <button type="button" id="btn-menu" class="text-white hover:text-indigo-200 focus:outline-none font-bold px-2 py-1 border border-transparent rounded-md hover:border-indigo-400">
                    ☰ Menú
                </button>
            </div>
            
            <!-- Menú de Enlaces -->
            <ul id="menu-enlaces" class="hidden sm:flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 pb-4 sm:pb-0 sm:py-3">
                <li><a href="{{ route('inicio') }}" class="block hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium transition">Inicio</a></li>
                <li><a href="{{ route('tareas') }}" class="block hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium transition">Mis tareas</a></li>
                <li><a href="{{ route('perfil') }}" class="block hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium transition">Perfil</a></li>
                <li><a href="{{ route('contacto') }}" class="block hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium transition">Contacto</a></li>

                <li class="w-full sm:w-auto sm:ml-auto">
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="block hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium transition">
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </nav>

    <!-- Contenedor Principal de las Vistas -->
    <main class="flex-grow max-w-7xl mx-auto w-full p-4 sm:p-6 lg:p-8">
        <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-sm text-gray-500">
            <p><small>&copy; 2026 Panel de Control Personal. Todos los derechos reservados.</small></p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnMenu = document.getElementById('btn-menu');
            const menuEnlaces = document.getElementById('menu-enlaces');

            btnMenu.addEventListener('click', function() {
                // Alterna entre ocultar (hidden) y mostrar (flex) el menú
                menuEnlaces.classList.toggle('hidden');
                menuEnlaces.classList.toggle('flex');
            });
        });
    </script>

</body>
</html>