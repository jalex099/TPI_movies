// ---------ANIMACION DE LOADER DE PAGINA-----------
window.onload = function () {
  //Funcion para mostrar barra de carga
  let loader = document.getElementById("loader"); //Obtenemos el elemento animado

  //Mientras termina de cargar la pagina lo ocultamos
  loader.style.visibility = "hidden";
  loader.style.opacity = "0";
};
// ---------ANIMACION DE LOADER DE PAGINA-----------

// ---------ADAPTACION DE ELEMENTOS PARA TABLETAS-----------
$(document).ready(function () {
  let height = $(window).height(); //Alto de la pagina
  let width = $(window).width(); //Ancho de la pagina

  if (height == 1366) { //Para ajustes en tabletas de 1366px
    $(".content").height(700);
    document.getElementById("res-content").style.paddingTop = "50px";
    $(".content-bg").height(700);
    $(".content-image").height(400);
    $(".content-image").width(250);
    document.getElementById("res-title").style.fontSize = "38px";
    document.getElementById("res-subtitle").style.fontSize = "30px";
    document.getElementById("res-like").style.fontSize = "28px";
    document.getElementById("res-info").style.fontSize = "28px";
    document.getElementById("res-info").style.padding = "5% 10%";
    $(".plain").height(540);
  }
  if (height == 1024) { //Para ajustes en tabletas de 1024px
    $(".plain").height(500);
    document.getElementById("res-info").style.fontSize = "26px";
    document.getElementById("res-info").style.padding = "5% 10%";
  }

  if(document.getElementById("ordenAD") && document.getElementById("ordenDN")) {
    document.getElementById("ordenAD").style.display = "initial";
    document.getElementById("ordenDN").style.display = "none";
  }
});
// ---------ADAPTACION DE ELEMENTOS PARA TABLETAS-----------

// ---------EFECTO PARA EL DROPDOWN DE OPCIONES PARA ADMINISTRADORES Y GERENTES-----------
function f() {
  //Funcion para barra de opciones
  //Cambiamos el estado del dropdown inicial a oculto
  document.getElementsByClassName("dropdown")[0].classList.toggle("down");
  //Ocultamos la flecha indicadora
  document.getElementsByClassName("arrow")[0].classList.toggle("gone");

  //Si no esta desplegado el menu
  if (
    document.getElementsByClassName("dropdown")[0].classList.contains("down")
  ) {
    //Lo desplegamos luego de cierto tiempo
    setTimeout(function () {
      document.getElementsByClassName("dropdown")[0].style.overflow = "visible";
    }, 500);
  } else {
    //Si no hacemos lo contrario, cerrar
    document.getElementsByClassName("dropdown")[0].style.overflow = "hidden";
  }
}
// ---------EFECTO PARA EL DROPDOWN DE OPCIONES PARA ADMINISTRADORES Y GERENTES-----------

// ---------ANIMACION PARA CAMBIAR ESTADO DEL BOTON DE LIKE-----------
$("#btn-like").click(function () {
  //Funcion para cambiar icono de me gusta en la preview
  let cName = document.getElementById("btn-like").className; //Obtenemos el boton

  if (cName == "far fa-heart") {
    //Si tiene el estado vacio
    document.getElementById("btn-like").className = "fas fa-heart"; //Lo cambiamos y lo rellenamos
  } else if (cName == "fas fa-heart") {
    //Si esta relleno
    document.getElementById("btn-like").className = "far fa-heart"; //Lo cambiamos por vacio
  }
});
// ---------ANIMACION PARA CAMBIAR ESTADO DEL BOTON DE LIKE-----------

// ---------ANIMACION CON SWIPER PARA SLIDESHOW DE HOME-----------
var swiper = new Swiper(".picture-slider", {
  spaceBetween: 30, //Asignamos el espacio entre elementos
  effect: "fade", //Asignamos un efecto de desvanecimiento
  loop: true, //Ponemos el bucle activo
  
  mousewheel: { //Para poder hacer scroll con el maouse sin invertir
    invert: false,
  },

  pagination: { //Para lograr cambiar la paginacion, o los botones para navegar entre slides
    el: ".picture-slider__pagination",
    clickable: true,
  },
});
// ---------ANIMACION CON SWIPER PARA SLIDESHOW DE HOME-----------

// ---------ANIMACION DE NAVBAR CON DISEÑO RESPONSIVO-----------
function navAnimation() {
  var tabsNewAnim = $("#navbarSupportedContent"); //Obtener navbar
  var selectorNewAnim = $("#navbarSupportedContent").find("li").length; //Buscar listado
  var activeItemNewAnim = tabsNewAnim.find(".active"); //Buscar el item activo
  var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight(); //Alto del item
  var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth(); //Largo del item
  var itemPosNewAnimTop = activeItemNewAnim.position(); //Posicion superior del item
  var itemPosNewAnimLeft = activeItemNewAnim.position(); //Posicion izquierda del item
  $(".hori-selector").css({ //Con esto condiguramos las propiedades para que el hover se adapte al item
    top: itemPosNewAnimTop.top + "px",
    left: itemPosNewAnimLeft.left + "px",
    height: activeWidthNewAnimHeight + "px",
    width: activeWidthNewAnimWidth + "px",
  });
  $("#navbarSupportedContent").on("click", "li", function (e) { //Funcion al hacer click sobre item
    //Asignamos los nuevos valores para cambiar el item activo
    $("#navbarSupportedContent ul li").removeClass("active");
    $(this).addClass("active");

    //Asignamos los valores del hover para adaptarse al item
    var activeWidthNewAnimHeight = $(this).innerHeight();
    var activeWidthNewAnimWidth = $(this).innerWidth();
    var itemPosNewAnimTop = $(this).position();
    var itemPosNewAnimLeft = $(this).position();

    //Volvemos a ejecutar la animacion con el contenido adaptado
    $(".hori-selector").css({
      top: itemPosNewAnimTop.top + "px",
      left: itemPosNewAnimLeft.left + "px",
      height: activeWidthNewAnimHeight + "px",
      width: activeWidthNewAnimWidth + "px",
    });
  });
}
$(document).ready(function () { //Funcion para ejecutar animacion al cargar la pagina
  setTimeout(function () {
    navAnimation();
  }, 600);
});
$(window).on("resize", function () { //Funcion para ejecutar animacion al hacer click
  setTimeout(function () {
    navAnimation();
  }, 500);
});
$(".navbar-toggler").click(function () { //Funcion para poder ejecutar animacion en navbar movil
  setTimeout(function () {
    navAnimation();
  });
});
// ---------ANIMACION DE NAVBAR CON DISEÑO RESPONSIVO-----------

// ---------ADAPTAR CONTENIDO DEL FILE INPUT, RECIBIR DATOS-----------
$("form").on("change", ".file-upload-field", function () { //Al seleccionar archivo
  $(this) //Hacemos un parseo para poder obtener en el input solo el nombre del archivo
    .parent(".file-upload-wrapper")
    .attr(
      "data-text",
      $(this) //Aplicamos el formato
        .val()
        .replace(/.*(\/|\\)/, "")
    );
});
// ---------ADAPTAR CONTENIDO DEL FILE INPUT, RECIBIR DATOS-----------


// ---------MODIFICAR LOS SELECT DE LOS FILTROS SEGUN EL TIPO DE FILTRO-----------
const selectElement = document.querySelector('.tipo');

if(selectElement) {
  selectElement.addEventListener('change', (event) => {
    if(document.getElementById("ordenAD") && document.getElementById("ordenDN")) {
      if(event.target.value != "Disponibilidad") {
        document.getElementById("ordenAD").style.display = "initial";
        document.getElementById("ordenDNS").removeAttribute("required");
        document.getElementById("ordenDN").style.display = "none";
      }
      else if(event.target.value == "" || event.target.value == null) {
        document.getElementById("ordenAD").style.display = "initial";
        document.getElementById("ordenDNS").removeAttribute("required");
        document.getElementById("ordenDN").style.display = "none";
      }
      else {
        document.getElementById("ordenADS").removeAttribute("required");
        document.getElementById("ordenAD").style.display = "none";
        document.getElementById("ordenDN").style.display = "initial";
      }
    }
  });
}
// ---------MODIFICAR LOS SELECT DE LOS FILTROS SEGUN EL TIPO DE FILTRO-----------