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
- Escribimos el comando: composer create-project laravel/laravel example-app -> EN MI CASO -> composer create-project laravel/laravel 09aprendiendo-laravel "11.*" --prefer-dist
- (composer create-project laravel/laravel-no tocar|09aprendiendo-laravel-nombre de la carpeta a crear|"11.*" -versión del laravel| --prefer-dist -ni idea)
