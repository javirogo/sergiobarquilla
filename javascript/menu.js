$(function(){
    var anC1, anC2, alC1, alC2, diff;
    var header = document.getElementById('header');
    var headroom = new Headroom(header);
    headroom.init();
    //Menu Responsive
    //Calculamos el ancho de la pagina
    var ancho = $(window).width(),
        enlaces = $('#enlaces'),
        btnMenu = $('#btn-menu'),
        icono = $('#btn-menu .icono');
    
        if(ancho < 850){
            enlaces.hide();
            icono.addClass('fa-bars');
        }
    
        btnMenu.on('click', function(e){
            enlaces.slideToggle();
            icono.toggleClass('fa-bars');
            icono.toggleClass('fa-times');
        });
        $(window).resize(function(){
                document.body.style.overflow="hidden";
                anC1=document.body.clientWidth;
                alC1=document.body.clientHeight;
                document.body.style.overflow="auto";
                anC2=document.body.clientWidth;
                alC2=document.body.clientHeight;
                diff=anC1-anC2;
                if((anC1!=anC2) || (alC1!=alC2)){
                    if($(this).width() > 850-diff){
                        enlaces.show();
                        icono.addClass('fa-times');
                        icono.removeClass('fa-bars');
                    } else {
                        enlaces.hide();
                        icono.addClass('fa-bars');
                        icono.removeClass('fa-times');
                    }
                } else {
                    if($(this).width() > 850){
                        enlaces.show();
                        icono.addClass('fa-times');
                        icono.removeClass('fa-bars');
                    } else {
                        enlaces.hide();
                        icono.addClass('fa-bars');
                        icono.removeClass('fa-times');
                    }
                }    
        });
});