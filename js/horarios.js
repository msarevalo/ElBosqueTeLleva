var i=0;
var j=0;
$(document).ready(function(){
    $('#bus').click(function(){
        if(i == 0 && j == 0) {
            $('#tren').css('opacity', '0.4');
            $('#bus').css('opacity', '1');
            $('#horarios').css('display', 'none');
            $('#horariosBus').css('display', 'block');
            $('#horariosTren').css('display', 'none');
            i++;
        }else {
            if (i == 0 && j != 0){
                $('#tren').css('opacity', '0.4');
                $('#bus').css('opacity', '1');
                $('#horarios').css('display', 'none');
                $('#horariosBus').css('display', 'block');
                $('#horariosTren').css('display', 'none');
                i++;
                j=0;
            }else {
                $('#tren').css('opacity', '1');
                $('#tren').css('opacity', '1');
                $('#horarios').css('display', 'block');
                $('#horariosBus').css('display', 'none');
                $('#horariosTren').css('display', 'none');
                i=0;
                j=0;
            }
        }
    });
});

$(document).ready(function () {
    $('#tren').click(function () {
        if(i == 0 && j == 0){
            $('#bus').css('opacity', '0.4');
            $('#tren').css('opacity', '1');
            $('#horarios').css('display', 'none');
            $('#horariosBus').css('display', 'none');
            $('#horariosTren').css('display', 'block');
            j++;
        }else {
            if(i != 0 && j == 0){
                $('#bus').css('opacity', '0.4');
                $('#tren').css('opacity', '1');
                $('#horarios').css('display', 'none');
                $('#horariosBus').css('display', 'none');
                $('#horariosTren').css('display', 'block');
                j++;
                i=0;
            }else {
                $('#bus').css('opacity', '1');
                $('#tren').css('opacity', '1');
                $('#horarios').css('display', 'block');
                $('#horariosBus').css('display', 'none');
                $('#horariosTren').css('display', 'none');
                i=0;
                j=0;
            }
        }
    })
});

$(document).ready(function(){
    $('.bus-img').click(function(){
        if(i == 0 && j == 0) {
            $('#tren').css('opacity', '0.4');
            $('#bus').css('opacity', '1');
            $('#horarios').css('display', 'none');
            $('#horariosBus').css('display', 'block');
            $('#horariosTren').css('display', 'none');
            i++;
        }else {
            if (i == 0 && j != 0){
                $('#tren').css('opacity', '0.4');
                $('#bus').css('opacity', '1');
                $('#horarios').css('display', 'none');
                $('#horariosBus').css('display', 'block');
                $('#horariosTren').css('display', 'none');
                i++;
                j=0;
            }else {
                $('#tren').css('opacity', '1');
                $('#tren').css('opacity', '1');
                $('#horarios').css('display', 'block');
                $('#horariosBus').css('display', 'none');
                $('#horariosTren').css('display', 'none');
                i=0;
                j=0;
            }
        }
    });
});

$(document).ready(function () {
    $('.tren-img').click(function () {
        if(i == 0 && j == 0){
            $('#bus').css('opacity', '0.4');
            $('#tren').css('opacity', '1');
            $('#horarios').css('display', 'none');
            $('#horariosBus').css('display', 'none');
            $('#horariosTren').css('display', 'block');
            j++;
        }else {
            if(i != 0 && j == 0){
                $('#bus').css('opacity', '0.4');
                $('#tren').css('opacity', '1');
                $('#horarios').css('display', 'none');
                $('#horariosBus').css('display', 'none');
                $('#horariosTren').css('display', 'block');
                j++;
                i=0;
            }else {
                $('#bus').css('opacity', '1');
                $('#tren').css('opacity', '1');
                $('#horarios').css('display', 'block');
                $('#horariosBus').css('display', 'none');
                $('#horariosTren').css('display', 'none');
                i=0;
                j=0;
            }
        }
    })
});

