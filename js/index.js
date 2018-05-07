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