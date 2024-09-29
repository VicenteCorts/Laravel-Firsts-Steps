<h1>{{$fruta->nombre}}</h1>
<p>{{$fruta->descripcion}}</p>

<a href="{{url('frutas/update')}}">Actualizar</a>
<a href="{{url('frutas/delete', ['id'=>$fruta->id])}}">Eliminar</a>