<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget" style="background: #ebe6ea">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{$componentName}}</b></h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Elige el usuario</h6>
                                <div class="form-group">
                                    <select wire:model="userId" class="form-control">
                                        <option value="0">Todos</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6>Elige el tipo de reporte</h6>
                                <div class="form-group">
                                    <select wire:model="reportType" class="form-control">
                                        <option value="0">Ventas del dia</option>
                                        <option value="1">Ventas por fecha</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateFrom" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateTo" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button wire:click="$refresh" class="btn btn-dark btn-block">
                                    Consultar
                                </button>

                                <a class="btn btn-dark btn-block {{count($data) < 1? 'disabled' : ''}}" 
                                href="{{ url('report/pdf' . '/' . $userId . '/' . $reportType. '/' . $dateFrom. '/' . $dateTo) }}"
                                target="_blank">Generar PDF</a>

                                <a class="btn btn-dark btn-block {{count($data) < 1? 'disabled' : ''}}" 
                                href="{{ url('report/excel' . '/' . $userId . '/' . $reportType. '/' . $dateFrom. '/' . $dateTo) }}"
                                target="_blank">Exportar a Excel</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <!-- TABLA -->
                        <div class="table-responsive">
                            <!-- Anterior table: table table-bordered border-primary table striped mt-1  -->
                            <table class="table table-hover table-dark mb-4">
                                <thead class="text-white" style="background:#3b3f5c;">
                                    <tr>
                                        <th class="table-th text-white text-center" >
                                            FOLIO
                                        </th>
                                        <th class="table-th text-white text-center" >
                                            TOTAL
                                        </th>
                                        <th class="table-th text-white text-center" >
                                            ITEMS
                                        </th>
                                        <th class="table-th text-white text-center" >
                                            ESTATUS
                                        </th>
                                        <th class="table-th text-white text-center" >
                                            USUARIO
                                        </th>
                                        <th class="table-th text-white text-center" >
                                            FECHA
                                        </th>
                                        <th class="table-th text-white text-center" width="50px">
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) <1)
                                        <tr>
                                            <td colspan="7"><h5>Sin Resultados</h5></td>
                                        </tr> 
                                    @endif
                                    @foreach ($data as $d)
                                    <tr>
                                        <td class="text-center">
                                            <h6>{{$d->id}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>${{ number_format($d->total,2) }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$d->items}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$d->status}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$d->user}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}</h6>
                                        </td>
                                        <td class="text-center" width="50px" >
                                            <button wire:click.prevent="getDetails({{$d->id}})" class="btn btn-dark btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-list">
                                                    <line x1="8" y1="6" x2="21" y2="6">
                                                    </line>
                                                    <line x1="8" y1="12" x2="21" y2="12">
                                                    </line>
                                                    <line x1="8" y1="18" x2="21" y2="18">
                                                    </line>
                                                    <line x1="3" y1="6" x2="3.01" y2="6">
                                                    </line>
                                                    <line x1="3" y1="12" x2="3.01" y2="12">
                                                    </line>
                                                    <line x1="3" y1="18" x2="3.01" y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.reports.sales-detail')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        flatpickr(document.getElementsByClassName('flatpickr'),{
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado",
                    ],
                    },
                    months: {
                        shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                        ],
                        longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                        ],
                    },
            }
        })

        //eventos
        window.livewire.on('show-modal', Msg=>{
            $('#modalDetails').modal('show')
        })

        

    });
</script>