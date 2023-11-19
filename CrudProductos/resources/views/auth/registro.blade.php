@extends('layaout.app_principal')
@section('container')
<h1 class="text-center">Registro</h1>
<div class="container">
    <form action="{{route('RegistroStore')}}" method="post">
        {{-- Esto lo usa laravel para no aceptar basura en los metodos y es necesario tener lo --}}
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Escribe tu nombre">
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" id="username" name="username" class="form-control" value="{{old('username')}}" placeholder="Crea un usuario">
            @error('username')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Correo electronico</label>
            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Escribe tu correo">
            {{-- old: Sirve para mantener el valor por si el usuario se eqeuivoca y al recargar no se quite --}}
            @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Escribe tu contraseña">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repite tu contraseña">
            @error('password_confirmation')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            {{-- <input type="submit" class=" btn btn-success" value="Crear Cuenta"> --}}
            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
            <a href="{{route('Dashboard')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection