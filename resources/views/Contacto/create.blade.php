@include('layouts.app')

<form action="{{url('/contactos')}}" method="post" enctype="multipart/form-data" class="container-fluid">
    @csrf

    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre completo</label>
        <input placeholder="Ingrese Nombre Completo" type="text" name="Nombre" class="form-control" id="Nombre">
    </div>

    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input placeholder="Ingrese Email" type="email" name="Email" class="form-control" id="Email" aria-describedby="emailHelp">
    </div>


    <div class="mb-3">
        <label for="Telefono" class="form-label">Telefono</label>
        <input placeholder="Ingrese Telefono" type="number" name="Telefono" class="form-control" id="Telefono">
    </div>

    <div class="mb-3">
        <label for="Direccion" class="form-label">Direccion</label>
        <input placeholder="Ingrese Direccion" type="text" name="Direccion" class="form-control" id="Direccion">
    </div>

    <input type="submit" value="Guardar" class="btn btn-primary">

</form>


