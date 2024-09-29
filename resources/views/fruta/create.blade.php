@if (isset($fruta)&& is_object($fruta)) 
<h1>Editar Fruta</h1>
@else
<h1>Crear un registro Frutal</h1>
@endif

<form action="{{isset($fruta) ? url('frutas/update') : url('frutas/guardar')}}" method="POST">
    {{csrf_field()}}

    @if (isset($fruta)&& is_object($fruta)) 
    <input type="hidden" name="id" value="{{$fruta->id}}"/>
    @endif

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{$fruta->nombre ?? ''}}"/>
    <br/>
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{$fruta->descripcion ?? ''}}"/>
    <br/>
    <label for="precio">Precio</label>
    <input type="number" name="precio" value="{{$fruta->precio ?? ''}}"/>
    <br/>
    <input type="submit" value="Añadir Fruta"/>
</form>