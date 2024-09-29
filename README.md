# Laravel-Firsts-Steps
Primeros pasos en Laravel siguiendo el curso de Victor Robles de Udemy-Master en PHP, SQL, POO, MVC, Laravel, Symfony, WordPress +

# Clase 320 - Instalar Laravel
### Enlaces:
- https://www.udemy.com/course/master-en-php-sql-poo-mvc-laravel-symfony-4-wordpress/learn/lecture/11883144#questions/13340312
- https://laravel.com/docs/11.x/installation
- https://getcomposer.org/download/ || https://getcomposer.org/

### Pasos:
- Atendiendo a la clase Victor Robles, primero debemos cambiar la versión de PHP a una compatible con la versión de Laravel que vayamos a instalar. En mi caso instalaré Laravel 11 y cambiaré la verión de PHP de la 8.2.13 a la 8.3.0.
- Para cambiar la versión de PHP nos vamos a Equipo, clic derecho propiedades, variables de entorno>path editamos y cambiamos la versión de PHP.
- También actualizaremos composer (a día de hoy versión2.7.9) para que sea compatible con la nueva versión de PHP.
- Tras la instalación de composer debemos atender a qué más extensiones necesita Laravel para funcionar correctamente. Para ello podemos ir al panel de wampp>php>extensiones php y marcar las que necesitemos. (IMPORTANTES: OPENSSL, PDO y MBSTRING -> También se mencionan pero no se instalan en el video: XML PHP, CTYPE PHP, JSON PHP).
- En módulos de apache debemos marcar también el módulo REWRITE.

### Inicio del Proyecto
- Abrimos cmd y nos vamos a la carpeta del curso en el que estamos trabajando: A:\wamp64\www\master-php>
- Escribimos el comando: 
- composer create-project laravel/laravel example-app -> EN MI CASO -> 
- **composer create-project laravel/laravel 09aprendiendo-laravel "11.*" --prefer-dist**
- (composer create-project laravel/laravel-no tocar|09aprendiendo-laravel-nombre de la carpeta a crear|"11.*" -versión del laravel| --prefer-dist -ni idea)

# Clase 321 - Instalar Extensiones PHP
### Instalar extensiones de php en Wamp server
- Nos dirigimos al directorio en el que tenemos instalada la versión de php: A:\wamp64\bin\php\php8.3.0\ext
- Aquí veremos todas las extensiones instaladas.
- Debemos buscar los .dll en internet de las extensiones: Tokenizer, XML, Ctype y JSON.
- Copiar los archivos .dll en la carpeta anterior de extensiones
- Reiniciar el wamp server 
- Dará error porque hay que configurar el archivo php.ini
- Dentro de php.ini Ctrl + B -> extension
- Añadir al final:
	extension=php_tokenizer
	extension=php_xml
	extension=php_ctype
	extension=php_json
-Reiniciar y activar las nuevas extensiones

#### Enlaces para descargar las extensiones:
- https://www.dlldownloader.com/php_tokenizer-dll/
- https://www.dlldownloader.com/php_xmlrpc-dll/
- https://www.dlldownloader.com/php_ctype-dll/
- http://www.originaldll.com/file/php_json.dll/31989.html

# CLASE 322 Crear un Host virtual
Seguir los pasos del enlace de Victor Robles: https://victorroblesweb.es/2016/03/26/crear-varios-hosts-virtuales-en-wampserver/

1. Entrar al fichero C:\wamp\bin\apache\apache2.4.9\conf\httpd.conf y añadir o descomentar el include del fichero de los hosts virutales:
	Include conf/extra/httpd-vhosts.conf

2. Entrar al fichero C:\wamp\bin\apache\apache2.4.9\conf\extra\httpd-vhosts.conf y añadir los virtualhosts, en mi caso voy a crear 3 nuevos virtualhosts, uno para localhost, otro para un proyecto de Zend Framework 2 y otro para un proyecto de Symfony 3.
	<VirtualHost *:80>   
    		DocumentRoot "c:/wamp/www/symfony3"
    		ServerName symfony3.com.devel
    		ServerAlias www.symfony3.com.devel
    		<Directory "c:/wamp/www/symfony3/web">
        		Options Indexes FollowSymLinks     
        		AllowOverride All
        		Order Deny,Allow
        		Allow from all     
    		</Directory> 
	</VirtualHost>

3. Modificamos el texto anterior:
	DocumentRoot "${INSTALL_DIR}/www/master-php/09aprendiendo-laravel/public/"
    	ServerName 09aprendiendo-laravel.com.devel
    	ServerAlias www.09aprendiendo-laravel.com.devel
    	<Directory "${INSTALL_DIR}/www/master-php/09aprendiendo-laravel/public/">

4. Añadir al fichero hosts de nuestro sistema, en el caso de Windows C:\Windows\System32\drivers\etc\hosts (si estas en Windows 8 o 10 ejecuta el programa de edición de código como Administrador para poder guardar los cambios), y añadir las IP y las url.
	127.0.0.1 09aprendiendo-laravel.com.devel (El ServerName escogido)

5. Reiniciamos el wamp y comprobamos en el navegador si la url: 09aprendiendo-laravel.com.devel nos lleva al proyecto.

6. REALMENTE HE AGREADO EL VHOST A TRAVES DEL PANEL DE LOCALHOST; AÑADIENDO DE MANERA AUTOMATICA ESTE TEXTO A LOS SIGUIENTES ARCHIVOS

- A:\wamp64\bin\apache\apache2.4.58\conf\extra ->httpd-vhost.conf
>```html
><VirtualHost *:80>
>	ServerName aprendiendo-laravel.com.devel
>	DocumentRoot "a:/wamp64/www/master-php/09aprendiendo-laravel/public"
>	<Directory  "a:/wamp64/www/master-php/09aprendiendo-laravel/public/">
>		Options +Indexes +Includes +FollowSymLinks +MultiViews
>		AllowOverride All
>		Require local
>	</Directory>
></VirtualHost>

- C:\Windows\System32\drivers\etc -> hosts
127.0.0.1	aprendiendo-laravel.com.devel
::1	aprendiendo-laravel.com.devel

# Clase 323 Estructura de Proyecto
### Explicación básica de los directorios

# Clase 324
### Archivo web.php (ubicado en directorio routes)
Devuelve una vista.

#### Metodos http
- GET: conseguir datos
- POST: guardar datos o recursos
- PUT: Actualizar recursos
- Delete: Eliminar recursos

#### Creación de ruta

>```html
>	Route::get('/mostrar-fecha', function(){
>    		echo "<h1>FECHA ACTUAL</h1>";
>  		echo date('d-m-y');
>   		echo "<h2><a href='/'>Inicio</a></h2>";
>	});

### Pantalla de errores
Te muestra una pantalla adicional señalando el error cometido. En algunas versiones te lleva a enlaces con soluciones en el navegador.

### Crear Vistas
Dirección de los archivos de vistas: project/resources/views
- A la hora de crear vistas tenemos que añadir la temrinación .blade andtes de la terminación del tipo de archivo; ejemplo: mostrar-fecha.blade.php
- Creamos el archivo dentro de la ruta indicada para las vistas y metemos en este todo el código anterior para imprimir información por pantalla
- Dejaríamos el archivo web.php así:
>```html	
>	Route::get('/mostrar-fecha', function(){
>    		$titulo = "Estoy mostrando la fecha";
>    		return view('mostrar-fecha', array(
>        	'titulo' => $titulo
>   		 ));
>	});

- ##### return view('mostrar-fecha'); Método para imprimir vistas
- El nuevo archivo para vistas (mostrar-fecha.blade.php) quedaría así:
>```html
>	<?php
>	echo "<h1>$titulo</h1>";
>	echo date('d-m-y');
>	echo "<h2><a href='/'>Inicio</a></h2>";

# Clase 325 Parámetros de las Rutas
### Añadir parámetro para la url
- #### Route::get('/pelicula/{titulo}', function ($titulo){ DESARROLLO DE LA FUNCIÓN });

>```html
>	Route::get('/pelicula/{titulo}', function ($titulo){
>    		return view('pelicula', array(
>        	'titulo' => $titulo
>    		));
>	});

- Ahora al escribir en la url: http://aprendiendo-laravel.com.devel/pelicula/Batman  -> Imprime por pantalla Batman
- También se puede manipular para que si no se pasa el parámetro tenga un mensaje por defecto, para ello:
- #### Route::get('/pelicula/{titulo?}', function ($titulo = 'No hay película seleccionada'){...}

# Clase 326 Parámetros Opcionales
### Condiciones en las Rutas

- Podemos Establecer condiciones al final del módulo de ruta incluyendo la cláusula -> 'where'
- Y hacer obligatorios o nos los parámetros (titulo o year) mediante el símbolo -> '?'

>```html
>Route::get('/pelicula/{titulo}/{year?}', function ($titulo = 'No hay película seleccionada', $year = 2024){
>    return view('pelicula', array(
>        'titulo' => $titulo,
>        'year' => $year
>    ));
>})->where(array(
>    'titulo'=> '[a-zA-Z]+',
>    'year'=> '[0-9]+'
>));

- En este ejemplo, el parámetro 'titulo' es boligatorio, mienstras que 'year' no [year viene seguido de '?']
- Por otro lado en la parte de la condición 'where', la web dará error 404 cuando 'titulo' presente números y/o 'year' presente letras

# Clase 327 Consola Artisan
### Toma de contacto con la consola Artisan
- Accedemos a la consola (cualquiera) y nos vamos a la ruta del proyecto
- $ php artisan (listado de comandos de Artisan)
- $ php artisan route:list (listado de las rutas disponibles)
- $ php artisan make:controller PruebasController (para crear controladores)
	+ La ruta de este controlador sera: A:\wamp64\www\master-php\09aprendiendo-laravel\app\Http\Controllers

# Clase 328 Vistas en Laravel
### Vistas y Parámetros
Presta atención a los comentarios del siguiente código:

>```html
>Route::get('/listado-peliculas', function () { //Nombre de la url, no tiene porque ser como la ruta
>    $titulo = "Listado de Películas";
>    $listado = array('Batman', 'Spiderman', 'Gran Torino');
>
>// EJEMPLO ANTERIOR DE RETURN, EL EJEMPLO ACTUAL ES EL QUE VIENE ABAJO CON LOS WITH    
>//    return view('peliculas.listado', array(
>//        'titulo' => $titulo
>//    ));
>
>    return view('peliculas.listado') //Carpeta.Archivo
>            ->with('listado', $listado) //Parámetros adicionales con método 'with'
>            ->with('titulo', $titulo);  //Parámetros adicionales con método 'with'
>});


# Clase 329 Interpolación en Blade
### Blade
Laravel funciona con blade para gestionar plantillas y vistas. Se trata de una librería "php".Podemos emplear todo lo aprendido de php en el curso; sin embargo, se puede hacer **Interpolación de Variables**:
- <?=$variable?> (en php)
- {{$variable}} (blade)
- La sintaxis de **Blade** son más amigables para las vistas y plantillas de Laravel

# Clase 330 Comentarios en Blade
### Comparación de comentarios en html, php y Blade

>```html
>	<!--Comentario HTML-->
>	// Comentario PHP
>	{{-- Comentario BLADE --}}

# Clase 331 Mostrar cuando Existe
### Mostrar variable solo si existe
- En php: <?= isset($variable) ? $variable : 'No hay varaible'; ?>
- ~~En blade: {{$variable or 'No hay variable'}}~~
- En blade: {{$variable ?? 'No hay variable'}}

# Clase 332 If's en Vistas
### Declaración
>```html
>	@if($titulo && count($listado)>=2)
>	    <h1>La variable existe: {{$titulo}} y el listado es mayor o igual a 5</h1>
>	@elseif($titulo)
>	    <h1>titulo existe pero listado no es mayor qe 5</h1>
>	@else
>	    <h1>El título no existe</h1>
>	@endif

# Clase 333 Bucles en Vistas
### Estructuras de control principales

```html
<!-- Bucles -->

@for($i=1; $i<=20; $i++)
El número es: {{$i}} </br>
@endfor

<hr/>

<?php $contador = 1 ?>
@while($contador <50)
    @if($contador % 2 == 0)
        NUMERO PAR: {{$contador}} <br/>
    @endif
    <?php $contador++; ?>
@endwhile

<hr/>

@foreach ($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach
```

# Clase 334 Includes en Vistas
### Implementación
Sigue una implementación distinta a los "includes" de vistas principales (los Route::get() vistos en apartados anteriores)
```html
<!-- Includes en las vistas -->
@include('includes.header')
@include('includes.footer')
```
- No hace falta ";"

# Clase 335 Plantilla base o Layout
### Plantillas Maestras
- En Laravel las Plantillas Maestras se definen en el directorio ** recourses/views**
- Creamos en esta carpeta, una llamada layouts (Es común crearla para las plantillas e includes)
- Con blade podemos crear bloques para posteriormente incluirlos en las vistas

### @yield()
Variable para sustituir / se usa para variables de contenido no para bloques de plantilla

### Secciones
- Se declaran con @section ('header')
- Se cierran con @show

### Difenrecia entre @yield y @section
- **yield** no tiene un contenido predeterminado
- **section** puede tener contenido predeterminado
- Ambos son sustituibles 

### Extends
- @extends('layouts.master') para imprimir la vista master.blade.php en el archivo pagina.blade.php
- dentro de la pagina.blade.php debemos indicar @section('nombre del yield o section que extiende - nombrado igual') y despues del bloque **@stop**
- Podemos sustituir directamente cosas de la plantilla padre empleando @section('') - @stop
- Si queremos añadir (en vez de sustituir) a lo que hay en la plantilla padre empleamos @parent()

# Clase 336 Controladores Básicos
### Ruta de los controladores y creación
Los controladores se encuentran en el directorio app/http/controllers
- Aqui podríamos crearlos manualmente
Para crearlos por consola, seguiríamos los sigueintes pasos.
- Abrimos la consola y vamos al directorio de nuestro proyecto
- php artisan make:controller NombreControlador

### Construyendo el controlador
En el archivo del controlador creado debemos completar el controlador para que realice las acciones deseadas por ejemplo:
```html
public function index() {
        $titulo ='Listado de mis películas';
        return view('pelicula.index', [
            'titulo' =>$titulo
        ]);
    }
```
### Más sobre Controladores
Luego debemos crear la ruta en web.php
- primero importamos el namespace **use App\Http\Controllers\PeliculaController;**
- luego creamos la ruta sigueindo la siguiente  **Route::get('peliculas', [PeliculaController::class, 'index']);**

Más info:
- Podemos cambiar la última línea para hacer que lleguen parámetros
- Route::get('peliculas/{pagina?}', [PeliculaController::class, 'index']);
- con "?" hacemos que el parámetro sea opcional; para que si no añadimos nada en la url tome el parámetro con valor default, pero si añadimos algo (peliculas/2) el nuevo parámetro es "2"

# Clase 337 Controladores Resource
### Creando Rutas Resources
Crear un controlador que de manera automática tiene una serie de rutas y métodos ya establecidas
- Para ello creamos un controldor de tipo Resource (con los métodos de CRUD ya definidos dentro) en consola
- **php artisan make:controller UsuarioController --resource**
- Al revisarlo en su directorio podemos ver que viene ya con una serie de métodos definidos

Ahora en el archivo web.php, podemos crear una ruta de tipo resource, para llamar a todos los métodos del Controlador.
 **Route::resource('usuario', UsuarioController::class);** (LARAVEL 11)

- Si en el navegdor ponemos (...)/usuario -> nos llevará al método index de usuario
- Si ponemos (...)/usuario/create -> nos llevará al método create, y así

Para comprobar el listado de rutas: $ php artisan route:list

# Clase 338 Enlaces en Laravel
### Enlaces en Laravel 11
```html
<a href="{{ url('peliculas') }}">Ir al detalle</a>
```
- Prestamos especial atención al fragmento: href="{{ url('peliculas') }}"
- lo que va en paréntsis precedido de "url" es el nombre de la ruta establecida en el archivo web.php

Si quisiéramos pasar un parámetro por url se decleararía así:
```html
<a href="{{ url('/detalle' , ['id'=> 69]) }}">Ir al detalle</a>
```
- **['id'=> 69]**

# Clase 339 Redirecciones
### Creando redireeción de una acción del controlador a otra
```html
    public function redirigir() {
        return redirect('/detalle');
    }
```
Y en el archivo web.php añadiríamos:
```html
Route::get('/redirigir', [PeliculaController::class, 'redirigir']);
```
# Clase 340 Middlewares
Los Middlewares o Filtros son componentes de Laravel que nos permiten filtrar las peticiones que hacemos mediante http. Nos permite realizar cierta lógica antes de mostrar la página
https://laravel.com/docs/11.x/middleware#defining-middleware
### Declarar un middleware:
- Se declaran a través de artisan
- $ php artisan make:middleware NombreMiddleware (en neustro caso "TestYear")
- Los Middleware se crean por consola y se establecen en la carpeta app/http/Middleware

Ahora debemos editralo en el archivo TestYear.php (el propio Middleware que acabamos de crear).
- Añadimos la funcionlaidad dentro de la clase
```html
class TestYear
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
     {
         $year = $request->route('year'); //Aquí puede ser route, input, Auth:: y muchos más en funcion del resultado que busquemos
        
         if(is_null($year) || $year != 2019){
             return redirect('/peliculas');
         }
         return $next($request);
     }
}
```

>	Una vez definido el Middleware, debemos darlo de alta **SI QUEREMOS QUE ACTUE DE FORMA GLOBAL** - (Si es solo para una ruta, no será necesario registrarlo en laravel 11*). Para ello nos dirigimos a bootstrap/app.php
>	```html
>	->withMiddleware(function (Middleware $middleware) {
>	        //
>	        $middleware->append(App\Http\Middleware\TestYear::class); //Esta es la línea para darlo de alta
>	    })
>	```

Por útlimo, para usarlo, debemos anexarlo al final de la ruta que queremos que sea filtrada por el Middleware
```html
Route::get('detalle/{year?}', [PeliculaController::class, 'detalle'])
        ->middleware(App\Http\Middleware\TestYear::class);
```
o también podemos hacer un "use" al principio del archivo y simplificar su escritura por si es para varias rutas
```html
use App\Http\Middleware\TestYear;

(...)

Route::get('detalle/{year?}', [PeliculaController::class, 'detalle'])
        ->middleware(TestYear::class);
```
# Clase 341 Formularios en Laravel
### Formularios
- Creamos un formulario en una nueva vista (junto con su método en el controlador correspondiente y su ruta en web.php)
- Despues debemos importar en el controlador Request: **use Illuminate\Support\Facades\Request;** o **use Illuminate\Http\Request;** en su defecto, para hacer que el formulario funcione
- Y creamos otro método para pasarle el parámetro para obtener los datos del formulario (así como una nueva ruta para este)
```html
public function recibir(Request $request) {
        $nombre = $request->input('nombre');
        var_dump($nombre);
        die();
    }
```
- La ruta del método"recibir" va por post-> **Route::post('/recibir', [PeliculaController::class, 'recibir']);**
- Al probarlo nos dara error "page expired" porque en Laravel debemos añadir protección a los formularios contra CSRF (?)
- Por lo que el formulario nos debería quedar así
```html
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
```
- **Especial atención a: {{csrf_field()}}**


# Clase 342 Conexión BBDD en Laravel
### Creación de BBDD, Tablas e inserción de registros
Hecho manualmente en phpmyadmin. Encode->utf8mb4_general_ci
-  **Ante posibles fallos de la BBDD inexplicables->$ php artisan config:cache**

### Conexión a la BBDD
Por defecto, en Laravel 11 te "obligan" a trabajar con sqlite; pero en nuestro caso queremos emplear una base de datos hecha en phpmyadmin (MySQL). Para ello debemos seguir los pasos del siguiente video:
https://www.youtube.com/watch?v=xx8mLgWkCIY&ab_channel=CodersFree

**Fichero .env** -> Fichero para modificar ciertos parámetros.
- Modificamos la url del proyecto (empleando la url que creamos en clases anteriores con el vhost)
- Encontramos también el apartado de BBDD:
```html
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```
Habría que modificar el apartado **DB_CONNECTION**:

```html
DB_CONNECTION=mysql //Ya que vamos a utilizar la BBDD de phpmyadmin
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```
**Fichero database.php** (lo encontramos en la carpeta config). Debemos modificar los parámetros de nuestra BBDD en el apartado mysql:
```html
'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'fruteria_master'), //ESPECIAL ATENCIÓN AQUí
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_general_ci'), //ESPECIAL ATENCIÓN AQUí
(...)
```

**Volvemos al archivo .env**. Tras estos cambios una línea de código se cambia automaticamente: SESSION_DRIVER=database
- Debemos cambiarla a **SESSION_DRIVER=file**

Por último, para comprobar que la BBDD se ha conectado, escribimos en el archivo web.php el sigueinte código
```html
Route::get('/', function () {
    echo "<h1>Hola mundo</h1>";
    
    try {
        \DB::connection()->getPDO();
        echo \DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
        echo 'None';
    }
$tables = \DB::select('show tables');
});
```
En la pantalla del index de neustro proyecto debería mostrarse el nombre de nuestra BBDD.

# Clase 343 Migraciones
### Migraciones
Las migraciones son como control de versiones de su base de datos, lo que le permite a su equipo definir y compartir la definición del esquema de la base de datos de la aplicación. Si alguna vez tuvo que decirle a un compañero de equipo que agregue manualmente una columna a su esquema de base de datos local después de realizar los cambios desde el control de fuente, se ha enfrentado al problema que resuelven las migraciones de bases de datos.

### Crear Migraciones
**Ejemplo: crear una nueva tabla llamada usuarios**
- nos dirigimos a la consola y buscamos la carpeta de nuestro proyecto
- $ php artisan make:migration create_usuarios_table
- Si además queremos que Laravel nos cree un schema builder (estructura básica de la tabla) de la tabla emplearemos el sigueinte comando por consola **$ php artisan make:migration create_usuarios_table --table=usuarios**
- Las migraciones se guardan en la carpeta del proyecto **database/migrations**

Una migración cosnta de lo sigueinte:
- imports que necesita ||  Blueprint => esquema builder que nos permite crear las tablas || Schema-> crear la tabla en sí
- método up (crear tabla)
- método down (borrar tabla)

Información adicional en: https://laravel.com/docs/11.x/migrations

#### Blueprint en la función "UP"
Primero creamos la tabla:
```html
public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->integer('edad');
            $table->timestamps();
        });
    }
```

#### Blueprint "DOWN"
```html
public function down(): void
    {
        Schema::drop('usuarios');
    }
```
### Manipulando las Migraciones
https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa
Previamente a empezar con las migraciones y rollbacks debemos modificar el archivo **/app/Providers/AppServiceProvider.php**
- Debido a una incompatibilidad entre el tamaño de una de las columnas de las migraciones por defecto
- En ese archivo debemos incluir:
```html
use Illuminate\Support\Facades\Schema; //ESTA LÍNEA Y...

/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    Schema::defaultStringLength(191); //ESTA LÍNEA
}
``` 
#### Lanzar Migraciones
Consola:
- **$ php artisan migrate**
- Esto ejecutará todas las migraciones. Por defecto en Laravel tenemos 3 migraciones además de la de create_usuarios_table que hemos hecho nosotros. Por lo que se migrarán 4 tablas.

#### Revertir Migraciones
Consola:
- **$ php artisan migrate:rollback**

#### Re-Lanzar Migraciones
Consola:
- **$ php artisan migrate:refresh**

# Clase 344 Migraciones con SQL
### Formato de las peticiones SQL
Para declarar las migraciones de creación de tablas, el código puede resultar un poco engorroso. Es por ello que cabe la posibilidad de realizar las consultas mediante instrucciones SQL. A continuación veremos el código empleado para crear la misma tabla usuarios de la clase anterior (que fue mediante Blueprint, en vez de SQL:

```html
public function up(): void {

    DB::statement("
          CREATE TABLE usuarios(
              id int(255) auto_increment not null,
              nombre varchar (255),
              email varchar(255),
              password varchar (255),
	      PRIMARY KEY(id)
          );"
    );
}
```
- Para ejecutarlo empleamos un **$ php artisan migrate:refresh** para actualizar los cambios.

# Clase 345 Seeders
### Creación Seeders
Mecanismos para rellenar las tablas. Estos se guardan en la ruta database\seeders\frutas_seed.php. Para crearlos se emplea el siguiente comando por consola:
- **$ php artisan make:seed frutas_seed**

### Construir Seeder
Ubicándonos en el propio seeder (frutas_seed) completaremos con el siguiente código de ejemplo:
```html
public function run(): void
    {
        for($i =0; $i<= 20; $i++){
            \DB::table('frutas')->insert(array(
               'nombre'=> "cereza".$i,
               'descripcion'=> "Descripción de la fruta".$i,
	       'precio'=> $i,
               'fecha'=> date('y-m-d')
            ));
            
            $this->command->info('la tabla de frutas ha sido actualizada');
        }
    }
```
Y posteriormente, volvemos a la consola para ejecutar el comando: **$ php artisan db:seed --class=frutas_seed**

##### Solución de error **Class "Database\Seeders\DB" not found** -> https://stackoverflow.com/questions/64406855/laravel-8-class-database-seeders-db-not-found
- Simplemente poner "\" delante de DB

# Clase 346 Listar Datos
### Listar datos
- Creamos un nuevo controlador: FrutaController-> **php artisan make:controller FrutaController**
- Lo abrimos y creamos métodos en él
- **RECORDAR SIEMPRE INCLUIR EL OBJETO DB**

```html
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //ESTE ES EL OBJETO DB PARA QUE FUNCIONEN LAS TAREAS DE BBDD

class FrutaController extends Controller
{
    public function index() {
        $frutas = \DB::table('frutas')->get(); //SELECT * FROM frutas
        
        return view('fruta.index', [
            'frutas'=> $frutas
        ]); //Vista en la que listaremos nuestro contenido
    }
}
```

- Creamos en la carpeta views una carpeta (fruta) y un archivo (index.blade.php) con contenido:
```html
<h1>Listado de frutas</h1>
<ul>
    @foreach($frutas as $fruta)
        <li>{{$fruta->nombre}}</li>
    @endforeach
</ul>
```

- Y por último creamos su ruta en web.php || En el siguiente ejemplo vemos una **ruta agrupada**; para posteriormente reutilizarla en más rutas del mismo controlador
```html
Route::prefix('frutas')->group(function () {
    Route::get('/', [FrutaController::class , 'index']);
    Route::get('/detail/{id}', [FrutaController::class , 'detail']);
    Route::get('/crear', [FrutaController::class , 'crear']);
    Route::get('/guardar', [FrutaController::class , 'save']);
});
```

# Clase 347 Mostrar una Fila
### Query Builder
https://laravel.com/docs/11.x/queries

### Declaración 
Añadimos el método dentro del Controlador
```html
public function detail($id) {
       $fruta = DB:: table('frutas')->where('id', '=', $id)->first(); //el método first saca el objeto "limpio"
       
       return view('fruta.detail',[
           'fruta' => $fruta
       ]);
    }
```
- Creamos la vista correspondiente ->archivo detail.blade.php dentro de la carpeta fruta de views
- Y creamos también la ruta correspondiente: **Route::get('/detail/{id}', 'detail');** (LA AÑADIMOS DENTRO DE LA RUTA GRUPAL DE LA CLASE ENTERIOR)

**DATO CURIOSO**
Hacer enlace con id personal:
```html
<a href="{{url('/detail', ['id' => $fruta->id])}}">ENLACE</a>
```
# Clase 348 Order by
### Declaración
-**->orderBy('id','desc')**	
Incluida en una declaración para DB sería:
```html
public function index() {
	$frutas = DB::table('frutas')
                ->orderBy('id','desc')
                ->get(); //SELECT * FROM frutas

        return view('fruta.index', [
            'frutas'=> $frutas
        ]); //Vista en la que listaremos nuestro contenido
}
```

# Clase 349 Insertar Registros
### Crear página con formulario para inserts
- Creamos un nuevo método en el Controlador para **crear** registro
```html
public function crear() {
        return view('fruta.create');
}
```
- Creamos un nuevo método en el Controlador para **guardar** registro
```html
public function save(Request $request) {
        $fruta = DB::table('frutas')->insert(array(
           'nombre' => $request->input('nombre'), 
           'descripcion' => $request->input('descripcion'), 
           'precio' => $request->input('precio'),
           'fecha' => date('Y-m-d')
        ));


        //Redirección para despues de guardar las frutas
        return redirect('/frutas');
}
```
- Creamos la **vista del return de crear** con un formulario en ella
```html
<h1>Crear un registro Frutal</h1>
<form action="{{url('fruta/guardar')}}" method="POST">
    {{csrf_field()}}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"/>
    <br/>
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion"/>
    <br/>
    <label for="precio">Precio</label>
    <input type="number" name="precio"/>
    <br/>
    <input type="submit" value="Añadir Fruta"/>
</form>
```
- Creamos las rutas correspondientes para los nuevos métodos del controlador:
```html
Route::prefix('frutas')->group(function () {
    Route::get('/', [FrutaController::class , 'index']);
    Route::get('/detail/{id}', [FrutaController::class , 'detail']);
    Route::get('/crear', [FrutaController::class , 'crear']);		//ESTA y..
    Route::post('/guardar', [FrutaController::class , 'save']);		//ESTA  !!! Route::post !!!
});
```
- 

# Clase 350 Borrar Registros
###

# Clase 351 Editar Registros
###

# Clase 352 Aprendiendo Laravel desde caro y paso a paso




















# #
# #
# #
# #
# #
# #
# README ORIGINAL DE LARAVEL

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
