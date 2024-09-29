<h1>{{$fruta->nombre}}</h1>
<p>{{$fruta->descripcion}}</p>

<a href="{{url('frutas/editar', ['id'=>$fruta->id])}}">Actualizar</a>
<a href="{{url('frutas/delete', ['id'=>$fruta->id])}}">Eliminar</a>