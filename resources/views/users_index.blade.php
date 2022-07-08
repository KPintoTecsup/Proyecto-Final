<x-layout>
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Lista de Usuarios
            </div>
            <div class="float-right">
                <a class="text-center" href="{{route("users-add")}}">Agregar Usuario</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Clave</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <a href="{{route("users-edit", $user->id )}}">Editar</a>
                                <a href="{{route("users-del", $user->id )}}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-layout>
