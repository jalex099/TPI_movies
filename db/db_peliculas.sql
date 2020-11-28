-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2020 a las 02:42:52
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_peliculas`
--
CREATE DATABASE IF NOT EXISTS `db_peliculas` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `db_peliculas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblalquileres`
--

CREATE TABLE `tblalquileres` (
  `idAlquiler` int(11) NOT NULL,
  `fechaAlquiler` date NOT NULL,
  `fechaEsperadaAlquiler` date DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `estadoAlquiler` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblalquileres`
--

INSERT INTO `tblalquileres` (`idAlquiler`, `fechaAlquiler`, `fechaEsperadaAlquiler`, `idCliente`, `idPelicula`, `estadoAlquiler`) VALUES
(1, '2020-08-25', '2020-11-28', 1, 5, 0),
(6, '2020-08-25', '2020-11-26', 1, 5, 1),
(7, '2020-08-25', '2020-11-30', 1, 5, 1),
(8, '2020-08-25', '2020-11-30', 1, 5, 1),
(9, '2020-08-25', '2020-11-22', 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclientes`
--

CREATE TABLE `tblclientes` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `apellidoCliente` varchar(50) NOT NULL,
  `correoCliente` varchar(30) NOT NULL,
  `contraseñaCliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblclientes`
--

INSERT INTO `tblclientes` (`idCliente`, `nombreCliente`, `apellidoCliente`, `correoCliente`, `contraseñaCliente`) VALUES
(1, 'Enrique', 'Mendez', 'mendez@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallealquiler`
--

CREATE TABLE `tbldetallealquiler` (
  `idDetalleAlquiler` int(11) NOT NULL,
  `idAlquiler` int(11) NOT NULL,
  `fechaDevolucionDetalleAlquiler` date NOT NULL,
  `totalDetalleAlquiler` decimal(10,2) NOT NULL,
  `multaDetalleAlquiler` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllikes`
--

CREATE TABLE `tbllikes` (
  `idLike` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpeliculas`
--

CREATE TABLE `tblpeliculas` (
  `idPelicula` int(11) NOT NULL,
  `tituloPelicula` varchar(50) NOT NULL,
  `descripcionPelicula` text NOT NULL,
  `generoPelicula` varchar(15) NOT NULL,
  `portadaPelicula` text NOT NULL,
  `stockPelicula` int(7) NOT NULL,
  `precioVentaPelicula` decimal(6,2) NOT NULL,
  `precioAlquilerPelicula` decimal(6,2) NOT NULL,
  `disponibilidadPelicula` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblpeliculas`
--

INSERT INTO `tblpeliculas` (`idPelicula`, `tituloPelicula`, `descripcionPelicula`, `generoPelicula`, `portadaPelicula`, `stockPelicula`, `precioVentaPelicula`, `precioAlquilerPelicula`, `disponibilidadPelicula`) VALUES
(1, 'Titanic', 'Jack (DiCaprio), un joven artista, en una partida de cartas gana un pasaje para América, en el Titanic, el trasatlántico más grande y seguro jamás construido. A bordo, conoce a Rose (Kate Winslet), una joven de una buena familia venida a menos que va a contraer un matrimonio de conveniencia con Cal (Billy Zane), un millonario engreído a quien sólo interesa el prestigioso apellido de su prometida. Jack y Rose se enamoran, pero Cal y la madre de Rose ponen todo tipo de trabas a su relación. Inesperadamente, un inmenso iceberg pone en peligro la vida de los pasajeros.', 'Romance', 'https://drive.google.com/uc?export=view&id=1Jzfc01c9p6MuWS9IBGbrAGSUbjPxLo7G', 24, '35.00', '20.00', 1),
(2, 'John Wick', 'En Nueva York, John Wick, un asesino a sueldo retirado, vuelve otra vez a la acción para vengarse de los gángsters que le quitaron todo.', 'Accion', 'https://drive.google.com/uc?export=view&id=1bKvitb7lAfipy5ywHtsoRGO3xwPXvZjT', 46, '37.00', '14.00', 1),
(3, ' Sonic. La película', 'Una comedia de aventuras de acción real en donde Sonic el descarado erizo azul basado en la famosa serie de videojuegos de Sega, una de las más vendidas en todo el mundo, vivirá aventuras y desventuras cuando conoce a su amigo humano y policía, Tom Wachowski (James Marsden). Sonic y Tom unen sus fuerzas para detener al malvado Dr. Robotnik (Jim Carrey), que intenta atrapar a Sonic con el fin de emplear sus inmensos poderes para dominar el mundo.', 'Accion', 'https://drive.google.com/uc?export=view&id=19Vcugi_cZEMLfc0zvIQLfJSkG5Vxlb3S', 39, '35.00', '17.00', 1),
(4, 'Vengadores Endgame', 'La mitad de la vida en el universo está desintegrada y las filas de los Vengadores fracturadas, tras los devastadores acontecimientos puestos en marcha por Thanos, el Titán Loco, en \"Vengadores: Infinity War\".  Ahora, los superhéroes que sobrevivieron encabezados por el Capitán América, deberán poner en práctica un plan definitivo, sin importar las consecuencias que pueda tener. Un plan que podría acabar con el villano definitivamente, deshacer sus terribles acciones y restablecer el orden en el universo de una vez por todas.', 'Accion', 'https://drive.google.com/uc?export=view&id=1I7KQ7sZVi1Io2FNS-ifyW78cEusCMivb', 35, '33.00', '14.00', 1),
(5, 'Bob Esponja Un héroe al rescate', 'Los amigos son lo más importante para Bob Esponja, por lo que no dudará en salir de la comodidad de su hogar en Fondo de Bikini, junto con Patricio, para adentrarse en un mundo desconocido, arriesgando sus vidas, para salvar a su amigo de la infancia, Gary, de las garras del rey Poseidón que le ha secuestrado en la Ciudad Perdida de Atlantic City. ¿Serán capaces de lograrlo?', 'Comedia', 'https://drive.google.com/uc?export=view&id=1d-sSPgHIgPYW4mrGhtc8LUka71PbVCl3', 33, '38.00', '15.00', 1),
(6, 'Bad Boys for Life', 'Los policías rebeldes Mike Lowrey (Will Smith) y Marcus Burnett (Martin Lawrence) se han unido de nuevo para una última misión en la esperadísima Bad Boys for Life. Marcus Burnett es ahora inspector de policía y Mike Lowery está en una crisis de mediana edad. Se vuelven a unir cuando un mercenario albanés, cuyo hermano mataron, les promete un importante beneficio.', 'Accion', 'https://drive.google.com/uc?export=view&id=1LHcQScQD5hKENOmuEYgOsabkbXkBoIws', 40, '42.00', '17.00', 1),
(7, 'Manhattan Sin Salida', 'André Davis (Chadwick Boseman) es un policía de Nueva York que ve la oportunidad de redimir su pasado cuando ocho oficiales de la policía son asesinados durante un robo. Con ayuda de su compañera Frankie (Sienna Miller), inicia una brutal persecución con el fin de encontrar a los culpables y, por primera vez en la historia de Manhattan, la ciudad quedará blindada y en las próximas 24 horas nadie podrá entrar ni salir de la isla.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=12dJPKlWXMDtn2umbdcD83Tt8LgKafqWM', 38, '39.00', '16.00', 1),
(8, 'La Posesión de Mary', 'David (Gary Oldman) es un humilde, luchador y experto marino que busca una vida mejor para su familia – su mujer, Sarah (Emily Mortiner) y sus dos hijas, la adolescente Lindsey (Stefanie Scott) y la pequeña Mary (Chloe Perrin). Tras quedar extrañamente prendado de un viejo barco de vela, cuya historia está sumida en el misterio, David convence a Sarah de que comprar el velero puede ser su billete a la tan ansiada prosperidad. Pero poco después de hacerse a la mar con él, extraños e inquietantes sucesos comienzan a aterrorizar a David y su familia, haciendo que se vuelvan unos contra otros. Cuando el barco se hace ingobernable, comienza a quedar terriblemente claro que la familia está siendo atraída hacia un mal aún mayor que les aguarda en la oscuridad del mar abierto.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=1XJneh6EjrkIkZqAlQ7h1BohpTQLlCPIB', 35, '41.00', '18.00', 1),
(9, 'Mortal (2020)', 'Erik es un joven mochilero estadounidense qye ha pasado toda su vida luchando contra unos extraordinarios poderes que nunca ha conseguido entender. Cuando es detenido por el estraño asesinato de un joven, su destino estará en manos de la psicóloga Christine, Erick se da cuenta de que ella es su única esperanza para poder escapar en busca de venganza. Mientras es perseguido, el joven entenderá cómo dominar y utilizar su magnífico don, a la vez que comienza a asumir la razón de su existencia.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=15MeXB-vttZ4IcaIn-5bMCkIGEOxYIX2Y', 37, '39.00', '15.00', 1),
(10, 'El Vicio del Poder', 'El vicio del poder explora la historia real jamás revelada sobre cómo Dick Cheney (Christian Bale) un callado burócrata de Washington, acabó convirtiéndose en el hombre más poderoso del mundo como vicepresidente de los Estados Unidos durante el mandato de George W. Bush, con consecuencias en su país y el resto del mundo que aún se dejan sentir hoy en día', 'Drama', 'https://drive.google.com/uc?export=view&id=1lz6lhIKnArbj_DA_cwiLx3WeOf8AFNW4', 34, '38.00', '16.00', 1),
(11, 'Cómo Entrenar a tu Dragón 3', 'De DreamWorks Animation, llega una sorprendente historia de crecimiento, de cómo encontrar el coraje para enfrentar lo desconocido ... y sobre cómo, a pesar de todo, nunca debes rendirte.  Lo que comenzó como una difícil y estraña amistad entre un joven vikingo y un temible dragón Furia Nocturna se ha convertido en una épica aventura que ha recorrido sus vidas. Un nuevo capítulo de \"Cómo entrenar a tu dragón\",  en la que Hipo y Desdentao descubrirán finalmente su verdadero destino.', 'Accion', 'https://drive.google.com/uc?export=view&id=1IHQcpueZ3VrLdrMbNgvoOssw6tky5RXI', 33, '37.00', '15.00', 1),
(12, 'Capitana Marvel', 'Ambientada en los años noventa, \"Capitana Marvel\" de Marvel Studios es una nueva aventura de una etapa nunca antes vista en la cronología del universo cinematográfico de Marvel.  Los Kree y los Skrulls, una raza de matamórficos, llevan en guerra durante generaciones. Carol Danvers \"Capitana Marvel\" forma parte de un grupo de élite de soldados Kree llamado \"Fuerza Estellar\" y no recuerda nada sobre su pasado. Durante una incursión de la \"Fuerza Estellar\", Carol es capturada y hecha prisionera por los Skrulls, que mediante una sofisticada tecnología obtinen una valiosa información de Carol que puede cambiar el curso de la guerra y que pone a la Tierra centro de la contienda.', 'Accion', 'https://drive.google.com/uc?export=view&id=1slauG0UlSO6pH7cvng8OWcze10QWxAFk', 29, '36.00', '14.00', 1),
(13, 'La Llorona', 'La Llorona es una aparición aterradora. Está atrapada entre el Cielo y el Infierno en un destino terrible que ha sellado de su propia mano. Desde hace generaciones, la mera mención de su nombre causa terror en todo el mundo.  En vida, ahogó a sus propios hijos en un ataque de celos y se tiró al río después de ellos, mientras se retorcía de dolor.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=1XTf1enUEZqpmVzz8qwZUutY2AQL2-VvS', 31, '35.00', '15.00', 1),
(14, 'Godzilla El Rey de los Monstruos', 'Después del triunfo mundial de \"Godzilla\" y \"Kong: La isla calavera\", llega \"Godzilla: Rey de los Monstruos\", la siguiente entrega de la franquicia cinematográfica de Warner Bros Pictures y Legendary Pictures, \"MonsterVerse\".  La nueva película de la franquicia de Warner Bros nos relata los heroicos esfuerzos de los miembros de la agencia cripto-zoológica Monarch, para hacer frente a la gigantesca amenaza de monstruos, del tamaño de titanes, que amenaza supervivencia de la raza humana. Cuando estas primitivas súper especies -que se creía que eran solo mitos de la antiguedad- vuelven a surgir, todas luchan por la supremacía, dejando al borde del abismo la existencia de la humanidad.', 'Accion', 'https://drive.google.com/uc?export=view&id=1Wui6MvoYHOxu-5r1qbGpqmHNDmw4qUdc', 35, '37.00', '13.00', 1),
(15, 'Fast & Furious: Hobbs and Shaw', 'Desde que en Fast & Furious 7 (2015) se cruzaron los caminos del imponente agente Hobbs (Dwayne Johnson), un leal miembro de los servicios de Seguridad del Cuerpo Diplomático estadounidense, y del solitario mercenario Shaw (Jason Statham), ex - miembro de un cuerpo de élite del ejército británico, los insultos, golpes y burlas no han cesado entre ellos para ver cuál de los dos cae antes.  Pero cuando un anarquista mejorado ciber-genéticamente llamado Brixton (Idris Elba), se hace con el control de una peligrosa arma biológica, el mundo se enfrenta a una de sus mayores amenazas. Cuando Shaw se entera de que además Brixton ha derrotado a su hermana, una brillante e intrépida agente secreta del M16 (Vanessa Kirby, la serie “The Crown”), él y Hobbs no tendrán más remedio que dejar su mortal enemistad a un lado para salvar el mundo y derrotar al único hombre capaz de acabar con ellos.', 'Accion', 'https://drive.google.com/uc?export=view&id=1KQ22LGrSrapHkcyiEUK_8AFQ59gJwNfq', 42, '45.00', '19.00', 1),
(16, 'Géminis (2019)', 'Henry Brogan, un asesino a sueldo a decidido que ya es hora de retirarse, pero su merecida jubilación no va a ser como él la tenía planeada. Henry comienza a ser perseguido por un hombre más joven que él y que parece predecir cada uno de sus movimientos, pronto descubrirá que quien quiere asesinarle es una versión más joven de él, un clon que fue creado hace 25 años a partir de él, su géminis.', 'Drama', 'https://drive.google.com/uc?export=view&id=1wldv5hV6OoBMeH71WNMov0oC2NojBnLC', 35, '39.00', '16.00', 1),
(17, 'Maléfica: Maestra del Mal', 'La secuela de \"Maléfica\" nos transporta varios años después a los acontecimientos narrados en la primera película y nos sumerge en una nueva aventura, en la cual, Maléfica y Aurora comenzarán a cuestinarse sus complejos lazos familiares a medida que una boda inminente, aliados inesperados y nuevas fuerzas oscuras les empujan por diferentes caminos.  La película ha sido dirigida por Joachim Rønning a partir de una historia de Linda Woolverton y un guión de Linda Woolverton y Micah Fitzerman-Blue & Noah Harpster. Los productores son Joe Roth, Angelina Jolie y Duncan Henderson, y Matt Smith, Jeff Kirschenbaum y Michael Vieira son los productores ejecutivos.', 'Drama', 'https://drive.google.com/uc?export=view&id=1koIqzp3Jnyu3DknMH_qL-iVjuQ0UYN-7', 34, '34.00', '15.00', 1),
(18, 'Jumanji: Siguiente Nivel', 'Inspirada en la película original de 1995, el misterioso y peligroso juego de la selva regresa para hacer lo que más le gusta, atrapar a sus jugadores en una aventurera partida de la que no podrán escapar hasta que consigan finalizarla.  En Jumanji: Siguiente nivel, vuelve la pandilla pero el juego ha cambiado. Cuando regresan a Jumanji para rescatar a uno de los suyos, descubren que nada es lo que esperaban. Los jugadores deberán enfrentarse a lugares desconocidos e inexplorados, desde áridos desiertos hasta montañas nevadas, para escapar del juego más peligroso del mundo.', 'Accion', 'https://drive.google.com/uc?export=view&id=1L_a5lQ9ShtB58-w8C1F2gH3ljSboieZY', 37, '35.00', '14.00', 1),
(19, 'Insidious: La última llave', 'Las mentes creativas detrás de la exitosa trilogía de Insidious vuelven con \"INSIDIOUS: LA ÚLTIMA LLAVE\".  En esta nueva película de terror, en la que vemos de nuevo a Lin Shaye como la Doctora Elise Rainier, la brillante parapsicóloga se enfrenta a su más personal y aterradora caza hasta la fecha, que sucede en su antigua casa familiar.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=1Zvi29suSl8k1_F7PbLJ6WdePy2IiLtTB', 39, '38.00', '16.00', 1),
(20, 'El corredor del laberinto: La cura mortal', 'En el final épico de la saga de El Corredor del Laberinto, Tomás lidera al grupo de Clarianos fugitivos en su misión más peligrosa y definitiva. Para salvar a sus amigos, tendrán que volver a colarse en la legendaria Ciudad, un laberinto vigilado por CRUEL que puede convertirse en la trampa más mortal. Cualquiera que salga vivo tendrá las respuestas a las preguntas que los Clarianos han estado intentando averiguar desde que llegaron al laberinto por primera vez.', 'Accion', 'https://drive.google.com/uc?export=view&id=1cCuvd52ZxbASVHgPsn7Jbc-M7DVCpG_t', 38, '42.00', '19.00', 1),
(21, 'Operación: Huracán', 'En 1992, un giro cruel del destino se cobra la vida del caza tormentas y padre devoto Bruce Rutledge, dejando a sus dos hijos, Will y Breeze, a merced de la naturaleza.  25 años más tarde, Will es un meteorólogo del gobierno que sigue al Huracán Tammy, la tormenta más feroz de la historia de Estados Unidos, que se dirige a Gulfport (Alabama). Durante la evacuación de la población local, el Departamento del Tesoro estadounidense corre a contrarreloj para destruir 600 millones de dólares en billetes antiguos antes de que llegue Tammy, pero no son los únicos que tienen planes para ese dinero…', 'Drama', 'https://drive.google.com/uc?export=view&id=12Mfex3KsYLh5hrKMVpcIQaV65sH7L5pr', 35, '33.00', '15.00', 1),
(22, 'Deadpool 2', 'Tras sobrevivir a un ataque bovino casi mortal, un desfigurado cocinero (Wade Wilson) lucha por cumplir su sueño de convertirse en el camarero buenorro de First Dates mientras aprende a arreglárselas después de perder el sentido del gusto. Buscando algo picante en su vida (y también un condensador de fluzo), Wade deberá luchar contra ninjas, yakuzas y una manada de canes sexualmente agresivos mientras viaja alrededor del mundo para descubrir la importancia de la familia, la amistad y el sabor, encontrando un nuevo gusto por la aventura y ganándose la codiciada taza de ‘Mejor Amante del Mundo’.', 'Comedia', 'https://drive.google.com/uc?export=view&id=1Q1n3ThjtHn3uIZ2-fHJfB7tKzWPUlttR', 36, '39.00', '18.00', 1),
(23, 'La primera purga: La noche de las bestias', 'LA PRIMERA PURGA: LA NOCHE DE LAS BESTIAS es la nueva entrega de la saga La Purga. La historia narra el inicio de este macabro experimento sociológico convertido en tradición anual. Una purga para mantener los actos criminales acotados temporalmente a una noche al año.  Para mantener durante el resto del año la tasa de criminalidad por debajo del 1%, los Nuevos Padres Fundadores de América ponen a prueba una teoría sociológica que da rienda suelta a todo tipo de agresiones durante una noche en una comunidad aislada. Pero cuando la violencia de los opresores se encuentra con la ira de los marginados, el vandalismo explota más allá de esas fronteras “experimentales” para extenderse por todo el país.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=1HZ0T7zvrpiF-8a-WeTrN7Wtve1aiFbBT', 39, '43.00', '19.00', 1),
(24, 'La Monja', 'Una joven monja de clausura de una abadía de Rumanía se quita la vida. Para investigar lo sucedido, el Vaticano envía a un sacerdote con un pasado tormentoso y a una novicia a punto de tomar sus votos. Juntos van a descubrir el profano secreto de la orden. Y arriesgan no solo sus vidas sino también su fe y sus almas al enfrentarse a una fuerza maléfica que se encarna en la misma monja endemoniada que aterrorizó a los espectadores en \"Expediente Warren: El caso Enfield\". La abadía se convierte así en un aterrador campo de batalla entre vivos y condenados.  Hardy dirige \"La Monja\" a partir de un guión de Gary Dauberman (\"It\"). La historia es obra de James Wan y Gary Dauberman. Los productores ejecutivos son Gary Dauberman, Todd Williams y Michael Clear.', 'Suspenso', 'https://drive.google.com/uc?export=view&id=1zVXeq8kzYVl9xk4RujodELDzDlJJYQCd', 38, '39.00', '18.00', 1),
(25, 'Venom', 'Nueva entrega del universo \"Marvel\". En esta ocasión el protagonista será \"Venom\" (Veneno), uno de los más despiadados y peligrosos supervillanos, y uno de los principales enemigos de Spider-Man.', 'Accion', 'https://drive.google.com/uc?export=view&id=1kBailaraDOARvPbeGw3g6w96E-3ngBeG', 37, '36.00', '17.00', 1),
(26, 'Human Nature', 'La más grande de las revoluciones del siglo XXI es biológica y no digital. Un avance llamado CRISPR abre la puerta a la curación de las enfermedades, a la remodelación de la biosfera y al diseño de nuestros propios hijos. Una exploración provocativa de sus implicaciones de largo alcance, a través de los ojos de los científicos que lo descubrieron.', 'Drama', 'https://drive.google.com/uc?export=view&id=1WaXsPW7RLRpjoOldfcwW9UjzFyDW98UK', 35, '33.00', '13.00', 1),
(27, 'Los Últimos Días del Crimen', 'En un futuro no muy lejano, como respuesta final al terrorismo y al crimen, el gobierno de los Estados Unidos planea emitir una señal que haga imposible que alguien cometa actos ilegales a sabiendas. Graham Brick, un delincuente de poca monta, decide unirse a un famoso gánster y a una hacker de la Dark Web, para cometer un último gran golpe que pasará a la historia.  ‘Los últimos días del crimen’ está basada en la novela gráfica de Rick Remender y Greg Tocchini (Radical Publishing)', 'Accion', 'https://drive.google.com/uc?export=view&id=1LBgmBJjqJ9n34rZCImNk6yR_9HzEcgdd', 37, '35.00', '15.00', 2),
(28, 'Voces (2020)', 'Sara, Daniel y su hijo de 9 años llegan a la casa en la que pretenden comenzar una nueva vida, sin saber que esa propiedad ha sido conocida desde siempre en los alrededores como \"la casa de las voces\". El niño, Eric, es el primero en advertir que tras cada puerta se ocultan extraños sonidos y se intuyen voces que parece que intentan comunicarse con la familia. Lo que achacan en principio a un producto de la imaginación de Eric se convierte rápidamente en una inquietante realidad también para sus padres. ¿Hay realmente voces en la casa? Y de ser así, ¿De dónde vienen? ¿Quiénes son? ¿Qué quieren?', 'Suspenso', 'https://drive.google.com/uc?export=view&id=1tddGnCwNMCw2pglNqiOEM2oAxzqD68U7', 36, '41.00', '18.00', 1),
(29, 'Tyler Rake', 'Tyler Rake, un temerario mercenario del mercado negro, se embarca en la extracción más mortal de su carrera cuando se alista para rescatar al hijo secuestrado de un señor del crimen internacional encarcelado. Secuestrado por un capo de la mafia tailandesa, una misión ya de por sí complicada, se convierte en un desafío casi imposible que cambiará para siempre las vidas de Tyler y el chico.', 'Accion', 'https://drive.google.com/uc?export=view&id=13CIcpp3l4T5FK9O-wfF5lxr42mshVtAF', 39, '35.00', '17.00', 2),
(30, 'La Bala Perdida (2020)', 'Un mecánico brillante con un pasado criminal de poca monta es acusado de homicidio, cuando su mentor es asesinado por policías corruptos. Ahora, deberá dar con el coche que contiene la única prueba de su inocencia: una bala.', 'Accion', 'https://drive.google.com/uc?export=view&id=1xjgyhkWEljLuW0vIhTWrAiM9Y476WQOL', 42, '39.00', '19.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidoUsuario` varchar(50) NOT NULL,
  `correoUsuario` varchar(30) NOT NULL,
  `contraseñaUsuario` varchar(20) NOT NULL,
  `rolUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

CREATE TABLE `tblventas` (
  `idVenta` int(11) NOT NULL,
  `catidadVenta` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblalquileres`
--
ALTER TABLE `tblalquileres`
  ADD PRIMARY KEY (`idAlquiler`),
  ADD KEY `idCliente_2` (`idCliente`),
  ADD KEY `idCliente` (`idCliente`) USING BTREE,
  ADD KEY `idPelicula` (`idPelicula`) USING BTREE;

--
-- Indices de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `tbldetallealquiler`
--
ALTER TABLE `tbldetallealquiler`
  ADD PRIMARY KEY (`idDetalleAlquiler`),
  ADD KEY `idAlquiler` (`idAlquiler`);

--
-- Indices de la tabla `tbllikes`
--
ALTER TABLE `tbllikes`
  ADD PRIMARY KEY (`idLike`),
  ADD UNIQUE KEY `idUsuario` (`idCliente`),
  ADD UNIQUE KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `tblpeliculas`
--
ALTER TABLE `tblpeliculas`
  ADD PRIMARY KEY (`idPelicula`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD UNIQUE KEY `idCliente` (`idCliente`),
  ADD UNIQUE KEY `idPelicula` (`idPelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblalquileres`
--
ALTER TABLE `tblalquileres`
  MODIFY `idAlquiler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbldetallealquiler`
--
ALTER TABLE `tbldetallealquiler`
  MODIFY `idDetalleAlquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbllikes`
--
ALTER TABLE `tbllikes`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblpeliculas`
--
ALTER TABLE `tblpeliculas`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblalquileres`
--
ALTER TABLE `tblalquileres`
  ADD CONSTRAINT `tblalquileres_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tblclientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblalquileres_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `tblpeliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbldetallealquiler`
--
ALTER TABLE `tbldetallealquiler`
  ADD CONSTRAINT `detalle-alquiler` FOREIGN KEY (`idAlquiler`) REFERENCES `tblalquileres` (`idAlquiler`);

--
-- Filtros para la tabla `tbllikes`
--
ALTER TABLE `tbllikes`
  ADD CONSTRAINT `tbllikes_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tblclientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbllikes_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `tblpeliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD CONSTRAINT `tblventas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tblclientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblventas_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `tblpeliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
