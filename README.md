# Transacciones bancarias

Aplicativo web desarrollado con el framework Laravel de PHP para realizar transacciones bancarias.

La aplicación fue desarrollada para cubrir los 5 casos de uso de la prueba técnica de Cognox.

## Requerimientos del ambiente

Para poder instalar y ejecutar este proyecto, el ambiente donde se ponga debe cumpliar las siguientes condiciones:

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySQL Server 5.7
- Git
- Composer


## Instalación

Se debe seguir la siguiente secuencia de comandos y acciones (Terminal de comandos Linux, Unix o CMD) para tener una correcta ejecución del proyecto.

```bash
git clone https://github.com/dsalazar93/transacciones_bancarias_cognox.git
cd transacciones_bancarias_cognox
composer install
```
- Crear en MySQL Server la base de datos llamada: **banco_cognox**

- Realizar una copia del archivo **.env.example** (Que está dentro del proyecto) y renombrar esta copia como **.env** ya que será el archivo de configuración del ambiente.

- Luego se deben cambiar los siguientes valores dentro del archivo **.env**:

```env
APP_NAME=Banco
DB_DATABASE=banco_cognox
DB_USERNAME=
DB_PASSWORD=
```
Los valores **DB_USERNAME** y **DB_PASSWORD** deben ser definido de acuerdo a sus acceso de MySQL Server.

- Luego continuar con los siguientes comandos:

```bash
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
Con estos pasos realizados ya se pueden hacer las pruebas desde navegador en **http://localhost:8000**

## Observaciones sobre la construcción del proyecto

- El diseño frontend de la aplicación esta muy vinculado al uso de clases de la libreria Bootstrap y unos pocos archivos CSS.
- Las validaciones sobre la inserción de datos se pueden encontrar tanto en el backend como en el frontend.
- Este proyecto al usar Laravel hace uso del patrón MVC para su contrucción y también aprovecha utilidades del ORM Eloquent y consultas a la base de datos por medio de los modelos.
- En el proyecto se cuenta con el archivo **ModeloER.mwb** que se puede ejecutar con MySQL Workbench y encontrar el módelo relacional de la base de datos.
- Proyecto realizado por [dsalazar93](https://github.com/dsalazar93)