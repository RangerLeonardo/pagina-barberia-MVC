# Guía de Inicio Rápido: Visualización del Proyecto en el Navegador 🚀

¡Hola! Esta guía te ayudará a descargar, configurar y visualizar este proyecto en tu navegador. Sigue estos pasos y tendrás todo listo en poco tiempo.

---

## 📋 Paso 1: Verificación de Requisitos Previos

Antes de comenzar, asegúrate de tener instalado el siguiente software en tu computadora. Si ya cuentas con alguno, ¡excelente! Si no, aquí te dejo los enlaces y una breve guía:

1.  **PHP**: Necesario para que el servidor funcione.
    * Si no lo tienes, puedes seguir esta guía para instalarlo: [Guía de Instalación de PHP](https://github.com/RangerLeonardo/Install-PHP)

2.  **Composer**: Herramienta para manejar las dependencias del proyecto del lado del servidor.
    * Puedes descargarlo desde aquí: [Descargar Composer](https://getcomposer.org/download/)
    * Busca el enlace que dice: "Download and run Composer-Setup.exe" y sigue las instrucciones de instalación.

3.  **Node.js**: Necesario para gestionar paquetes del lado del cliente (como estilos y scripts).
    * Descárgalo desde su página oficial: [Descargar Node.js](https://nodejs.org/en) (se recomienda la versión LTS).

4.  **MySQL**: Sistema de gestión de bases de datos donde se almacenará la información del proyecto.
    * Descárgalo desde aquí: [Descargar MySQL](https://dev.mysql.com/downloads/mysql/) (te recomiendo la versión "Community Server" o la LTS si está disponible).
    * Durante la instalación, se te pedirá establecer una **contraseña de usuario root**. ¡Anótala bien, la necesitarás más adelante!

---

## 📥 Paso 2: Descargar el Proyecto

1.  **Ubica el botón "Code"**: En la parte superior derecha de esta página de GitHub, verás un botón verde que dice `<> Code` (o "Código").
2.  **Haz clic en él**: Se desplegará un menú.
3.  **Descarga el ZIP**: En la parte inferior de ese menú, selecciona la opción "**Download ZIP**".
    ![Imagen de botón de descarga](https://docs.github.com/assets/cb-20363/images/help/repository/code-button.png)
4.  **Ubica y Descomprime**: Ve a la carpeta donde se descargó el archivo ZIP (usualmente "Descargas") y descomprímelo. Esto creará una carpeta con el nombre del repositorio, por ejemplo: `pagina-barberia-mvc`.

---

## ⚙️ Paso 3: Configuración Inicial y Dependencias

1.  **Accede a la Carpeta del Proyecto**: Abre la carpeta que acabas de descomprimir (ej. `pagina-barberia-mvc`).

2.  **Abre la Terminal (CMD)**:
    * Dentro de la carpeta del proyecto, haz clic en la **barra de direcciones** (donde aparece la ruta de la carpeta, al lado de la barra de búsqueda de archivos).
    * La ruta se seleccionará (se pondrá azul).
    * Escribe `cmd` en esa barra y presiona **Enter**.
    * Se abrirá una ventana negra o azul oscuro; esta es la consola o terminal. **Mantén esta ventana abierta, la usarás también más adelante.**

3.  **Instala Dependencias del Frontend**: En la terminal que acabas de abrir, escribe el siguiente comando y presiona **Enter**:
    ```bash
    npm install
    ```
    Espera a que termine de descargar e instalar los paquetes. Verás que aparecen varias líneas de texto.

4.  **Instala Dependencias del Backend**: Una vez que el comando anterior haya finalizado, escribe el siguiente comando y presiona **Enter**:
    ```bash
    composer install
    ```
    Esto descargará los paquetes necesarios para el funcionamiento del servidor.

---

## 🗄️ Paso 4: Configuración de la Base de Datos (MySQL)

El proyecto necesita una base de datos para funcionar. Vamos a crearla y a cargar los datos iniciales usando la consola de MySQL.

1.  **Abre la Consola de MySQL**:
    * Abre una **nueva** terminal o CMD (puedes buscar "cmd" en el menú de inicio de Windows) presiona la tecla windows y luego escribe cmd para que la ruta sea desde el inicio de windows.
    * Escribe el siguiente comando para conectarte a MySQL como usuario `root` (o el usuario principal que configuraste). Se te pedirá la contraseña que estableciste durante la instalación de MySQL.
      ```bash
      mysql -u root -p
      ```
    * Ingresa tu contraseña de MySQL y presiona Enter. Si todo es correcto, verás un saludo de bienvenida de MySQL y el prompt cambiará a `mysql>`.

 * Escribe el siguiente comando para conectarte a MySQL como usuario `root` (o el usuario principal que configuraste). Se te pedirá la contraseña que estableciste durante la instalación de MySQL.
      ```bash
      mysql -u root -p
      ```
    * Ingresa tu contraseña de MySQL y presiona Enter. Si todo es correcto, verás un saludo de bienvenida de MySQL y el prompt cambiará a `mysql>`.

2.  **Crea la Base de Datos**:
    * Dentro de la consola de MySQL (donde ves `mysql>`), escribe el siguiente comando para crear la base de datos. Puedes llamarla `appsalon_mvc` o el nombre que prefieras, pero **recuérdalo** porque lo necesitarás más adelante.
      ```sql
      CREATE DATABASE appsalon_mvc;
      ```
      Presiona Enter. Deberías ver un mensaje como `Query OK, 1 row affected`.
    * **Importante**: Si ya existe una base de datos con ese nombre y quieres empezar de cero, puedes borrarla primero con `DROP DATABASE appsalon_mvc;` y luego volver a crearla.

3.  **Selecciona la Base de Datos**:
    * Ahora, indica a MySQL que quieres trabajar sobre la base de datos que acabas de crear. Reemplaza `appsalon_mvc` si usaste un nombre diferente:
      ```sql
      USE appsalon_mvc;
      ```
      Presiona Enter. Deberías ver `Database changed`.

4.  **Ejecuta el Script SQL para Cargar Tablas y Datos (Método Copiar y Pegar)**:
    * **Abre el archivo SQL**:
        * Ve a la carpeta del proyecto que descomprimiste (ej. `pagina-barberia-mvc`) usando el Explorador de Archivos de Windows.
        * Busca el archivo llamado `appsalon_DB.sql`.
        * Haz clic derecho sobre el archivo y selecciona "Abrir con" > "Bloc de notas" (o cualquier otro editor de texto simple como Notepad++, VSCode, etc.).
    * **Copia todo el contenido**:
        * Una vez abierto el archivo en el editor de texto, selecciona todo su contenido. La forma más fácil es presionar `Ctrl + A`.
        * Luego, copia el contenido seleccionado presionando `Ctrl + C`.
    * **Pega en la Consola de MySQL**:
        * Regresa a la ventana de la consola de MySQL (donde tienes el prompt `mysql>`).
        * Para pegar el contenido copiado:
            * En la mayoría de las terminales de Windows (CMD), puedes hacer **clic derecho** en la ventana, y el texto se pegará.
            * Si no funciona, presiona las teclas **Ctrl + v** y asegurate que no se haya puesto un simbolo raro al final.

        * Una vez pegado, el texto del script SQL aparecerá en la consola. MySQL comenzará a ejecutar los comandos uno por uno.
    * **Verifica la ejecución**:
        * Es posible que veas mucho texto desplazándose rápidamente por la pantalla a medida que se ejecutan los comandos.
        * Al final, deberías ver varios mensajes de `Query OK`. Esto indica que las tablas se crearon y los datos iniciales se cargaron correctamente.

5.  **Cierra la Consola de MySQL** (Opcional):
      
    * Cierra la ventana de CMD.

6.  **Configura la Conexión en el Proyecto**:
    * Dentro de la carpeta del proyecto (ej. `pagina-barberia-mvc`), busca una subcarpeta llamada `includes`.
    * Dentro de `includes`, busca un archivo llamado `database.php` (o similar, donde se configure la conexión).
    * Abre este archivo con un editor de texto (como el Bloc de Notas, VSCode, Sublime Text, etc.).
    * Verás unas líneas de código parecidas a esto:
      ```php
      $db = mysqli_connect(
          'localhost', // Servidor (usualmente 'localhost')
          'root',      // Usuario de tu base de datos MySQL (ej. 'root')
          '',          // Contraseña de tu usuario MySQL
          ''           // Nombre de la base de datos que creaste (ej. 'appsalon_mvc')
      );
      ```
    * Modifica los valores entre las comillas simples:
        * El **usuario** (`'root'` en el ejemplo) debe ser tu nombre de usuario de MySQL (si es diferente a `root`).
        * El siguiente valor vacío (el tercero en la lista de parámetros) debe ser la **contraseña** que estableciste para ese usuario de MySQL.
        * El último valor vacío debe ser el **nombre de la base de datos** que creaste en el paso 2 de esta sección (ej. `appsalon_mvc`).
    * Ejemplo con datos (¡usa los tuyos!):
      ```php
      $db = mysqli_connect(
          'localhost',
          'root',
          'tu_contraseña_de_mysql',
          'appsalon_mvc'
      );
      ```
    * Guarda los cambios en el archivo.

---

## ▶️ Paso 5: Ejecutar el Proyecto

¡Ya casi terminamos! Ahora vamos a iniciar el servidor para ver el proyecto en el navegador.

1.  **Navega a la Carpeta `public`**:
    * Vuelve a la **primera terminal** que abriste (la que está en la carpeta raíz del proyecto, ej. `pagina-barberia-mvc`). Si la cerraste, ábrela de nuevo como se indicó en el Paso 3, numeral 2.
    * Escribe el siguiente comando y presiona **Enter**:
        ```bash
        cd public
        ```

2.  **Inicia el Servidor PHP**:
    * Ahora que estás en la carpeta `public`, escribe el siguiente comando y presiona **Enter**:
        ```php
        php -S localhost:3000
        ```
    * Si todo va bien, verás un mensaje similar a: `Development Server (http://localhost:3000) started`.

3.  **Abre el Proyecto en tu Navegador**:
    * El mensaje anterior te da un enlace: `http://localhost:3000`.
    * Puedes mantener presionada la tecla **Ctrl** y hacer **clic** en ese enlace en la terminal, o copiarlo y pegarlo en la barra de direcciones de tu navegador web (Chrome, Firefox, Edge, etc.).

¡Y listo! 🎉 Deberías poder ver el proyecto funcionando.

---

## 🔑 Datos de Acceso (Usuario de Prueba)

El proyecto incluye un usuario pre-cargado para que puedas iniciar sesión y probar la aplicación sin necesidad de registrarte inmediatamente:

* **Correo electrónico**: `correo@correo.com`
* **Contraseña**: `123456`

---

Si tienes algún problema, revisa los pasos o no dudes en consultar. ¡Disfruta explorando el proyecto!