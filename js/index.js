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