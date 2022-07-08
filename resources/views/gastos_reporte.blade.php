<x-layout>
    <h5>Reporte de Gastos</h5>
    <form>
        <div class="row">
            <div class="col-md-3">
                <input type="date" name="fini" class="form-control" value="{{$fini}}">
            </div>
            <div class="col-md-3">
                <input type="date" name="ffin" class="form-control" value="{{$ffin}}">
            </div>
            <div class="col-md-6">
                <button name="accion" value="filtrar" class="btn btn-primary">
                    Filtrar
                </button>
                <button name="accion" value="exportar" class="btn btn-primary">
                    Exportar
                </button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Activo</th>
                <th>Gasto</th>
                <th>Documento</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos as $gasto)
                <tr>
                    <td>{{ $gasto->fecha_gasto }}</td>
                    <td>{{ $gasto->activo->nombre }}</td>
                    <td>{{ $gasto->nombre }}</td>
                    <td>{{ $gasto->documento_relacionado }}</td>
                    <td>{{ $gasto->monto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
