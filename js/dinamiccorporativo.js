$(document).ready(function() {
    $("div#agrupar2 #chocolate").click(function() {
        $("blockquote:has(img)").html('<img src="imagenes/historia.png" alt="historia">');
        $("div#agrupar2 #titulo").text("Nace MedicApp");
        $("div#agrupar2 #texto").text('El dia 26 de marzo de 2022, tres jovenes universitarios llenos de pasion y creatividad se lanzan a hacer una idea realidad. Diseñando MedicApp');
    });

    $("div#agrupar2 #chocolate2").click(function() {
        $("blockquote:has(img)").html('<img src="imagenes/mision.png" alt="mision">');
        $("div#agrupar2 #titulo").text("Estamos contigo");
        $("div#agrupar2 #texto").text('Brindar una solución en los momentos que lo requieras, entregando medicamentos que salven vidas');
    });

    $("div#agrupar2 #gomas").click(function() {
        $("div#agrupar2 #titulo").text("Una vida a la vez");
        $("blockquote:has(img)").html('<img src="imagenes/visioncorp.png" alt="vision">');
        $("div#agrupar2 #texto").text('Ser reconocidos como una compañia virtual lider en la donación y entrega de medicamentos de alto costo para personas de recursos limitados');
    });


    // barra lateral carro
    $("div#compras").hide();
    $("div#compras .caption").hide();
    $("#carrito").click(function() {
        $("div#compras").toggle();
    });

    var NAME_IMG;
    var TITULO;
    var DESCRIBE;
    var NUM_PROD = 0; //numero

    NAME_IMG = "CAPSULAS.jpg";
    TITULO = "NOMBRE PRODUCTO 2";
    DESCRIBE = "muy dulce xd";

    $("#chocolate").click(function() {

        var titulo = '<h3 style="color: white;">' + TITULO + '</h3> ';
        var imag = '<img src="IMAGENES/' + NAME_IMG + '" id="imagen">';
        var describe = '<p id="describe" style="color: white;">' + DESCRIBE + '</p>';
        $(imag).replaceAll("div#compras blockquote#" + NUM_PROD + "img#imagen").show();
        $(titulo).replaceAll("div#compras blockquote#" + NUM_PROD + " h3");
        $(describe).replaceAll("div#compras blockquote#" + NUM_PROD + " p#describe");

        //$("div#compras img#imagen" + NUM_PROD).clone().removeAttr("id").attr("id", "imagen" + (NUM_PROD + 1)).appendTo("div#compras img#imagen" + NUM_PROD).hide();
        $("blockquote#" + NUM_PROD).clone() //conte
        console
            .prependTo("div#agrupar2"); //selector removeAttr("id").attr("id", (NUM_PROD + 1))


        NUM_PROD++;
    });

    $("div#compras #eliminar" + NUM_PROD + "").click(function() {
        $("div#compras img#imagen" + NUM_PROD).empty();
    });

    //formulario
    $('div#agrupar #btnenviar').click(function() {
        if (!($("div#agrupar #textarea").val())) {
            alertify.error('Para nosotros es un gusto saber su opinion. Por favor indique su mensaje');
            event.preventDefault();
        }
        if (!($("div#agrupar #comprobar").is(':checked'))) {
            alertify.error('Por favor acepte terminos y condiciones.');
            event.preventDefault();
        }
        if (($("div#agrupar #comprobar").is(':checked')) && ($("div#agrupar #email").val() != "") && (!(!$("div#agrupar #textarea").val()))) {
            alertify.alert('Aviso', 'Formulario enviado!', function() { alertify.success('Enviado'); });
        }
    });
});