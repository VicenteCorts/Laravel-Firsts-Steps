<h1>Formulario en Laravel</h1>
<form action="{{url('/recibir')}}" method="POST">
    {{csrf_field()}}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"/>
    <br/>
    <label for="email">Email</label>
    <input type="email" name="email"/>
    <br/>
    <input type="submit" value="enviar"/>
</form>
