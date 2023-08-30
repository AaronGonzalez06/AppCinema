$(document).ready(function(){
    console.log("jquery cargao");
    
    $('.cine1').click(function(){

        $(".horario1").show();
        $(".horario2").hide();
        $(".horario3").hide();
    })
    $('.cine2').click(function(){

        $(".horario1").hide();
        $(".horario2").show();
        $(".horario3").hide();
    })
    $('.cine3').click(function(){

        $(".horario1").hide();
        $(".horario2").hide();
        $(".horario3").show();
    })

    function cero (dia){
        if(dia <10){
            dia = "0" + dia;
            return  dia;
        }
            return dia;
    }

            var dia = new Date();
            var hoy = cero (dia.getDate() );
            var manana =cero ( dia.getDate() +1) ;
            var dia3 =cero ( dia.getDate() + 2) ;
            var dia4 =cero ( dia.getDate() + 3) ;
            var dia5 =cero ( dia.getDate() + 4) ;

            

            //para horario cine concreto
            
            $('.'+hoy).click(function(){
                console.log("ey");
                $(".hora"+hoy).show();
                $(".hora"+manana).hide();
                $(".hora"+dia3).hide();
                $(".hora"+dia4).hide();
                $(".hora"+dia5).hide();
            })

            $('.'+manana).click(function(){
                
                $(".hora"+hoy).hide();
                $(".hora"+manana).show();
                $(".hora"+dia3).hide();
                $(".hora"+dia4).hide();
                $(".hora"+dia5).hide();
            })

            $('.'+dia3).click(function(){
                
                $(".hora"+hoy).hide();
                $(".hora"+manana).hide();
                $(".hora"+dia3).show();
                $(".hora"+dia4).hide();
                $(".hora"+dia5).hide();
            })

            $('.'+dia4).click(function(){
                
                $(".hora"+hoy).hide();
                $(".hora"+manana).hide();
                $(".hora"+dia3).hide();
                $(".hora"+dia4).show();
                $(".hora"+dia5).hide();
            })

            $('.'+dia5).click(function(){
                
                $(".hora"+hoy).hide();
                $(".hora"+manana).hide();
                $(".hora"+dia3).hide();
                $(".hora"+dia4).hide();
                $(".hora"+dia5).show();
            })

            //para horario cine concreto
            //fin




            //genero select

            $('a.accion').click(function(){
                //console.log("hola");
                $("article.accion").show();
                $("article.terror").hide();
                $("article.fantasia").hide();
                $("article.animacion").hide();
                $("article.drama").hide();
            });

            $('a.terror').click(function(){
                //console.log("hola");
                $("article.accion").hide();
                $("article.terror").show();
                $("article.fantasia").hide();
                $("article.animacion").hide();
                $("article.drama").hide();
            });

            $('a.fantasia').click(function(){
                //console.log("hola");
                $("article.accion").hide();
                $("article.terror").hide();
                $("article.fantasia").show();
                $("article.animacion").hide();
                $("article.drama").hide();
            });

            $('a.animacion').click(function(){
                //console.log("hola");
                $("article.accion").hide();
                $("article.terror").hide();
                $("article.fantasia").hide();
                $("article.animacion").show();
                $("article.drama").hide();
            });

            $('a.drama').click(function(){
                //console.log("hola");
                $("article.accion").hide();
                $("article.terror").hide();
                $("article.fantasia").hide();
                $("article.animacion").hide();
                $("article.drama").show();
            });


            //tema entradas.


            //funciona
               /* $('.centro_butacas').on('click', 'td', function(){
                  alert($(this).text())
                })*/

                function removeItemFromArr ( arr, item ) {
                    var i = arr.indexOf( item );
                    arr.splice( i, 1 );
                }


                var entradas = new Array();
                var nuevo;

            
                    //
                    $('.oeste_butacas td').click( function(){
                        if($(this).hasClass("pillado")){
                            $(this).removeClass("pillado");
                            $(this).addClass("quitar");
                            nuevo = $(this).text();
                            removeItemFromArr(entradas,nuevo);
                            $('#ticked').text("Entradas: "+ entradas.length);
                        } else if($(this).hasClass("ocupado")){
                            console.log("a");
                        }else{
                            $(this).removeClass("quitar");
                            $(this).addClass("pillado");
                            nuevo = $(this).text()+"-oeste";
                            entradas.push(nuevo);
                            console.log(entradas);
                            $('#ticked').text("Entradas: "+ entradas.length);

                        }
                        //alert($(this).text())
                      })

                

                    $('.centro_butacas td').click( function(){
                        if($(this).hasClass("pillado")){
                            $(this).removeClass("pillado");
                            $(this).addClass("quitar");
                            nuevo = $(this).text();
                            removeItemFromArr(entradas,nuevo);
                            $('#ticked').text("Entradas: "+ entradas.length);
                        } else if($(this).hasClass("ocupado")){
                            console.log("a");
                        }else{
                            $(this).removeClass("quitar");
                            $(this).addClass("pillado");
                            nuevo = $(this).text()+"-centro";
                            entradas.push(nuevo);
                            console.log(entradas);
                            $('#ticked').text("Entradas: "+ entradas.length);

                        }
                        //alert($(this).text())
                      })

                      $('.este td').click( function(){
                        if($(this).hasClass("pillado")){
                            $(this).removeClass("pillado");
                            $(this).addClass("quitar");
                            nuevo = $(this).text();
                            removeItemFromArr(entradas,nuevo);
                            $('#ticked').text("Entradas: "+ entradas.length);
                        } else if($(this).hasClass("ocupado")){
                            console.log("a");
                        }else{
                            $(this).removeClass("quitar");
                            $(this).addClass("pillado");
                            nuevo = $(this).text()+"-este";
                            entradas.push(nuevo);
                            console.log(entradas);
                            $('#ticked').text("Entradas: "+ entradas.length);

                        }
                        //alert($(this).text())
                      })
                     



                      //ir a pagar

                      $('#pay').click(function(){
                        console.log("se entra");
                
                        //var cuidad = $('.SelectCineCiudad').val();
                        //console.log(ciudad);
                
                        $.ajax({
                            type: 'POST',  // Envío con método POST
                            url: 'http://localhost/CineAnd/ajax/entradas.php',  // Fichero destino (el PHP que trata los datos)
                            data: { sitios: JSON.stringify(entradas) } // Datos que se envían
                            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                                //$("#pruebaEntrad").html(resp); 
                                window.location.href = "http://localhost/CineAnd/entradas.php";
                            });
                
                
                    })


                

         //fin pruebas tema entradas



        //para control select
    $('.SelectCineCiudad').click(function(){
        console.log($('.SelectCineCiudad').val());

        //var cuidad = $('.SelectCineCiudad').val();
        //console.log(ciudad);

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/cine.php',  // Fichero destino (el PHP que trata los datos)
            data: { enciudad: $('.SelectCineCiudad').val() } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".SelectCine").html(resp); 
            });


    })

    /*
    Vamos con el flitro del los 5 dias al pedirlo desde el buscador 
    para cada cine
     */


    $('.clickfechaCine1').click(function(){
        
        var fecha = $('.fecha1').text();
        var cine = $('#CineNombre').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fechaCine.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha, encine: cine } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaPeliculas").html(resp); 
            });


    });

    $('.clickfechaCine2').click(function(){
        
        var fecha = $('.fecha2').text();
        var cine = $('#CineNombre').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fechaCine.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha, encine: cine } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaPeliculas").html(resp); 
            });


    });

    $('.clickfechaCine3').click(function(){
        var fecha = $('.fecha3').text();
        var cine = $('#CineNombre').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fechaCine.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha, encine: cine } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaPeliculas").html(resp); 
            });


    });


    $('.clickfechaCine4').click(function(){
        var fecha = $('.fecha4').text();
        var cine = $('#CineNombre').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fechaCine.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha, encine: cine } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaPeliculas").html(resp); 
            });


    });


    $('.clickfechaCine5').click(function(){
        var fecha = $('.fecha5').text();
        var cine = $('#CineNombre').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fechaCine.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha, encine: cine } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaPeliculas").html(resp); 
            });


    });


   
    /**fin tarea */




    $('.clickfecha1').click(function(){
        console.log($('.fecha1').text());

        var fecha = $('.fecha1').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fecha.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaHora").html(resp); 
            });


    })


    $('.clickfecha2').click(function(){
        console.log($('.fecha2').text());

        var fecha2 = $('.fecha2').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fecha.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha2 } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaHora").html(resp); 
            });


    })

    $('.clickfecha3').click(function(){
        console.log($('.fecha3').text());

        var fecha = $('.fecha3').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fecha.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaHora").html(resp); 
            });


    })


    $('.clickfecha4').click(function(){
        console.log($('.fecha4').text());

        var fecha = $('.fecha4').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fecha.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaHora").html(resp); 
            });


    })


    $('.clickfecha5').click(function(){
        console.log($('.fecha5').text());

        var fecha = $('.fecha5').text();

        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'http://localhost/CineAnd/ajax/fecha.php',  // Fichero destino (el PHP que trata los datos)
            data: { enfecha: fecha } // Datos que se envían
            }).done(function( resp ) {  // Función que se ejecuta si todo ha ido bien
                $(".listaHora").html(resp); 
            });


    })




})