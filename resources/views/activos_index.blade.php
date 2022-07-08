<x-layout>
    <div class="card">
        <div class="card-header">
            <div class="float-left">Lista de Activos</div>
            <div class="float-right">
                <a href="{{route("activos-add")}}">Agregar Activo</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Gasto Total</th>
                        <th>Descripción</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activos as $activo)
                        <tr>
                            <td>{{ $activo->id }}</td>
                            <td>{{ $activo->nombre }}</td>
                            <td>S/ {{ $activo->gasto_total }}</td>
                            <td>{{ $activo->descripcion }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_gas_{{$activo->id}}" data-toggle="dropdown" aria-expanded="false">
                                        Gastos
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_gas_{{$activo->id}}">
                                        <a class="dropdown-item" href="{{route("gastos-index", $activo->id )}}">Ver Gastos</a>
                                        <a class="dropdown-item" href="{{route("gastos-add", $activo->id )}}">Registrar Gasto</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_op_{{$activo->id}}" data-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_op_{{$activo->id}}">
                                        <a class="dropdown-item" href="{{route("activos-edit", $activo->id )}}">Editar</a>
                                        <a class="dropdown-item" href="{{route("activos-del", $activo->id )}}">Eliminar</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-layout>
