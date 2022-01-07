@include('layouts.app')

<div class="contenedor">
    <form action="{{url('/contactos/'.$contacto->id)}}" method="post" enctype="multipart/form-data" style="width: 50%; ">
        @csrf
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input value="{{$contacto->nombre}}" type="text" name="Nombre" class="form-control" id="Nombre">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{$contacto->email}}" type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Telefono</label>
            <input value="{{$contacto->telefono}}" type="text" name="Telefono" class="form-control" id="Telefono">
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Direccion</label>
            <input value="{{$contacto->direccion}}" type="text" name="Direccion" class="form-control" id="Direccion">
        </div>

        <button type="submit" name="" class="btn btn-primary" id="">Guardar Datos </button>
    </form>
