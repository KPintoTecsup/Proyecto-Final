<x-layout>
    <div class="card">
        <div class="card-header">Usuarios</div>
        <div class="card-body">
            <form method="POST" action="{{route('users-store')}}">
                @csrf
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 100px;">Nombre</span>
                    </div>
                    <input type="text" name="name" class="form-control" value="{{$user->name ?? $user->name}}" required />
                </div>
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 100px;">Correo</span>
                    </div>
                    <input type="email" name="email" class="form-control" value="{{$user->email ?? $user->email}}" required/>
                </div>
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 100px;">Password</span>
                    </div>
                    <input type="password" name="password" class="form-control" value="{{$user->password ?? $user->password}}"  required/>
                    <input type="hidden" name="id" value="{{$user->id ?? $user->id}}"/>
                </div>
                <button class="btn btn-outline-primary"">
                    Guardar Usuario
                </button>
            </form>
        </div>
    </div>
</x-layout>
