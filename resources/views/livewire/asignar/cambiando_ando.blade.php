
                            @if($permisosseleccionado == "Todos")
                            <table class="table table-hover table table-bordered table-bordered-bd-warning">
                                <thead class="text-white" style="background: #ee761c">
                                    <tr>
                                        <th class="table-th text-withe text-center">ID</th>
                                        <th class="table-th text-withe text-center">#</th>
                                        <th class="table-th text-withe text-center">PERMISO</th>
                                        <th class="table-th text-withe text-center">ROLES CON EL PERMISO</th>
                                        <th class="table-th text-withe text-center">AREA</th>
                                        <th class="table-th text-withe text-center">DESCRIPCION</th>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permiso)
                                    @if(($permiso->checked==1 && $mostrarTR=='Asignados')|| $namerol=='Elegir')
                                    <tr>
                                        <td>
                                            <h6 class="text-center">{{$permiso->id}}</h6>
                                        </td>
                                        <td>

                                            <div class="col-2 text-center">
                                                <label class="colorinput">
                                                    <input name="color" type="checkbox" value="warning" class="colorinput-input"
                                                     
                                                wire:change="SyncPermiso($('#p' + {{ $permiso->id 
                                                }}).is(':checked'), '{{$permiso->name}}')"
                                                id="p{{ $permiso->id }}"
                                                value="{{ $permiso->id }}"
                                            class="new-control-input" 
                                            {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                    >
                                                    <span class="colorinput-color bg-warning"></span>
                                                </label>
                                                

                                            {{-- <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" 
                                                wire:change="SyncPermiso($('#p' + {{ $permiso->id 
                                                    }}).is(':checked'), '{{$permiso->name}}')"
                                                    id="p{{ $permiso->id }}"
                                                    value="{{ $permiso->id }}"
                                                class="new-control-input" 
                                                {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                >
                                                <span class="new-control-indicator"></span>
                                                <h6>{{ $permiso->name}}</h6>
                                            </label> --}}
                                            </div>

                                        </td>
                                        <td class="">
                                            <div class="row">
                                                <div class="">
                                                    {{ $permiso->name}}
                                                </div>

                                                
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                        </td>
                                        <td class="text-center">
                                            {{$permiso->area}}
                                        </td>
                                        <td class="text-center">
                                            {{$permiso->descripcion}}
                                        </td>
                                    </tr>
                                    @elseif($mostrarTR=='Todos' )
                                    <tr>
                                        <td>
                                            <h6 class="text-center">{{$permiso->id}}</h6>
                                        </td>
                                        <td>

                                            <div class="col-2 text-center">
                                                <label class="colorinput">
                                                    <input name="color" type="checkbox" value="warning" class="colorinput-input"
                                                     
                                                wire:change="SyncPermiso($('#p' + {{ $permiso->id 
                                                }}).is(':checked'), '{{$permiso->name}}')"
                                                id="p{{ $permiso->id }}"
                                                value="{{ $permiso->id }}"
                                            class="new-control-input" 
                                            {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                    >
                                                    <span class="colorinput-color bg-warning"></span>
                                                </label>
                                                

                                            {{-- <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" 
                                                wire:change="SyncPermiso($('#p' + {{ $permiso->id 
                                                    }}).is(':checked'), '{{$permiso->name}}')"
                                                    id="p{{ $permiso->id }}"
                                                    value="{{ $permiso->id }}"
                                                class="new-control-input" 
                                                {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                >
                                                <span class="new-control-indicator"></span>
                                                <h6>{{ $permiso->name}}</h6>
                                            </label> --}}
                                            </div>

                                        </td>
                                        <td class="">
                                            <div class="row">
                                                <div class="">
                                                    {{ $permiso->name}}
                                                </div>

                                                
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                        </td>
                                        <td class="text-center">
                                            {{$permiso->area}}
                                        </td>
                                        <td class="text-center">
                                            {{$permiso->descripcion}}
                                        </td>
                                    </tr>

                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $permisos->links() }}