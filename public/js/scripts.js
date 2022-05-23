$(document).ready(function(){

    $('#contacto_preferenciaLlamada option').hide();
    $('#contacto_vehiculo option').hide();

    // $('#contacto_telefono').attr('pattern', '^[6|7|9]\\d{8}$');
    // $('#contacto_telefono').attr('maxlength', '9');

    $('#contacto_tipoVehiculo').on('change',function(){
        var tipoVehiculo = $(this).val();

        if(tipoVehiculo == 'Todoterreno'){
            $('#contacto_vehiculo option').hide();
            $("#contacto_vehiculo option[value='Mokka']").show();
        } else {
            $('#contacto_vehiculo option').hide();
            $("#contacto_vehiculo option[value='Astra']").show();
            $("#contacto_vehiculo option[value='Corsa']").show();
        }
    });

    if ($('#contacto_telefono').val() != null) {
        $('#contacto_preferenciaLlamada option').show();
    };

    var btnEnviar = $('#contacto_enviar');
    btnEnviar.on('click', function(){
        btnEnviar.after('<div id="datos" class="d-flex justify-content-center"></div>');
        btnEnviar.hide();
        $('#datos').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');

        $("form[name='contacto']").validate();


    });




})