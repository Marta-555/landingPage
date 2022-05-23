LANDINGPAGE
===========

Pasos a seguir para la instalación del proyecto en nuestro repositorio local:
------------------------------------------------------------------------------

Versiones de configuración:

 - PHP8.0
 - Composer 2
 - Symfony 6.0


Instalación del proyecto

1) Clonamos el repositorio: `https://github.com/Marta-555/landingPage.git`

2) Entramos en el directorio: `cd landingPage`

3) Seleccionamos la rama que nos interesa: `git checkout master`

4) Instalamos vendors del proyecto: `composer install -o`

5) Verificamos los requisitos de symfony e instalamos lo necesario para que funcione nuestro proyecto: `symfony check:requirements`

6) Modificamos el archivo .env para configurar el envío de correos (línea 47):

    - Cambiar db_user, db_password y versión del servidor MySQL:
        DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/landingPage?serverVersion=5.7&charset=utf8mb4"

    - Añadir correo y contraseña desde donde enviaremos los email:
        MAILER_DSN=gmail+smtp://"CORREO":CONTRASEÑA@default

7) Creamos la BD: `php bin/console doctrine:database:create`
    - Creamos las tablas: `php bin/console make:migration` `php bin/console doctrine:migrations:migrate`

8) Iniciamos el servidor: `symfony server:start`


9) Todo listo!
