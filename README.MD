#  Este proyecto funciona con php puro para el front-end

cosas importantes
carpeta build es a donde va el Bootstrap que se adelgaza usando npm para el procesador de sass

Se pueden reeemplazar los colores, las sentencias y personalizacion varia de bootstrap

partes importantes.

el archivo index.html es un wrapper donde inicia todo el proyecto de ahi todo son redirecciones usando php, o en algunas para forzar se uso javascript, pero solo es copiar y pegar las sentencias


phpLibrary: aqui esta la conexion a la base de datos, los controladores son donde vienen los templates de html con php, y mandan a llamar la biblioteca de mysqlConnect.php, 
el proyecto se necesita crear con un routing virtual tipo poner las direccione en los enlaces pero lo que se repite se puede poner en algunas funciones y mandarlas a llamar como en la parte de layout