    function printDiv() {
       var contenido= document.getElementById('imprimible').innerHTML;
       var contenidoOriginal= document.body.innerHTML;
       document.body.innerHTML = contenido;
       window.print();
       document.body.innerHTML = contenidoOriginal;
      }

    function capaNoPostula(){
        $('#datosalumno').hide();
        $('#subearchivos').hide();
        $('#descripcion').hide();
        $('#botonenviar').hide();
        $('#mensajefinal').show();
        $('#salir').html("<a href='salir.php' class='btn btn-default' role='button' >Salir</a>");
    }
    function capaPostula(){
        $('#mensajefinal').hide();
        $('#descripcion').show();
        $('#datosalumno').show();
        $('#subearchivos').show();
        $('#botonenviar').show();
        $('#salir').html("<a href='salir.php' class='btn btn-default' role='button' >Salir</a>");   
    }

    $(document).ready(function(){
        function validaModificaPostula(){
            //console.log(rut0);
            var datay = {"rut": rut0,
                        "Accion":"obtener"
                        };
            $.ajax({
                data: datay, 
                type: "POST",
                dataType: "json", 
                url: "controllers/controlalumnobeca.php",
            })
            .done(function(data,textStatus,jqXHR ) {
                /*if ( console && console.log ) {
                    console.log( " data success : "+ data.success 
                        + " \n data msg : "+ data.message 
                        + " \n textStatus : " + textStatus
                        + " \n jqXHR.status : " + jqXHR.status );
                }*/
                if(data.datos.alumbeca_otrasbecas == "No postula"){
                    capaNoPostula();
                }else{
                    capaPostula();
                    $('#datosalumno').html("");
                    tabla = '<tr><td> Rut: ' + data.datos.alumbeca_rut;
                    tabla += '</td><td>Nombre: '+data.datos.alumbeca_nombres + ' ' + data.datos.alumbeca_apepat + ' ' + data.datos.alumbeca_apemat;
                    tabla += '</td><td>Fecha de postulación: ' + data.datos.alumbeca_fecha_postula+'</td></tr>';
                    tabla += '<tr><td colspan="2">Correo: ' + data.datos.alumbeca_correo;
                    tabla += '</td><td>Teléfono: ' + data.datos.alumbeca_fono+'</td></tr>';
                    tabla += '<tr><td colspan="3">Carrera: ' + data.datos.alumbeca_nombrecarr + '</td></tr>';
                    tabla += '<tr><td colspan="3">Beca a la que postula: <b>' + data.datos.alumbeca_otrasbecas + '</b></td></tr>';
                    $('#datosalumno').append(tabla);
                    $("#email").val(data.datos.alumbeca_correo);
                }
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                        + " \n errorThrown : "+ errorThrown
                        + " \n textStatus : " + textStatus
                        + " \n jqXHR.status : " + jqXHR.status );
                }
            });                        
        }

        validaModificaPostula();
    });
