<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Descripción de la aplicación

Esta aplicación es un simple crud de notas o recordatorios creado con:
- [Laravel 8](https://laravel.com/)
- [livewire](https://laravel-livewire.com/)
- [alpineJS](https://alpinejs.dev/)
- [tailwindCss](https://tailwindcss.com/)

Además hace uso de dos bases de datos las cuales están contenerizadas con Docker. Mysql para la persistencia de las notas y Redis para contar el número de visitas que recibe la aplicación web

## Creación de los contenedores con Docker

Creación del contenedor de Mysql 8.0
- **docker run --name mysql-notas -p 3308:3306 -e MYSQL_ROOT_PASSWORD=admin -e MYSQL_DATABASE=notas -d mysql:8.0**

Creación del contenedor de Redis 6.2
- **docker run --name redis-notas -p 6380:6379 -d redis:6.2**

## Dependencias

- **PHP 8**
- **Composer**

## Extensiones de PHP 8 necesarias para ejecutar Laravel

- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Instalación de PHP 8 en en Ubuntu 20.04 | 18.04

Para instalar este lenguaje en linux puede consultar [aquí](https://ubunlog.com/php-8-0-instalar-lenguaje-en-ubuntu/) para tener una mejor guía, de lo contrario ejecute los siguientes comandos en la terminal:
- **sudo apt update; sudo apt upgrade**
- **sudo apt install ca-certificates apt-transport-https software-properties-common**
- **sudo add-apt-repository ppa:ondrej/php**
- **sudo apt install php8.0**
- **php -v**

## Instlatación de las extensiones de php 8 necesarias para ejecutar Laravel

Para instalar las extensiones necesarias si está en linux, puede ejecutar el siguiente comando:
- **sudo apt install php8.0-BCMath php8.0-Ctype php8.0-Fileinfo php8.0-JSON php8.0-Mbstring php8.0-PDO php8.0-Tokenizer php8.0-XML php8.0-mysql**

## Instalación de Composer 

Para la gestión de dependencias de PHP se debe tener composer instalado, para instalarlo en Ubuntu debe tener instalado ya PHP, para tener una guía puede entrar [aquí](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-es) o puede ejecutar los siguientes comandos:
- **sudo apt update**
- **sudo apt install php-cli unzip**
- cd ~
- **curl -sS https://getcomposer.org/installer -o composer-setup.php**
- **HASH=`curl -sS https://composer.github.io/installer.sig`**
- **php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"**
- **sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer**
- **composer --version**

## Pasos para Correr la aplicación

Una vez ya teniendo PHP8, sus extensiones necesarias, Composer y los contenedores creados, se deben seguir los siguientes pasos:

- Clonar este repositorio con el siguiente comando:
    - **git clone https://github.com/Caceres-Santamaria/crud-notas.git**
- entrar al proyecto y una vez allí ejecutar el siguiente comando: 
    - **composer install**
- ejecutar las migraciones de Laravel para crear las tablas necesarias en la base de datos e ingresar unos datos de prueba, si el contenedor quedó bien creado, no tendría por qué haber problema para conectarse a la base de datos con el siguiente comando:
    - **php artisan migrate --seed**.
- Ejecutar el servidor web mediante el siguiente comando:
    - **php artisan serve**
- Entrar a la URL **http://127.0.0.1:8000** desde su navegador preferido, la plicación sólo responde a la ruta raíz, ya que es la única ruta creada y en donde se encuentra el Crud

Una  vez ejecutado todos los anteriores pasos, si todo estuvo bien podría ver la aplicación corriendo en su navegador, en la parte superior derecha se puede ver un contador de visitas que se obtiene mediante redis y este se incrementa cada vez que se solicita la ruta raíz, entonces si desea ver incrementarse, basta con recargar la página y el contador, debería aumentar, si desea obtener esta variable entrando al contenedor de Redis debe ejecutar los siguientes pasos desde su CLI:

- **docker exec -it redis-notas bash**
- **redis-cli**
- **get notas_visitas**

## Características de la aplicación

La aplicación brinda las siguientes características:
- Buscar las notas por el título
- Agregar una nota
- Ver las notas creadas
- Editar las notas
- Eliminar las notas
- Contar el número de visitas que ha tenido la aplicación
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
