# TPI_movies
Proyecto final de TPI que respecta a la web de peliculas

INTEGRANTES:

    -Javier Alexander Morales Melara MM18014
    -Brian Steve Rodas Hernández RH18031
    -Oscar Alexis Palacios Flores PF18008
    -Enrique Antonio Méndez Cáceres MC18082
    -Nelson Vladimir Argueta Marroquin AM16079




//////////////////////////////////////////////////////////////////////

VISTA GENERAL DE LAS CARPETAS

    ./assets {Contiene los archivos de estilos css, los js utilizados y las imagenes}
    ./backend {Contiene los directorios y archivos que conectan los datos del backend}
    ./config {Contiene los archivos de configuracione para la base y directorios}
    ./controllers {Contiene los archivos de controladores para las acciones de las vistas}
    ./db {Contiene el sql de la base de datos utilizada}
    ./docs {Contiene los documentos de algunas funcionalidades realizadas por parte del backend}
    ./models {Contiene los modelos de las vistas}
    ./render {Contiene el baseLayout con los elementos por defecto a renderizar}
    ./views {Contiene las vistas utilizadas para la pagina web}




//////////////////////////////////////////////////////////////////////

FUNCIONAMIENTO POR PARTE DEL FRONT

@CONTROLADORES

    #HomeController
        Método showHome
        Nos permite mostrar la vista de la pantalla de inicio, obteneiendo su nombre del modelo Home

    #logout
        Desarma y destruye la sesion.
        Por medio de unset y destroy logramos destruir la sesion y las cookies.
        A las cookies se les asigna un nuevo valor negativo de tiempo par asegurar que se detruyan.

    #MovieController
        Método getSessioStatus
        Devuelve el valor del tipo de usuario segun si la sesion se ha dado o no.

        Método showMovies
        Con este incluimos la vista del catalogo donde se hace una evaluacion segun el tipo de usuario, para tomar el json con lso listados para cada caso, ademas de realizar validaciones para los filtros donde segun el tipo de rol se muestran o se ocultan.

        Método preview
        Con este mostramos la vista de previsualización de la pelicula, obtiene la previsualizacion por medio de $_GET y con ella se hace el recorrido luego de obtener el json como array.

        Método sale
        Con este retornamos la vista con el listado de compras existentes en la base de datos de todos los usuarios. Este es exlusivo del rol Administrador.

        Método record
        Con este mostramos la vist de todos los alquileres existente que han realizado los usuarios, mostrando cada detalle de ellos. Este es exclusivo del Administrador.

        Método add
        Con este devolvemos la vista de formulario para agregar una nueva pelicula donde se general los inputs de un formulario general. Este es exclusivo del Administrador.

        Método modify
        Con este devolvemos la vista de formulario para modificar una pelicula donde se general los inputs de un formulario general, y se obtienen los valores existentes de la misma por un $_GET. Este es exclusivo del Administrador.
    
    //////////////////////////////////////////////////////////////////////

FUNCIONAMIENTO POR PARTE DEL BACKEND

CRUD PELICULAS.

Crear película (Agregar al catálogo)
url: http://localhost/TPI_movies/backend/server/createPelicula.php
Información que recibe en JSON:
        $data->tituloPelicula, 
        $data->descripcionPelicula, 
        $data->generoPelicula, 
        $data->portadaPelicula, 
        $data->stockPelicula, 
        $data->precioVentaPelicula, 
        $data->precioAlquilerPelicula, 
        $data->disponibilidadPelicula

Información que envía:
	CORRECTO
        array("response"=>true)
	
	INCORRECTO
        array("response"=>false);


Read película (Leer todo el catálogo disponible y con stock mayor a 0)
url: http://localhost/TPI_movies/backend/server/readPelicula.php
Información que recibe en JSON:

Información que envía:
	CORRECTO
        $data->idPelicula, 
        $data->tituloPelicula, 
        $data->descripcionPelicula, 
        $data->generoPelicula, 
        $data->portadaPelicula, 
        $data->stockPelicula, 
        $data->precioVentaPelicula, 
        $data->precioAlquilerPelicula, 
        $data->disponibilidadPelicula
	
	INCORRECTO
        array("response"=>false);

ReadAll película (Leer todo el catálogo)
url: http://localhost/TPI_movies/backend/server/readAllPelicula.php
Información que recibe en JSON:

Información que envía:
	CORRECTO
        $data->idPelicula, 
        $data->tituloPelicula, 
        $data->descripcionPelicula, 
        $data->generoPelicula, 
        $data->portadaPelicula, 
        $data->stockPelicula, 
        $data->precioVentaPelicula, 
        $data->precioAlquilerPelicula, 
        $data->disponibilidadPelicula
	
	INCORRECTO
        array("response"=>false);


Update película (Actualizar una película del catálogo)
url: http://localhost/TPI_movies/backend/server/updatePelicula.php
Información que recibe en JSON:
        $data->idPelicula, 
        $data->tituloPelicula, 
        $data->descripcionPelicula, 
        $data->generoPelicula, 
        $data->portadaPelicula, 
        $data->stockPelicula, 
        $data->precioVentaPelicula, 
        $data->precioAlquilerPelicula, 
        $data->disponibilidadPelicula

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);

Delete película (Eliminar una película del catálogo)
url: http://localhost/TPI_movies/backend/server/deletePelicula.php
Información que recibe en JSON:
       $data->idPelicula

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);

CRUD CLIENTES.

Crear cliente (Agregar a la db)
url: http://localhost/TPI_movies/backend/server/createCliente.php
Información que recibe en JSON:
    $data->nombreCliente, 
    $data->apellidoCliente, 
    $data->correoCliente, 
    $data->contraseñaCliente

Información que envía:
	CORRECTO
        array("response"=>true)
	
	INCORRECTO
        array("response"=>false);


Read cliente (Leer todos los clientes)
url: http://localhost/TPI_movies/backend/server/readCliente.php
Información que recibe en JSON:

Información que envía:
	CORRECTO
        $data->idCliente, 
        $data->nombreCliente, 
        $data->apellidoCliente, 
        $data->correoCliente, 
        $data->contraseñaCliente

	
	INCORRECTO
        array("response"=>false);

Update cliente (Actualizar un cliente de la db)
url: http://localhost/TPI_movies/backend/server/updateCliente.php
Información que recibe en JSON:
        $data->idCliente, 
        $data->nombreCliente, 
        $data->apellidoCliente, 
        $data->correoCliente, 
        $data->contraseñaCliente

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);

Delete cliente (Eliminar un cliente de la db)
url: http://localhost/TPI_movies/backend/server/deleteCliente.php
Información que recibe en JSON:
        $data->idCliente

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);
CRUD LIKES.

Crear like (Agregar like a una película)
url: http://localhost/TPI_movies/backend/server/createLike.php
Información que recibe en JSON:
        $data->idCliente,
        $data->idPelicula

Información que envía:
	CORRECTO
        array("response"=>true)
	
	INCORRECTO
        array("response"=>false);


Read like (Leer todos los likes de un usuario)
url: http://localhost/TPI_movies/backend/server/readLike.php
Información que recibe en JSON:
        $data->idCliente

Información que envía:
	CORRECTO
        $data->idLike, 
        $data->idCliente,
        $data->idPelicula
	
	INCORRECTO
        array("response"=>false);

Delete like (Eliminar un like a una pelicula)
url: http://localhost/TPI_movies/backend/server/deleteLike.php
Información que recibe en JSON:
        $data->idCliente,
        $data->idPelicula

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);

CRUD ALQUILERES.

Crear alquiler (Agregar alquiler)
url: http://localhost/TPI_movies/backend/server/createAlquiler.php
Información que recibe en JSON:
        $data->fechaAlquiler, 
        $data->fechaEsperadaAlquiler, 
        $data->idCliente, 
        $data->idPelicula

Información que envía:
	CORRECTO
        $data->idAlquiler, 
        $data->fechaAlquiler, 
        $data->fechaEsperadaAlquiler, 
        $data->idCliente, 
        $data->idPelicula,
        $data->estadoAlquiler 
	
	INCORRECTO
        array("response"=>false);

Crear DetailAlquiler (Finalizar un alquiler activo cuando se regresa la película alquilada)
url: http://localhost/TPI_movies/backend/server/createDetailAlquiler.php
Información que recibe en JSON:
        $data->idAlquiler,
        $data->fechaDevolucionAlquiler, 
        $data->totalDetalleAlquiler, 
        $data->multaDetalleAlquiler

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);


Read alquiler (Leer todos los alquileres activos)
url: http://localhost/TPI_movies/backend/server/readAlquiler.php
Información que recibe en JSON:

Información que envía:
	CORRECTO
        $data->idAlquiler, 
        $data->fechaAlquiler, 
        $data->fechaEsperadaAlquiler, 
        $data->idCliente, 
        $data->idPelicula,
        $data->estadoAlquiler 
	
	INCORRECTO
        array("response"=>false);

ReadOneSpecific alquiler (Leer un alquiler especifico)
url: http://localhost/TPI_movies/backend/server/readOneSpecificAlquiler.php
Información que recibe en JSON:
        $data->idAlquiler

Información que envía:
	CORRECTO
        $data->idAlquiler, 
        $data->fechaAlquiler, 
        $data->fechaEsperadaAlquiler, 
        $data->idCliente, 
        $data->idPelicula,
        $data->estadoAlquiler 
	
	INCORRECTO
        array("response"=>false);

ReadOne alquiler (Leer todos los alquileres activos de un cliente especifico)
url: http://localhost/TPI_movies/backend/server/readOneAlquiler.php
Información que recibe en JSON:
        $data->idCliente

Información que envía:
	CORRECTO
        $data->idAlquiler, 
        $data->fechaAlquiler, 
        $data->fechaEsperadaAlquiler, 
        $data->idCliente, 
        $data->idPelicula,
        $data->estadoAlquiler 
	
	INCORRECTO
        array("response"=>false);

CRUD VENTAS.

Crear venta (Agregar venta)
url: http://localhost/TPI_movies/backend/server/createVenta.php
Información que recibe en JSON:
        $data->cantidadVenta, 
        $data->fechaVenta, 
        $data->idCliente, 
        $data->idPelicula

Información que envía:
	CORRECTO
        $data->idVenta, 
        $data->cantidadVenta, 
        $data->fechaVenta, 
        $data->idCliente, 
        $data->idPelicula
	
	INCORRECTO
        array("response"=>false);


Read venta (Leer todos las ventas)
url: http://localhost/TPI_movies/backend/server/readVenta.php
Información que recibe en JSON:

Información que envía:
	CORRECTO
        $data->idVenta, 
        $data->cantidadVenta, 
        $data->fechaVenta, 
        $data->idCliente, 
        $data->idPelicula
	
	INCORRECTO
        array("response"=>false);

ReadOneSpecific venta (Leer una venta especifica)
url: http://localhost/TPI_movies/backend/server/readOneSpecificVenta.php
Información que recibe en JSON:
        $data->idVenta

Información que envía:
	CORRECTO
        $data->idVenta, 
        $data->cantidadVenta, 
        $data->fechaVenta, 
        $data->idCliente, 
        $data->idPelicula
	
	INCORRECTO
        array("response"=>false);



ReadOne venta (Leer todas las ventas a un cliente especifico)
url: http://localhost/TPI_movies/backend/server/readOneVenta.php
Información que recibe en JSON:
        $data->idCliente

Información que envía:
	CORRECTO
        $data->idVenta, 
        $data->cantidadVenta, 
        $data->fechaVenta, 
        $data->idCliente, 
        $data->idPelicula
	
	INCORRECTO
        array("response"=>false);

CRUD USUARIOS.

Crear usuario (Agregar a la db)
url: http://localhost/TPI_movies/backend/server/createUsuario.php
Información que recibe en JSON:
        $data->nombreUsuario, 
        $data->apellidoUsuario, 
        $data->correoUsuario, 
        $data->contraseñaUsuario,
        $data->rolUsuario

Información que envía:
	CORRECTO
        array("response"=>true)
	
	INCORRECTO
        array("response"=>false);


Read usuarios (Leer todos los usuarios)
url: http://localhost/TPI_movies/backend/server/readUsuario.php
Información que recibe en JSON:

Información que envía:
	CORRECTO
        $data->nombreUsuario, 
        $data->apellidoUsuario, 
        $data->correoUsuario, 
        $data->contraseñaUsuario,
        $data->rolUsuario
	
	INCORRECTO
        array("response"=>false);

ReadOne usuario (Leer un usuario por correo para el login)
url: http://localhost/TPI_movies/backend/server/readOneUsuario.php
Información que recibe en JSON:
        $data->correoUsuario 

Información que envía:
	CORRECTO
        $data->idUsuario, 
        $data->nombreUsuario, 
        $data->apellidoUsuario, 
        $data->correoUsuario, 
        $data->contraseñaUsuario,
        $data->rolUsuario
	
	INCORRECTO
        array("response"=>false);

Update usuario (Actualizar un usuario de la db)
url: http://localhost/TPI_movies/backend/server/updateUsuario.php
Información que recibe en JSON:
        $data->idUsuario, 
        $data->nombreUsuario, 
        $data->apellidoUsuario, 
        $data->correoUsuario, 
        $data->contraseñaUsuario

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);

Delete usuario (Eliminar un usuario de la db)
url: http://localhost/TPI_movies/backend/server/deleteUsuario.php
Información que recibe en JSON:
        $data->idUsuario

Información que envía:
	CORRECTO
        array("response"=>true);
	
	INCORRECTO
        array("response"=>false);

