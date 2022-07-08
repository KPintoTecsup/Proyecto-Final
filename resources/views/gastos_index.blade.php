<x-layout>
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Registro de Gastos de <strong>{{$activo->nombre}}</strong>
            </div>
            <div class="float-right">
                <a href="{{route("gastos-add", $activo->id)}}">Nuevo Gasto</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Concepto</th>
                        <th>Documento</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gastos as $gasto)
                        <tr>
                            <td>{{ $gasto->id }}</td>
                            <td>{{ $gasto->nombre }}</td>
                            <td>{{ $gasto->documento_relacionado }}</td>
                            <td>{{ $gasto->monto }}</td>
                            <td>{{ $gasto->fecha_gasto }}</td>
                            <td>
                                <a href="{{route("gastos-edit", $gasto->id )}}">Editar</a>
                                <a href="{{route("gastos-del", $gasto->id )}}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Total en Gastos</td>
                        <td colspan="3" class="text-center">S/ {{$activo->gasto_total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
