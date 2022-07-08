<x-layout>
    <div class="card">
        <div class="card-header">
            Registro de Activo
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('activos-store')}}">
                @csrf
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px;">Nombre</span>
                    </div>
                    <input type="text" name="nombre" class="form-control" value="{{$activo->nombre ?? $activo->nombre}}" required/>
                </div>

                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px;">Descripción</span>
                    </div>
                    <textarea name="descripcion" class="form-control" required>{{$activo->descripcion ?? $activo->descripcion}}</textarea>
                    <input type="hidden" name="id" value="{{$activo->id ?? $activo->id}}"/>
                </div>

                <button class="btn btn-outline-primary" >
                    Guardar Activo
                </button>
            </form>
        </div>
    </div>
</x-layout>
