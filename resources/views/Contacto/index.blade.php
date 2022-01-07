@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('../../css/app.css')}}">
</head>
<body>

<div class="m-2">
    <form method="GET" action="{{route('contacto.index')}}">
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Ingrese nombre o email buscado" name="texto"
                    value="{{$texto}}">
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
    </form>
</div>

<div style="display:flex; flex-flow: row wrap">
    <div class="mt-4 ms-2">
        <a class='btn btn-success' href="{{url('/contactos/create')}}">Insertar nuevo contacto</a>
    </div>

    <div class="mt-4 ms-2">
        <a class='btn btn-info' href="{{url('/home')}}">Mostrar Contactos</a>
    </div>
</div>

<br>
@if (count($datos)<=0) <p class="m-2">No hay resultados</p>
    @else

    @foreach ($datos as $dato)
    <div class="card m-2" id="tarjetas" >
        <div class="card-body">
            <h5 class="card-title">#ID {{$dato->id}}</h5>
            <h6 class="card-title">Nombre: {{$dato->nombre}}</h6>
            <h6 class="card-title">Email: {{$dato->email}} </h6>
            <h6 class="card-title">Telefono: {{$dato->telefono}}</h6>
            <h6 class="card-title">Direccion: {{$dato->direccion}}</h6>

            <div class="editar-container">
                <a class="btn btn-warning" href="{{route('contactos.edit', $dato->id)}}">Editar</a>
            </div>

            <div>
                <form action="{{route('contactos.destroy',$dato->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que quieres borrar?')"
                        value="Eliminar">Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    {{-- devuelva la paginacion --}}
    {{$datos->links()}}

</body>
</html>
