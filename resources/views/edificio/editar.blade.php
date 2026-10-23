<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Editar edificio</title>
</head>
<body>
<nav><a href="{{ url('/') }}">Volver al menú principal</a></nav>
<h1>Editar edificio</h1>
@if ($errors->any())
 <ul>
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
@endif
<form action="{{ route('edificios.web.update', $edificio) }}" method="post">
 @csrf
 @method('put')
 <label for="nombre">Nombre</label>
 <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $edificio->nombre) }}" required maxlength="255">
 <button type="submit">Guardar cambios</button>
</form>
<p><a href="{{ route('edificios.web.index') }}">Cancelar y volver a edificios</a></p>
</body>
</html>
