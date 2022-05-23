$(document).ready(function(){

    var btnEnviar = $('#contacto_enviar');
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

   
    btnEnviar.on('click', function(){

        $("form[name='contacto']").validate();

        if($('.error').length != null){
            btnEnviar.show();
            
        } else {
            btnEnviar.hide(); 
        }
    });

})