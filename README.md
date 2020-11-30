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