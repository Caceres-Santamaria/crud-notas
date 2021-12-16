<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Descripción de la aplicación

Esta aplicación es un simple crud de notas o recordatorios creado con:
- [Laravel](https://laravel.com/) en su versión 8
- [livewire](https://laravel-livewire.com/)
- [alpineJS](https://alpinejs.dev/)
- [tailwindCss](https://tailwindcss.com/)

Además hace uso de dos bases de datos las cuales están contenerizadas con Docker, Mysql para la persistencia de las notas y Redis para contar el número de visitas que recibe la aplicación web

## Creación de los contenedores con Docker

Creación del contenedor de Mysql 8.0
- **docker run --name mysql-notas -p 3308:3306 -e MYSQL_ROOT_PASSWORD=admin -e MYSQL_DATABASE=notas -d mysql:8.0**

Creación del contenedor de Redis 6.2
- **docker run --name redis-notas -p :6380:6379 -d redis:6.2**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
