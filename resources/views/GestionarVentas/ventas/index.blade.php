

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('GESTIONAR VENTAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                <section id="contenido_principal">
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="box box-default" style="border: 1px solid #574B90; min-height: 35px;">
                        <a href="{{ route('admin.servicio.create') }}" class="btn btn-success" style="font-size: 13px; margin-top: 5px; margin-left: 5px;"> Agregar </a>
                        </div>
                    </div>

                        <div class="col-md-12">
                            <div class="box box-default" style="border: 1px solid #0c0c0c;">
                            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="padding: 5px;">
    <div style="height: 100%; overflow: auto;">
        <table class="table table-bordered table-condensed table-striped" id="tabla-empresas" style="width: 100%;">
            <!-- Encabezados de la tabla -->
            <thead>
                <th colspan="2"></th>
            </thead>
            <thead style="background-color: #dff1ff;">
                <th style="text-align: center;">id</th>
                <th style="text-align: center;">User_id</th>
                <th style="text-align: center;">Pago_id</th>
                <th style="text-align: center;">Fecha</th>
                <th style="text-align: center;">Metodo de Pago</th>
                <th style="text-align: center;">Monto total (Bs)</th>
                <th style="text-align: center;">Estado</th>
                <th style="text-align: center;">Acción</th>
            </thead>
            @foreach($ventas as $venta)

                <tr>
                        <td style="text-align: center;">{{$venta->id}}</td>
                        <td style="text-align: center;">{{$venta->user_id}}</td>
                        <td style="text-align: center;">{{$venta->pago_id}}</td>
                        <td style="text-align: center;">{{$venta->fecha}}</td>
                        <td style="text-align: center;">@if($venta->metodopago == 4)
                                        Pago Qr
                                    @else
                                        Tigo Money
                                    @endif</td>
                        <td style="text-align: center;">{{$venta->montototal}}</td>
                        <td style="text-align: center;">@if($venta->estado == 2)
                                        PAGADO
                                    @else
                                        NO PAGADO
                                    @endif</td>
                        <td style="text-align: center;">
                        <x-custom-button :url="'admin-venta/edit/'" :valor="$venta" >{{ __('Editar') }}</x-custom-button>
                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal','{{$venta->id}}')">{{ __('Eliminar') }}</x-danger-button>
                        <x-modal name='{{$venta->id}}' :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="POST" action="{{ route('admin.ventas.destroy', ['venta_id' => $venta->id]) }}" class="p-6">
                       @csrf
                       @method('DELETE')

                      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('¿Estás seguro que deseas eliminar la Venta ') }}{{ $venta->id }}{{ __('?') }}
                      </h2>

                      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                         {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                      </p>

                          <div class="mt-6 flex justify-end">
                          <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                          </x-secondary-button>

                          <x-danger-button class="ms-3">
                    {{ __('Eliminar') }}
                      </x-danger-button>
                             </div>
                  </form>
                </x-modal>
                    </td>
                </tr>

             @endforeach
            </tbody>
         </table>
        </div>
        </div>

                            </div>
                        </div>
                </section>
                </div>
            </div>
    </div>
 </div>

</x-app-layout>
<!--MODAL PARA ELIMINAR-->




