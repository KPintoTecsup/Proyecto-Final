@extends('components.layout2')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-5" >
                <div class="card-body">
                    <form method="POST" action="{{route('login')}}">
                        <h2 class="text-center">Iniciar Sesión</h2>
                        <p class="text-center">
                            Ingrese su correo y clave para acceder al sistema
                        </p>
                        @csrf
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 100px;">Correo</span>
                            </div>
                            <input type="email" name="email" class="form-control" required/>
                        </div>
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 100px;">Clave</span>
                            </div>
                            <input type="password" name="password" class="form-control" required/>
                        </div>
                        <button class="btn btn-primary" >
                            Iniciar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
