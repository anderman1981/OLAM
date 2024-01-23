# Nombre del Proyecto

Prueba de codigo para Olam.

## Recursos Especiales

- **Laravel Framework:** Versión 10.41.0 - Descripción breve de Laravel y su importancia en el proyecto.

## Tecnologías Utilizadas

- **PHP:** Versión 8.1 - Lenguaje de programación principal.
- **Composer:** Versión 2.5.5 - Herramienta para la gestión de dependencias en PHP.

## Instalación

1. Clona el repositorio: `git clone https://github.com/anderman1981/OLAM`
2. Instala las dependencias de PHP: `composer install`
3. Copia el archivo de configuración: `cp .env.example .env`
4. Genera la clave de aplicación: `php artisan key:generate`
5. Instala livewire de laraver: `composer required livewire/livewire`
6. COpiar archivos activos: `php artisan livewire:publish --assets`
7. Lanzar servicio: `php artisan serve`

## Uso

Este proyecto es una prueba de código para buscar un listado de palabras en una matriz de datos, simulando una sopa de letras.

En el input se deben ingresar las palabras que se quieren buscar: MANATI,PERRO,GATO,CONEJO,TIBURON,ELEFANTE,ALCON,SERPIENTE,JAGUAR,CANGURO,LOBO,MONO,NUTRIA,LEON,LORO,TORO,ORUGA

En el textarea ingresar la matriz:


`N,D,E,K,I,C,A,N,G,U,R,O,G,E
S,X,R,Y,K,V,I,I,Q,G,W,Q,O,D
J,A,G,U,A,R,Z,W,B,N,K,O,U,A
M,L,E,L,E,F,A,N,T,E,H,O,G,W
L,O,B,O,N,U,T,R,I,A,O,U,S,U
W,W,O,S,O,G,A,T,O,V,R,T,M,O
H,L,Z,N,C,T,Y,Z,E,O,X,A,U,R
C,E,C,Y,T,I,B,U,R,O,N,S,R,O
C,O,N,E,J,O,Y,U,S,M,R,S,H,T
Y,N,I,F,E,F,P,T,E,Z,O,O,S,F
O,S,S,E,R,P,I,E,N,T,E,F,L,G
P,P,V,D,D,X,U,F,A,L,C,O,N,Y
M,O,N,O,C,U,Q,W,M,A,N,A,T,I
N,N,X,H,E,B,P,M,U,P,E,R,R,O`

El aplicativo buscara el listado de palabras y mostrara las encontradas y la que no encuentra.


## Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.


## .env

APP_NAME=OLAM

APP_ENV=local

APP_KEY=base64:HAUbBHLnQcuUTwLPgNIRrUvXZLAg1zTV1Og+TnwrfEM=

APP_DEBUG=true

APP_URL=http://olam.test


LOG_CHANNEL=stack

LOG_DEPRECATIONS_CHANNEL=null

LOG_LEVEL=debug


DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD=


BROADCAST_DRIVER=log

CACHE_DRIVER=file

FILESYSTEM_DISK=local

QUEUE_CONNECTION=sync

SESSION_DRIVER=file

SESSION_LIFETIME=120


MEMCACHED_HOST=127.0.0.1


REDIS_HOST=127.0.0.1

REDIS_PASSWORD=null

REDIS_PORT=6379


MAIL_MAILER=smtp

MAIL_HOST=mailpit

MAIL_PORT=1025

MAIL_USERNAME=null

MAIL_PASSWORD=null

MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS="hello@example.com"

MAIL_FROM_NAME="${APP_NAME}"


AWS_ACCESS_KEY_ID=

AWS_SECRET_ACCESS_KEY=

AWS_DEFAULT_REGION=us-east-1

AWS_BUCKET=

AWS_USE_PATH_STYLE_ENDPOINT=false


PUSHER_APP_ID=

PUSHER_APP_KEY=

PUSHER_APP_SECRET=

PUSHER_HOST=

PUSHER_PORT=443

PUSHER_SCHEME=https

PUSHER_APP_CLUSTER=mt1


VITE_APP_NAME="${APP_NAME}"

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"

VITE_PUSHER_HOST="${PUSHER_HOST}"

VITE_PUSHER_PORT="${PUSHER_PORT}"

VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"

VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


Estructura base

.

├── app

│   ├── Console

│   ├── Exceptions

│   ├── Http

│   │   ├── Controllers

│   │   └── Middleware

│   ├── Models

│   ├── Modules

│   │   └── Alphabet

│   │       └── Controllers

│   └── Providers

├── bootstrap

│   └── cache

├── config

├── database

│   ├── factories

│   ├── migrations

│   └── seeders

├── public

│   └── files

├── resources

│   ├── css

│   ├── js

│   └── views

├── routes

├── storage

│   ├── app

│   │   └── public

│   ├── framework

│   │   ├── cache

│   │   │   └── data

│   │   ├── sessions

│   │   ├── testing

│   │   └── views

│   └── logs

├── tests

│   ├── Feature

│   └── Unit
