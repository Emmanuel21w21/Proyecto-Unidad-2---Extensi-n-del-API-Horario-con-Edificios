<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Aulas</title>
</head>
<body>
<h1>Aulas</h1>
@if (session('status'))
 <p>{{ session('status') }}</p>
@endif
<table border="1">
 <thead>
  <tr>
   <th>Id</th>
   <th>Nombre</th>
   <th>Edificio</th>
   <th>Capacidad</th>
   <th>Wi-Fi</th>
   <th>Acciones</th>
  </tr>
 </thead>
 <tbody>
 @forelse ($aulas as $aula)
  <tr>
   <td>{{ $aula->id }}</td>
   <td>{{ $aula->nombre }}</td>
   <td>{{ $aula->edificio?->nombre ?? 'Sin edificio' }}</td>
   <td>{{ $aula->capacidad }}</td>
   <td>{{ $aula->wifi ? 'Sí' : 'No' }}</td>
   <td>
    <a href="{{ route('aulas.actualizar', $aula->id) }}">Editar</a>
    <form action="{{ route('aulas.borrar', $aula->id) }}" method="post">
     @csrf
     @method('DELETE')
     <button type="submit">Eliminar</button>
    </form>
   </td>
  </tr>
 @empty
  <tr><td colspan="6">Todavía no hay aulas.</td></tr>
 @endforelse
 </tbody>
</table>
<p><a href="{{ route('aulas.agregar') }}">Agregar aula</a></p>
<p><a href="{{ route('edificios.web.index') }}">Ver edificios</a></p>
</body>
</html>
