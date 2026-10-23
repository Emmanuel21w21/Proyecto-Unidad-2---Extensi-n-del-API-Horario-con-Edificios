<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Modificar aula</title>
</head>
<body>
<nav><a href="{{ url('/') }}">Volver al menú principal</a></nav>
<h1>Modificar aula</h1>
@if ($errors->any())
 <ul>
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
@endif
<form action="/actualiza/{{ $aula->id }}" method="post">
 @csrf
 @method('put')
 <label for="nombre">Nombre</label>
 <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $aula->nombre) }}" required><br>
 <label for="capacidad">Capacidad</label>
 <input type="number" name="capacidad" id="capacidad" value="{{ old('capacidad', $aula->capacidad) }}" min="1" required><br>
 <label for="edificio_id">Edificio</label>
 <select name="edificio_id" id="edificio_id" required>
  @foreach ($edificios as $edificio)
   <option value="{{ $edificio->id }}" @selected(old('edificio_id', $aula->edificio_id) == $edificio->id)>
    {{ $edificio->nombre }}
   </option>
  @endforeach
 </select><br>
 <label for="wifi">Wi-Fi</label>
 <input type="checkbox" name="wifi" id="wifi" value="1" @checked(old('wifi', $aula->wifi))><br>
 <button type="submit">Guardar cambios</button>
</form>
<p><a href="{{ route('aulas.listar') }}">Volver a aulas</a></p>
</body>
</html>
