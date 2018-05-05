var i=0
$(document).ready(function(){

    $('#eye').click(function(){
        if(i==0){
            $('#pass').attr('type', 'text');
            $('#eye').css('opacity', '0.3');
            $('#mostrar').css('opacity', '0.3');
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
            $('#mostrar').css('opacity', '0.3');
            $('#eye').css('opacity', '0.3');
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