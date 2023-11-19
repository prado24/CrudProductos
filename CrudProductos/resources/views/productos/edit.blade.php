@extends('layaout.app')
@section('container')
    <h1 class="text-center">Editar Producto</h1>
    <div class="container">
        <form action="{{route('ProductosUpdate',$producto->id)}}" method="post">
            {{-- Esto lo usa laravel para no aceptar basura en los metodos y es necesario tener lo --}}
            @csrf @method('PATCH')
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre',$producto->nombre)}}">
                @error('nombre')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{old('descripcion',$producto->descripcion)}}">
                @error('descripcion')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" id="precio" name="precio" class="form-control" value="{{old('precio',$producto->precio)}}">
                {{-- old: Sirve para mantener el valor por si el usuario se eqeuivoca y al recargar no se quite --}}
                @error('precio')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" class=" btn btn-success" value="Guardar">
                <a href="{{route('indexProductos')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection