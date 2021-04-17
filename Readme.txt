Storia

################################################

Web App para Heladería/Confitería

################################################

Especificaciones técnicas:

* Php 7 o superior
* Mysql/MariaDB 5 o superior
* Framework Bootstrap 3 y 4
* Servidor apache 2.4
* Entorno de Desarrollo OS Ubuntu 20.04
* Entorno de Producción FreeBSD 12 (mismas especificaciones técnicas) esto podría cambiar en caso de cambio de servicio de hosting

################################################

Tareas post instalación en servidor

Se deben cambiar los permisos de escritura a los siguientes directorios

* core/sqls
* core/registro/gen_pass
* core/main

se deberá correr el script allow_permissions.sh como superusuario

#################################################

Creación del usuario y base de datos en el servidor MariaDB

crear base de datos "storia"

crear nuevo usuario y luego cambiar datos de conección en archivo ubicado en [core/connection/connection.php]

CREATE USER 'storia'@'localhost' IDENTIFIED BY 'storia';
GRANT ALL PRIVILEGES ON storia . * TO 'storia'@'localhost';
FLUSH PRIVILEGES;

tener en cuenta que sólo el usuario que hemos creado debe poder acceder a esta base de datos

##################################################

