<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecovelez-compra</title>
    <!-- Enlace al CDN de Tailwind CSS -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!--  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script> -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
@include('layouts.script')
<div class="w-full fixed top-0 z-5 bg-white ">
        <!-- nav -->
        @include('layouts.nav')
        <!-- /nav -->

        @if(session('mensajeEstadoPago'))
             <div id="mensaje-flash" class="bg-green-200 border border-green-600 text-green-800 px-4 py-3 rounded relative" role="alert">
                 <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('mensajeEstadoPago') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <button class="close-button">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path fill-rule="evenodd" d="M3.293 3.293a1 1 0 011.414 0L10 8.586l5.293-5.293a1 1 0 111.414 1.414L11.414 10l5.293 5.293a1 1 0 01-1.414 1.414L10 11.414l-5.293 5.293a1 1 0 01-1.414-1.414L8.586 10 3.293 4.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
             </div>
       @endif
</div>
    <div class="mt-5">
        <br><br><br>
        <div class="mx-auto max-w-7xl sm:px-6 lg:py-20">
            <div class="flex justify-center">
                <div class="w-full md:w-1/2 text-center">
                    <h3 class="text-3xl font-bold">PagoFacil QR y Tigo Money</h3>
                    <p class="text-blue-500">Proyecto de ejemplo de integración de servicios PagoFacil.</p>
                    <div class="bg-white shadow-md rounded-md p-6 mt-4">
                        <h5 class="text-center mb-4 text-lg font-semibold">Datos para la factura</h5>

                        <form method="POST" action="{{ route('admin.pagos.generarCobro') }}" target="QrImage">
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
                                    <x-text-input type="text" required name="tcCorreo" :value="__('miltonrodriguezdavalos@gmail.com')" class="border p-2 rounded-md" readonly/>
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
                                <div class="flex flex-col">
                                    <label class="px-3">ID CURSO</label>
                                    <x-text-input  type="text" name="taPedidoDetalle[0][Serial]" :value="old('curso_id', $curso->id)" class="border p-2 rounded-md" readonly/>
                                </div>
                                <div class="flex flex-col">
                                    <label class="px-3">Producto</label>
                                    <x-text-input type="text" name="taPedidoDetalle[0][Producto]" :value="old('nombre', $curso->nombre)" class="border p-2 rounded-md" readonly/>
                                </div>
                                <div class="flex flex-col">
                                    <label class="px-3">Cantidad</label>
                                    <x-text-input type="number" name="taPedidoDetalle[0][Cantidad]" :value="1" class="border p-2 rounded-md" readonly/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="flex flex-col">
                                    <label class="px-3">Precio</label>
                                    <x-text-input  type="number" name="taPedidoDetalle[0][Precio]" :value="old('precio', $curso->precio)" class="border p-2 rounded-md" readonly/>
                                </div>
                                <div class="flex flex-col">
                                    <label class="px-3">Descuento</label>
                                    <x-text-input  type="number" name="taPedidoDetalle[0][Descuento]" :value="0" class="border p-2 rounded-md"  readonly/>
                                </div>
                                <div class="flex flex-col">
                                    <label class="px-3">Total</label>
                                    <x-text-input type="text" name="taPedidoDetalle[0][Total]" :value="old('precio', $curso->precio)" class="border p-2 rounded-md" readonly/>
                                </div>
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
                <div class="hidden md:block md:w-1/2 py-5 justify-center">
                    <div class="flex justify-center">
                           <iframe name="QrImage" style="width: 100%; height: 495px;"></iframe>
                    </div>
                        <div class="flex justify-center">
                                     <div class="flex justify-center mt-4">
                                            <div class="flex justify-center">
                                                <div id="userModal" class="hidden fixed inset-0 bg-blue-500 bg-opacity-75 flex justify-center items-center">
                                                    <div class="bg-white p-8 rounded shadow-lg  justify-center items-center">
                                                        <p id="mensaje" class="text-xl font-bold mb-4"></p>
                                                        <div class="flex justify-center mt-4">
                                                        <form method="GET" action="{{ route('/mis.cursos') }}">
                                                          <x-primary-button id="closeModal" class="mt-4">
                                                            {{ __('Cerrar') }}
                                                            </x-primary-button>
                                                          </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                 </div>
                             </div>
             <!-- segunda columna-->

                    </div>
                </div>
            </div>
            <script>
            // En el documento principal
            $(document).ready(function() {
                window.addEventListener('message', function(event) {
                    // Verificar si el mensaje proviene del iframe

                        // Obtener el script enviado desde el iframe
                        const scriptReceived = event.data;

                        // Ejecutar el script en el contexto del documento principal
                        eval(scriptReceived);

                });
            });
            </script>


</body>
</html>
