<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envío de Paquetes - Inicio</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-600">

    <div class="w-full fixed top-0 z-50 bg-white dark:bg-gray-600">
        <!-- Navbar -->
        @include('layouts.nav')
        <!-- /Navbar -->
    </div>

    <div class="container mx-auto md:px-20 pt-6 max-w-7xl bg-gray-200 dark:bg-gray-800">

        <!-- Hero section -->
        <div class="flex flex-col-reverse md:flex-row items-center pt-6 lg:mt-32 gap-8">
            <div class="text-left md:w-1/2 flex flex-col gap-5">
                <h1 class="text-4xl md:text-6xl font-semibold text-gray-900 leading-none dark:text-gray-100">
                    Bienvenido a Nuestro Servicio de Envío de Paquetes
                </h1>
                <p class="text-xl font-light text-gray-500 antialiased dark:text-gray-300">
                    Envíe sus paquetes con la máxima eficiencia y seguridad.
                </p>
                <a href="#services"
                   class="w-fit px-8 py-4 rounded-full font-normal tracking-wide bg-gradient-to-b from-blue-600 to-blue-700 text-white outline-none focus:outline-none hover:shadow-lg hover:from-blue-700 hover:to-blue-700 transition duration-200 ease-in-out">
                    Explorar Servicios
                </a>
            </div>
            <img src="https://res.cloudinary.com/dy09hqrno/image/upload/v1691588230/hero_wtour7.png" alt="hero image" class="md:w-1/2 rounded-xl mb-10 shadow-md">
        </div>
        <!-- /Hero section -->

        <!-- Search section -->
        <div class="my-20 flex justify-center">
    <form action="#" method="GET" class="w-full max-w-2xl">
        <div class="flex bg-white rounded-full shadow-lg p-2">
            <!-- Campo de búsqueda grande -->
            <input type="text" name="query" placeholder="Buscar paquetes..." class="flex-grow p-4 outline-none rounded-l-full text-lg" value="{{ request('search') }}">

            <!-- Botón de búsqueda grande -->
            <button type="submit" class="bg-blue-600 text-white px-6 py-4 rounded-r-full text-lg font-semibold hover:bg-blue-700 transition duration-200">
                Buscar
            </button>
        </div>
    </form>
</div>

        <!-- /Search section -->

        <!-- Featured section -->
       <!-- Sección de servicios -->
<div class="my-20 py-12 bg-white dark:bg-gray-800 rounded-xl" id="servicios">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 dark:text-gray-100 text-center">
        Nuestros Servicios
    </h2>
    <div class="grid md:grid-cols-3 gap-8 mt-12">
        <!-- Servicio 1 -->
        <div class="flex flex-col items-center text-center bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-center w-16 h-16 bg-blue-600 text-white rounded-full mb-4">
                <!-- Ícono o imagen representativa del servicio -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 5h12l3 9-3 9H3l3-9-3-9z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                Envíos Rápidos
            </h3>
            <p class="text-gray-600 dark:text-gray-300 mt-2">
                Realiza envíos rápidos a nivel nacional e internacional. Entregamos tus paquetes en tiempo récord.
            </p>
        </div>

        <!-- Servicio 2 -->
        <div class="flex flex-col items-center text-center bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-center w-16 h-16 bg-green-600 text-white rounded-full mb-4">
                <!-- Ícono o imagen representativa del servicio -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 9V5a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h4l2 2v2h2l2-2V11h4a2 2 0 002-2V7a2 2 0 00-2-2z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                Envíos Seguros
            </h3>
            <p class="text-gray-600 dark:text-gray-300 mt-2">
                Garantizamos la seguridad de tus paquetes durante todo el proceso de envío. Ofrecemos seguros de envío.
            </p>
        </div>

        <!-- Servicio 3 -->
         <div class="flex flex-col items-center text-center bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-center w-16 h-16 bg-red-600 text-white rounded-full mb-4">
                <!-- Ícono o imagen representativa del servicio -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a2 2 0 00-2-2h-3a2 2 0 00-2 2v2zM9 20h2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2h2v-2h2v2z" />
                    </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                Envíos Economicos
            </h3>
            <p class="text-gray-600 dark:text-gray-300 mt-2">
                Garantizamos la seguridad de tus paquetes durante todo el proceso de envío. Ofrecemos seguros de envío.
            </p>
        </div>
    </div>
</div>
<!-- /Sección de servicios -->

        <!-- /Featured section -->

        <!-- Footer -->
        <x-footer />
        <!-- /Footer -->
    </div>

</body>
</html>
