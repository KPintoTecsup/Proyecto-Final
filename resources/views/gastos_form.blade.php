<x-layout>
    <div class="card">
        <div class="card-header">

                Registro de Gasto para {{$activo->nombre}}

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('gastos-store')}}">
                @csrf
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 150px;">Nombre</span>
                    </div>
                    <input type="text" name="nombre" class="form-control" value="{{$gasto->nombre ?? $gasto->nombre}}" required/>
                </div>
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 150px;">Factura/Boleta</span>
                    </div>
                    <input type="text" name="documento" class="form-control" placeholder="(Opcional)" value="{{$gasto->documento_relacionado ?? $gasto->documento_relacionado}}" />
                </div>
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 150px;">Monto</span>
                    </div>
                    <input type="number" step="0.1" name="monto" class="form-control" value="{{$gasto->monto ?? $gasto->monto}}" required/>
                </div>
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 150px;">Fecha</span>
                    </div>
                    <input type="date"  name="fecha" class="form-control" placeholder="YYYY-MM-DD"  value="{{$gasto->fecha_gasto ?? $gasto->fecha_gasto}}" required/>
                </div>
                <p>
                    <input type="hidden" name="id" value="{{$gasto->id ?? $gasto->id}}"/>
                    <input type="hidden" name="activo_id" value="{{$activo->id ?? $activo->id}}"/>
                    <input type="hidden" name="monto_anterior" value="{{$gasto->monto ?? $gasto->monto}}"/>
                </p>

                <button class="btn btn-outline-primary" >
                    Guardar Gasto
                </button>
            </form>
        </div>
    </div>

</x-layout>
