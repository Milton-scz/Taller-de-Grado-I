<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obologistic</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="w-full fixed top-0 z-50 bg-white">
    <!-- Navbar -->
    @include('layouts.navigation')
    <!-- /Navbar -->
</div>

<div class="mt-20 mx-auto max-w-6xl px-6 lg:py-20"> <!-- Cambia max-w-6xl por max-w-7xl si necesitas más ancho -->
    <div class="flex justify-center">
        <div class="w-full lg:w-3/4 xl:w-2/3 text-center"> <!-- Ajusta el ancho en diferentes tamaños de pantalla -->
            <h3 class="text-3xl font-bold">Realiza el registro paso a paso</h3>

            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700"></label>
                <input type="file" id="fileInput" name="data[file]" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
            <button onclick="handleUpload()">Scan Document</button>
            </div>
                        <!-- Barra de progreso -->
            <div class="mt-6 w-full bg-gray-200 h-6 rounded-lg overflow-hidden">
                <div class="bg-blue-500 h-full transition-all duration-500" style="width: 33%;"></div>
            </div>
            <!-- Mensaje adicional -->

            <!-- Formulario -->
            <div class="bg-white shadow-md rounded-md p-6 mt-4">
                <form method="POST" action="{{ route('admin.pagos.generarCobro') }}" >
                    @csrf
                    <!-- Paso 1: Registrar Cliente -->
                    <fieldset>
                        <h2 class="text-xl font-semibold mb-4">Paso 1: Registra al Cliente</h2>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombres</label>
                            <input type="text" id="name" name="dto_nombres" placeholder="Nombres"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="apellido" name="dto_apellidos" placeholder="Apellidos"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="cedula" class="block text-sm font-medium text-gray-700">Cedula</label>
                            <input type="text" id="cedula" name="dto_cedula" placeholder="Cedula de identidad"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                            <input type="date" id="fecha_nacimiento" name="dto_fechaNacimiento" placeholder="Fecha de Nacimiento"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>


                        <button type="button" name="next"
                            class="next bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Siguiente
                        </button>
                    </fieldset>

                    <!-- Paso 2: Agregar Paquete -->
                    <fieldset class="hidden">
                        <h2 class="text-xl font-semibold mb-4">Paso 2: Registra el Paquete</h2>
                        <div class="mb-4">
                            <label for="dimensiones" class="block text-sm font-medium text-gray-700">Dimensiones</label>
                            <input type="text" id="dimensiones" name="dto_dimensiones" placeholder="Dimensiones"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="peso" class="block text-sm font-medium text-gray-700">Peso</label>
                            <input type="text" id="peso" name="dto_peso" placeholder="Peso del Paquete"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="fecha_salida" class="block text-sm font-medium text-gray-700">Fecha de Salida</label>
                            <input type="date" id="fecha_salida" name="dto_fechaSalida"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="fecha_llegada" class="block text-sm font-medium text-gray-700">Fecha de Llegada</label>
                            <input type="date" id="fecha_llegada" name="dto_fechaLlegada"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mt-4">
                            <x-input-label for="servicio_id" :value="__('Seleccionar Servicio')" />
                            <div class="mt-4">
                                <select id="servicio_id" name="dto_servicio_id" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($servicios as $servicio)
                                    <option value="{{$servicio->id}}"> {{$servicio->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                        <x-input-label for="almacen_id" :value="__('Seleccionar Ruta')" />
                            <div class="mt-4">
                                <select id="almacen_id" name="dto_almacen_id[]" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" multiple>
                                    @foreach($almacenes as $almacen)
                                        <option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                             </div>

                        <button type="button" name="previous"
                            class="previous bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Previo
                        </button>
                        <button type="button" name="next"
                            class="next bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Siguiente
                        </button>
                    </fieldset>

                    <!-- Paso 3: Pagos Qr -->
                    <fieldset class="hidden">
                        <h2 class="text-xl font-semibold mb-4">Paso 3: Realiza el Pago por Qr</h2>
                        <!-- DESDE AQUI PARA EL PAGO QR-->

                        <div class="mx-auto max-w-8xl sm:px-6 lg:py-20" >
                  <div class="flex justify-center">
                       <div class="w-full md:w-1/2 text-center">
                         <h3 class="text-3xl font-bold">PagoFacil QR y Tigo Money</h3>
                         <div class="bg-white shadow-md rounded-md p-6 mt-4">
                        <h5 class="text-center mb-4 text-lg font-semibold">Datos para la factura</h5>

                        <form method="POST" action="{{ route('admin.pagos.generarCobro') }}" >
                            @csrf
                            <x-text-input type="hidden" name="tcUserId" :value="auth()->id()" />
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col">
                                    <label class="px-3">Razon Social</label>
                                    <x-text-input type="text" required name="tcRazonSocial" :value="__('Gupo03-SA')" class="border p-2 rounded-md " readonly/>
                                </div>
                                <div class="flex flex-col">
                                    <label class="px-3">CI/NIT</label>
                                    <input type="text" required name="tcCiNit" placeholder="Número de CI/NIT" class="border p-2 rounded-md">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col">
                                    <label class="px-3">Celular</label>
                                    <input type="text" required name="tnTelefono" placeholder="Número de Teléfono" class="border p-2 rounded-md">
                                </div>
                                <div class="flex flex-col">
                                    <label class="px-3">Correo</label>
                                    <x-text-input type="text" required name="tcCorreo" :value="__('juan@gmail.com')" class="border p-2 rounded-md" readonly/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <!-- nomnto total  -->
                                <div class="flex flex-col">
                                <x-input-label for="name" :value="__('Monto Total')" />
                                <x-text-input type="number"  required name="tnMonto" :value="0.01" class="border p-2 rounded-md"  readonly/>
                                </div>
                                <!-- nomnto total  -->

                                <!-- tipo de servicio  -->
                                <div class="flex flex-col">
                                    <label class="px-3">Tipo de Servicio</label>
                                    <select name="tnTipoServicio" class="border p-2 rounded-md">
                                        <option value="1">Servicio QR</option>
                                        <option value="2">Tigo Money</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="text-center mt-4  font-semibold">Datos del Producto</h5>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                            </div>

                            <div class="flex justify-center mt-4">
                                    <div class="w-full md:w-1/2">
                                    <x-primary-button class="ms-4">
                                      {{ __('Pagar') }}
                                         </x-primary-button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                  <!-- segunda columna-->
                  <div class="w-full md:w-1/2 text-center">
                  <div class="flex justify-center">
                           <iframe name="QrImage" style="width: 100%; height: 495px;"></iframe>
                    </div>
                    </div>

             <!-- segunda columna-->
                </div>
                            <!-- HASTA AQUI PARA EL PAGO QR  -->

                        <button type="button" name="previous"
                            class="previous bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Previo
                        </button>
                        <button type="submit" name="submit"
                            class="submit bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            id="submit_data">
                            Enviar
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Evita el envío del formulario normal

            // Obtiene los datos del formulario
            var formData = $(this).serialize();

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    console.log('Éxito:', response);
                    var qrCodeUrl = response; // Reemplaza 'qrCodeUrl' con el nombre de tu campo de respuesta que contiene la URL del código QR
                    // Actualiza el src del iframe con la URL del código QR
                    $('iframe[name="QrImage"]').attr('src', qrCodeUrl);
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Manejo de errores en caso de falla de la solicitud
                }
            });
        });
    });


</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let current = 1;
        const steps = document.querySelectorAll("fieldset").length;
        const progressBar = document.querySelector(".bg-blue-500"); // Selector del progressBar

        document.querySelectorAll(".next").forEach(button => {
            button.addEventListener("click", () => {
                const currentStep = button.closest("fieldset");
                const nextStep = currentStep.nextElementSibling;
                if (nextStep) {
                    currentStep.classList.add("hidden");
                    nextStep.classList.remove("hidden");
                    current++;
                    setProgressBar(current);
                }
            });
        });

        document.querySelectorAll(".previous").forEach(button => {
            button.addEventListener("click", () => {
                const currentStep = button.closest("fieldset");
                const previousStep = currentStep.previousElementSibling;
                if (previousStep) {
                    currentStep.classList.add("hidden");
                    previousStep.classList.remove("hidden");
                    current--;
                    setProgressBar(current);
                }
            });
        });

        function setProgressBar(curStep) {
            const percent = ((curStep - 1) / (steps - 1)) * 100; // Calcular el porcentaje
            progressBar.style.width = percent + "%";
            progressBar.innerHTML = percent.toFixed(0) + "%";

            console.log("Current Step: " + curStep); // Verificar el paso actual en la consola
            console.log("Percent: " + percent); // Verificar el porcentaje actual en la consola
        }

        setProgressBar(current); // Llama a setProgressBar al cargar la página con el 33%
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // upload.js
    async function uploadToApi(file) {
    const formData = new FormData();
    formData.append('file', file);

    try {
        const response = await axios.post('https://api.ocr.space/parse/image', formData, {
            headers: {
                'apiKey': 'helloworld', // Reemplaza con tu apiKey
                'Content-Type': 'multipart/form-data'
            }
        });

        const responseBody = response.data;
        const responseBodyText = responseBody['ParsedResults'][0]['ParsedText'];

        console.log('Texto extraído:', responseBodyText);

        // Definir las claves y sus correspondientes palabras clave para buscar en el texto
        const keysToFind = {
            'nombres': 'NOMBRES',
            'apellidos': 'APELLIDOS',
            'fecha_nacimiento': 'FECHA DE NACIMIEWO',
            'NO': 'NO'
        };

        // Objeto JSON para almacenar los resultados
        const results = {};

        // Recorrer cada clave y buscar su valor en el texto
        for (const key in keysToFind) {
            if (keysToFind.hasOwnProperty(key)) {
                const keyword = keysToFind[key];
                const startIndex = responseBodyText.indexOf(keyword);

                if (startIndex !== -1) {
                    const nextLineIndex = responseBodyText.indexOf('\n', startIndex);

                    if (nextLineIndex !== -1) {
                        let value = responseBodyText.substring(nextLineIndex + 1).trim();

                        // Limpiar el valor según la clave
                        if (key === 'fecha_nacimiento') {
                            // Obtener solo la fecha de nacimiento sin caracteres adicionales
                            value = value.replace(/[^\d\/]/g, '');
                        }

                        results[key] = value;
                    }
                }
            }
        }

        // Imprimir el objeto JSON con los resultados
        console.log('Resultados:', results);

        // Aquí puedes manejar el objeto JSON como desees, por ejemplo, mostrar en un textarea
        const textarea = document.getElementById('name');
        textarea.value = JSON.stringify(results, null, 2);

    } catch (error) {
        console.error('Error al enviar archivo a la API:', error);
        // Maneja el error de la API según sea necesario
    }
}

function handleUpload() {
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];

    if (file) {
        uploadToApi(file); // Llama a uploadToApi con el archivo seleccionado
    } else {
        console.error('No se ha seleccionado ningún archivo.');
    }
}


</script>
</body>
</html>
