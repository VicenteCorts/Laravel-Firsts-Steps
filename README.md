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
