var i=0
$(document).ready(function(){
    $('#eye').click(function(){
        if(i==0){
            $('#pass').attr('type', 'text');
            $('#eye').css('opacity', '0.4');
            $('#mostrar').css('opacity', '0.4');
            i++;
        }else{
            $('#pass').attr('type', 'password');
            $('#eye').css('opacity', '0.5');
            $('#mostrar').css('opacity', '0.5');
            i=0;
        }
    });
});

$(document).ready(function(){
    $('#mostrar').click(function(){
        if(i==0){
            $('#pass').attr('type', 'text');
            $('#mostrar').css('opacity', '0.4');
            $('#eye').css('opacity', '0.4');
            i++;
        }else{
            $('#pass').attr('type', 'password');
            $('#eye').css('opacity', '0.5');
            $('#mostrar').css('opacity', '0.5');
            i=0;
        }
    });
});

function noVolver() {
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="";}
}

$(document).ready(function () {
    (function () {
        var login = {
            init: function () {
                this.cacheDom();
                this.addEvents();
            },
            cacheDom: function () {
                this.$loginBtn    = $('#login');
                this.$loginPopup  = $('.login-popup');
                this.$closePopup  = $('.close-icon');
            },
            addEvents: function () {
                this.$loginBtn.on('click', this.showLogin.bind(this));
                this.$closePopup.on('click', this.hideLogin.bind(this));
            },
            showLogin: function (e) {
                e.preventDefault();
                this.$loginPopup.fadeIn('fast');
            },
            hideLogin: function () {
                this.$loginPopup.fadeOut('fast');
            }
        }
        login.init();


    })();

    $(document).on('keyup',function(evt) {
        if (evt.keyCode == 27) {
            $('.login-popup').fadeOut('fast');
        }
    });

});

$(document).ready(function ($) {

    setInterval(function () {moveRight();}, 6500);

    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;

    $('#slider').css({ width: slideWidth, height: slideHeight });

    $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 500, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 1500, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});

function sinLogueo() {
    $('.login-popup').fadeIn('fast');
};

function arriba() {
    window.scroll(0,0);
}

function alertaBanners(ideliminar) {
    var eliminarBanner = ideliminar;
    var r = confirm("Desea eliminar el banner?");
    if (r == true){
        alert(eliminarBanner);
    } else {
        //alert('Canceló');
    }

}

function alertaConductores(ideliminar) {
    var eliminarConductor = ideliminar;
    var r = confirm("Desea eliminar el Conductor?");
    if (r == true){
        location.href = "../back/eliminarConductor.php?id=" + eliminarConductor;
    } else {
        //alert('false');
    }
}

function alertaEmpresa(ideliminar) {
    var eliminarEmpresa = ideliminar;
    var r = confirm("Desea eliminar la Empresa?");
    if (r == true){
        location.href = "../back/eliminarEmpresa.php?id=" + eliminarEmpresa;
    } else {
        //alert('cancelo');
    }
}

function alertaVehiculo(ideliminar) {
    var eliminarVehiculo = ideliminar;
    var  r = confirm("Desea eliminar el Vehiculo?");
    if (r == true){
        location.href = "../back/eliminarVehiculo.php?id=" + eliminarVehiculo;
    } else {
        alert("cancelo");
    }
}

function alertaTvehiculo(ideliminar) {
    var eliminarTvehiculo = ideliminar;
    var r = confirm("Desea eliminar el tipo de vehiculo?");
    if (r == true){
        location.href = "../back/eliminarTvehiculo.php?id=" + eliminarTvehiculo;
    }else {
        //alert('cancelo');
    }
}

function alertaRuta(ideliminar) {
    var eliminarRuta = ideliminar;
    var r = confirm("Desea eliminar la ruta?");
    if (r == true){
        location.href = "../back/eliminarRuta.php?id=" + eliminarRuta;
    }else {
        //alert('cancelo');
    }
}

function ajaxhorario(val)
{
    $.ajax({
        type: 'post',
        url: '../back/select_data.php',
        data: {
            get_option:val
        },
        success: function (response) {
            document.getElementById("horas").innerHTML=response;
        }
    });
}

function ajaxhorario(val)
{
    $.ajax({
        type: 'post',
        url: '../back/select_data.php',
        data: {
            get_option:val
        },
        success: function (response) {
            document.getElementById("horas").innerHTML=response;
        }
    });
}

function ajaxvehiculo(val)
{
    $.ajax({
        type: 'post',
        url: '../back/selectvehiculos.php',
        data: {
            get_option:val
        },
        success: function (response) {
            document.getElementById("placas").innerHTML=response;
        }
    });
}

function ajaxconductor(val)
{
    if (val.length >= 2) {
        $.ajax({
            type: 'post',
            url: '../back/selectconductores.php',
            data: {
                get_option: val
            },
            success: function (response) {
                document.getElementById("conductor").innerHTML = response;
            }
        })
    };
}function ajaxconductor(val)
{
    if (val.length >= 2) {
        $.ajax({
            type: 'post',
            url: '../back/selectconductores.php',
            data: {
                get_option: val
            },
            success: function (response) {
                document.getElementById("conductor").innerHTML = response;
            }
        })
    };
}
