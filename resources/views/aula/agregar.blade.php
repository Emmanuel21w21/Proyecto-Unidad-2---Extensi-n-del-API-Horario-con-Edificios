<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Agregar aula</title>
</head>
<body>
<h1>Agregar aula</h1>
@if ($errors->any())
 <ul>
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
@endif
@if ($edificios->isEmpty())
 <p>Primero debes registrar un edificio para poder asignarle un aula.</p>
 <p><a href="{{ route('edificios.web.index') }}">Crear un edificio</a></p>
@else
<form action="{{ route('aulas.guardar') }}" method="post">
 @csrf
 <label for="nombre">Nombre</label>
 <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required><br>
 <label for="capacidad">Capacidad</label>
 <input type="number" name="capacidad" id="capacidad" value="{{ old('capacidad') }}" min="1" required><br>
 <label for="edificio_id">Edificio</label>
 <select name="edificio_id" id="edificio_id" required>
  <option value="">Selecciona un edificio</option>
  @foreach ($edificios as $edificio)
   <option value="{{ $edificio->id }}" @selected(old('edificio_id', $edificioSeleccionado) == $edificio->id)>
    {{ $edificio->nombre }}
   </option>
  @endforeach
 </select><br>
 <label for="wifi">Wi-Fi</label>
 <input type="checkbox" name="wifi" id="wifi" value="1" @checked(old('wifi'))><br>
 <button type="submit">Guardar aula</button>
</form>
@endif
<p><a href="{{ route('edificios.web.index') }}">Volver a edificios</a> | <a href="{{ route('aulas.listar') }}">Ver aulas</a></p>
</body>
</html>
