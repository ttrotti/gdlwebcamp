(function() {
    'use strict';


    let regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded', function(){

        if(document.getElementById("nombre")) {
            // Campos Usuarios
            let nombre = document.getElementById('nombre');
            let apellido = document.getElementById('apellido');
            let email = document.getElementById('email');

            // Campos Pases
            let pase_dia = document.getElementById('pase_dia');
            let pase_completo = document.getElementById('pase_completo');
            let pase_dosdias = document.getElementById('pase_dosdias');

            // Botones y Divs
            let calcular = document.getElementById('calcular');
            let errorDiv = document.getElementById('error');
            let btnRegistro = document.getElementById('btnRegistro');
            let lista_productos = document.getElementById('lista-productos');
            let total = document.getElementById('suma-total');

            // Extras

            let etiquetas = document.getElementById('etiquetas');
            let camisas = document.getElementById('camisa_evento');

            btnRegistro.disabled = true;


            // Validar Campos
            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            function validarCampos() {
                if(this.value === '') {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "este campo es obligatorio";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                } else {
                    errorDiv.style.display = "none";
                    this.style.border = "1px solid #cccccc"
                }
            }

            function validarMail() {
                if(this.value.indexOf("@" && ".com") > -1) {
                    errorDiv.style.display = "none";
                    this.style.border = "1px solid #cccccc"
                } else {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "no es un mail válido";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                }
            }


            // Calcular Montos
            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            function calcularMontos(event){
                event.preventDefault();
                if(regalo.value === '') {
                    alert("Debes elegir un regalo");
                    regalo.focus();
                } else {
                    let boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value) || 0,
                        boletoCompleto = parseInt(pase_completo.value) || 0,
                        cantCamisas = parseInt(camisas.value) || 0,
                        cantEtiquetas = parseInt(etiquetas.value) || 0;

                    let totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                    console.log(totalPagar);

                    let listadoProductos = [];

                    if(boletosDia >= 1) {
                        listadoProductos.push(boletosDia + ' Pases por día');
                    };

                    if(boletos2Dias >= 1) {
                        listadoProductos.push(boletos2Dias + ' Pases por dos días');
                    };

                    if(boletoCompleto >= 1) {
                        listadoProductos.push(boletoCompleto + ' Pases completos');
                    };

                    if(cantCamisas >= 1) {
                        listadoProductos.push(cantCamisas + ' Camisas');
                    };

                    if(cantEtiquetas >= 1) {
                        listadoProductos.push(cantEtiquetas + ' Paquetes de Etiquetas');
                    };


                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = '';
                    for(var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                    }

                    total.innerHTML = '$ ' + totalPagar.toFixed(2);

                    btnRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar.toFixed(2);
                } // else
            } // calcular montos
        }

        // Mostrar Días
        function mostrarDias() {
            let boletosDia = parseInt(pase_dia.value, 10) || 0,
                boletos2Dias = parseInt(pase_dosdias.value) || 0,
                boletoCompleto = parseInt(pase_completo.value) || 0;

            let diasElegidos = [];

            if(boletosDia >= 1){
                diasElegidos.push("viernes");
            } 
            if(boletos2Dias >= 1){
                diasElegidos.push("viernes", "sabado");
            }
            if(boletoCompleto >= 1){
                diasElegidos.push("viernes", "sabado", "domingo");
            }

            document.getElementById(viernes.style.display = 'none');
            document.getElementById(sabado.style.display = 'none');
            document.getElementById(domingo.style.display = 'none');

            for(let i = 0; i < diasElegidos.length; i++){
                document.getElementById(diasElegidos[i]).style.display = 'block';
            }

            console.log(diasElegidos);
        }


    }); // DOM CONTENT LOADED
})();



$(function() {

    // Lettering
    $(".nombre-sitio").lettering();

    // Agregar Clase a Menu
    $('.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    // Menu Fijo
    let windowHeight = $(window).height();
    let barraHeight = $(".barra").innerHeight(); // altura completa


    $(window).scroll(function() {
        let scroll = $(window).scrollTop()
        if(scroll > windowHeight) {
            $(".barra").addClass("fixed");
            $("body").css({"margin-top": barraHeight+"px"});
        } else {
            $(".barra").removeClass("fixed");
            $("body").css({"margin-top": "0px"});
        }
    });

    // Menu Responsive

    $(".menu-movil").click(function() {
        $(".navegacion-principal").slideToggle();

    });

    // Programas de Conferencias
    $(".programa-evento .info-curso:first").show();
    $(".menu-programa a:first").addClass("activo");

    $(".menu-programa a").click(function() {
        $(".menu-programa a ").removeClass('activo');
        $(this).addClass("activo");

        $(".ocultar").hide();
        let enlace = $(this).attr("href");
        $(enlace).fadeIn(1000);
        console.log(enlace);
        
        return false;
    });

    // Animaciones para los Numeros
    $(".resumen-evento .elemento-contador:nth-child(1) p").animateNumber({ number: 6 }, 1200);
    $(".resumen-evento .elemento-contador:nth-child(2) p").animateNumber({ number: 15 }, 1500);
    $(".resumen-evento .elemento-contador:nth-child(3) p").animateNumber({ number: 3 }, 1200);
    $(".resumen-evento .elemento-contador:nth-child(4) p").animateNumber({ number: 9 }, 1500);
    
    // Cuenta Regresiva
    $(".cuenta-regresiva").countdown("2019/12/10 09:00:00", function(event){
        $("#dias").html(event.strftime("%D"));
        $("#horas").html(event.strftime("%H"));
        $("#minutos").html(event.strftime("%M"));
        $("#segundos").html(event.strftime("%S"));
    });

    // Colorbox
    $('.invitado_info').colorbox({inline:true, width:"50%"});
});

$(function() {
    //MAPA

    var map = L.map('mapa').setView([-34.566734, -58.425756], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-34.566734, -58.425756]).addTo(map)
        .bindPopup()
        .bindTooltip('Hipódromo de Palermo')
        .openTooltip();

});
