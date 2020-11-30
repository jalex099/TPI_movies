# TPI_movies
Proyecto final de TPI que respecta a la web de peliculas

Contenido
MODELOS. ........................................................................................................................................... 3
CRUD PELICULAS. ............................................................................................................................ 3
Crear película (Agregar al catálogo)............................................................................................ 3
Read película (Leer todo el catálogo disponible y con stock mayor a 0) .................................... 3
ReadAll película (Leer todo el catálogo)...................................................................................... 4
Update película (Actualizar una película del catálogo)............................................................... 4
Delete película (Eliminar una película del catálogo)................................................................... 5
CRUD CLIENTES. .............................................................................................................................. 5
Crear cliente (Agregar a la db) .................................................................................................... 5
Read cliente (Leer todos los clientes) ......................................................................................... 6
Update cliente (Actualizar un cliente de la db)........................................................................... 6
Delete cliente (Eliminar un cliente de la db)............................................................................... 7
CRUD LIKES...................................................................................................................................... 7
Crear like (Agregar like a una película)........................................................................................ 7
Read like (Leer todos los likes de un usuario)............................................................................. 8
Delete like (Eliminar un like a una pelicula)................................................................................ 8
CRUD ALQUILERES........................................................................................................................... 9
Crear alquiler (Agregar alquiler).................................................................................................. 9
Crear DetailAlquiler (Finalizar un alquiler activo cuando se regresa la película alquilada) ........ 9
Read alquiler (Leer todos los alquileres activos)....................................................................... 10
ReadOneSpecific alquiler (Leer un alquiler especifico)............................................................. 10
ReadOne alquiler (Leer todos los alquileres activos de un cliente especifico)......................... 11
CRUD VENTAS................................................................................................................................ 11
Crear venta (Agregar venta)...................................................................................................... 11
Read venta (Leer todos las ventas) ........................................................................................... 12
ReadOneSpecific venta (Leer una venta especifica) ................................................................. 12
ReadOne venta (Leer todas las ventas a un cliente especifico)................................................ 13
CRUD USUARIOS............................................................................................................................ 13
Crear usuario (Agregar a la db) ................................................................................................. 13
Read usuarios (Leer todos los usuarios).................................................................................... 14
ReadOne usuario (Leer un usuario por correo para el login).................................................... 14
Update usuario (Actualizar un usuario de la db)....................................................................... 15
Delete usuario (Eliminar un usuario de la db)........................................................................... 15

 
MODELOS.
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
