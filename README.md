# AteneaProyect
**Introducción**

Este repositorio contiene el proyecto desarrollado para la empresa Mi Viejo Molino.
El software está desarrollado en Laravel.

**Integrantes**

Los desarrolladores del proyecto son:
-JUAN ANDRES ALVARADO PEÑUELA
- NICOLAS ANDRES OLAYA GAMBA
- NORMAN FELIPE CLAVIJO PAREDES
- CRISTIAN CAMILO SOTO RODRIGUEZ  
- BRAYAN FERNANDO GUEVARA ARDILA


**Entorno para ejecutar la aplicación de manera local:**

Para desarrollar la aplicación hemos dispuesto del uso de: XAMPP (Apache y MySQL) .


La ejecución en XAMPP se recomienda realizar desde la rama main.

**Requisitos XAMPP:**
- MariaDB ^10.4.22
- PHP ^8.0.2

**Paso a paso para la ejecución XAMPP**
- 1. Ejecutar XAMPP.
- 2. Clonar el repositorio.
- 3. Descargar el archivo .env del siguiente link: https://drive.google.com/file/d/1VKQADISoXneKMYQwK3xLXtA3-VGKfIE9/view?usp=sharing o crear un archivo .env dentro del root del repositorio y copiar el contenido del archivo .env.example en el archivo .env recien creado.
- 4. Descomentar las variables de entorno para XAMPP que se encuentran comentadas.
![image](https://user-images.githubusercontent.com/90289220/173258037-4219a3cd-c444-4342-a6e4-6dc9ef3cdd28.png)

- 5. Crear una base de datos en un servidor local que se encuentre en el puerto 3306. El nombre de la base de datos debe ser: ateneadb
-6. Crear archivo ".env" copiando la informacion del archivo ".env.example"
- 7. En la terminal de comandos, ubicado en la ruta del repositorio, ejecutar el comando: composer install. Para instalar las librerias requeridas para la ejecución del aplicativo.
- 8. Una vez terminada la ejecución del comando anterior ahora se debe ejecutar el comando: php artisan migrate:fresh --seed
- 9. Por ultimo, ejecutar el comando php artisan serve.

- 10. Para la visualizacion de imagenes debe de crear en enlace simbolico, por lo que debera ejecutar el comando : $ php artisan storage:link

-11. Para que la generacion de los reportes sea posible se debera de ejecutar el siguiente comando: composer require barryvdh/laravel-dompdf


- 12. El aplicativo estará disponible dentro del puerto 8000 del localhost.




**Autenticación**
Para ingresar al sistema se puede realizar mediante los siguientes datos de usuario:

 - Correo electronico: jaalvarado342@misena.edu.co
 - Password: 123456
 
