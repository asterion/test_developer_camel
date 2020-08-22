# test_developer_camel
Desarrollo de una Web App PHP

## Requerimientos

* PHP 7.4.3
* PHP PDO Sqlite3
* https://getcomposer.org/

## Configuración

Base de datos en archivo config/configuration.ini

## Levantar server de pruebas

Generar autoload

```
composer dump-autoload
```

Correr servidor php

```
php -S 127.0.0.1:8080 -t public/
```

## Navegacion
user:
  email
  password
  last_login
  role

Navegacion:
  login
    home
      nombre del usuario
      la fecha de su último acceso.
  logout
    Si el usuario permanece inactivo más de 3 minutos, la sesión será caducada.
