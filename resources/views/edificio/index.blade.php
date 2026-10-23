<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Edificios</title>
</head>
<body>
<h1>Edificios</h1>
@if (session('status'))
 <p>{{ session('status') }}</p>
@endif
@if ($errors->any())
 <ul>
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
@endif

<h2>Agregar edificio</h2>
<form action="{{ route('edificios.web.store') }}" method="post">
 @csrf
 <label for="nombre">Nombre</label>
 <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required maxlength="255">
 <button type="submit">Guardar edificio</button>
</form>

<h2>Edificios registrados</h2>
@forelse ($edificios as $edificio)
 <section>
  <h3>{{ $edificio->nombre }}</h3>
  @if ($edificio->aulas->isNotEmpty())
   <ul>
    @foreach ($edificio->aulas as $aula)
     <li>{{ $aula->nombre }} (capacidad: {{ $aula->capacidad }})</li>
    @endforeach
   </ul>
  @else
   <p>Este edificio todavía no tiene aulas.</p>
  @endif
  <a href="{{ route('aulas.agregar', ['edificio_id' => $edificio->id]) }}">Agregar aula a este edificio</a>
 </section>
@empty
 <p>No hay edificios registrados. Agrega uno para comenzar.</p>
@endforelse
<p><a href="{{ route('aulas.listar') }}">Ver todas las aulas</a></p>
</body>
</html>
