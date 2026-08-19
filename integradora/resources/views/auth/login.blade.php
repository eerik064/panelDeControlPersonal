<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Panel de Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<!-- Usamos el mismo fondo gris y tipografía de tu layout principal -->
<body class="min-h-screen flex items-center justify-center bg-gray-100 font-sans antialiased p-4">

    <!-- Tarjeta con el mismo estilo del contenido de tu panel -->
    <div class="w-full max-w-md p-8 bg-white shadow-md rounded-lg border border-gray-200">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-indigo-600">
                <i class="fas fa-user-circle mr-2 text-indigo-500"></i>Iniciar Sesión
            </h2>
            <p class="text-gray-500 mt-2 text-sm">Ingresa tus credenciales para acceder</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 p-3 bg-red-100 border border-red-300 text-red-700 rounded-md text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <!-- Labels e inputs adaptados al estilo de tu vista de Contacto -->
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="tucorreo@ejemplo.com"
                    required
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button 
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-md shadow-sm transition mt-4"
            >
                <i class="fas fa-sign-in-alt mr-2"></i>Ingresar
            </button>
        </form>
    </div>

</body>
</html>