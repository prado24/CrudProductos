@extends('layaout.app_principal')
@section('container')
<h1 class="text-center">Login</h1>
<div class="container">
    <form action="{{route('LoginStore')}}" method="post">
        {{-- Esto lo usa laravel para no aceptar basura en los metodos y es necesario tener lo --}}
        @csrf
        
        <div class="form-group">
            @if(session('mensaje'))
                <div style="color:red">{{session('mensaje')}}</div>
            @endif
            <label for="username" class="form-label">Usuario</label>
            <input type="text" id="username" name="username" class="form-control" value="{{old('username')}}" placeholder="Crea un usuario">
            @error('username')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Escribe tu contraseña">
            @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            {{-- <input type="submit" class=" btn btn-success" value="Crear Cuenta"> --}}
            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            <a href="{{route('Dashboard')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection