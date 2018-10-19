


var tipo = $( "#tipo_casa" ).val();
function hide_price(tipo) {
    switch (tipo) {
        case "Vender":
            $('.price-rent').addClass('hide-price');
            $('.price-sell').removeClass('hide-price');
            break;

        case "Alquilar":
            $('.price-sell').addClass('hide-price');
            $('.price-rent').removeClass('hide-price');
            break;
    }
}
function Registrar()
{
    var subzon = $("#subzona").val();

    var tip = $("#tipo").val();
    var ciuda = $("#ciudad").val();
    var habitacio = $("#habitacion").val();
 
    $("#respuesta").html("<img src='loading.gif' /> Por favor espera un momento");
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "registrar.php",
        data: "ciudad="+ciuda+"&habitaciones="+habitacio+"&tipo="+tip+"&subzona="+subzon,
        success: function(resp){
            $('#respuesta').html(resp);
            Limpiar();
            Cargar();
            $(document).off('submit');
            $("#buscador_form").attr('action', '/propiedades');
            return true;
        }
    });
}   
function Cargar()
{   
    var subzon = $("#subzona").val();
    var tip = $("#tipo").val();
    var ciuda = $("#ciudad").val();
    var habitacio = $("#habitacion").val();
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "consulta.php",
        data: "ciudad="+ciuda+"&habitaciones="+habitacio+"&tipo="+tip+"&subzona="+subzon,
        success: function(resp){
            $('#respuesta').html(resp);
            Limpiar();
           
        }
    });
       
}
function Limpiar()
{
    $("#cedula").val("");
    $("#nombre").val("");
    $("#fecha").val("");
    $("#cargo").val("");
}




/*
formSubmit();
    $("form").submit(function(event){
        var tipo = $( "#tipo_casa" ).val();
        var referencia = $('*[id*=referencia]:visible').val();
        //var referencia = $( "#referencia" ).val();
        var subzona = $( "#subzona" ).val();
        // var x=document.forms["search_form"]["aproperty_type"].value;
        if(referencia !=""){
            cargando.open();
            var formData =$("#buscador_form").serialize();
            formData = formData + '&idioma=ES';
            $.ajax({
                type: 'POST',
                url: '/wp-content/themes/zoner/template-parts/guardar-busqueda_NEW.php',
                data: formData,
                cache: false
            });
    
            // Evita que se haga submit una segunda vez
            $(document).off('submit');
            $("#buscador_form").attr('action', '/propiedades');
            return true;
        } else if (tipo==""){
            alerta.open();
            return false;
        } else if (subzona==""){
            alertaSubzona.open();
            return false;
        } else {
            cargando.open();
            
            var formData =$("#buscador_form").serialize();
            formData = formData + '&idioma=ES';
      
            var settings = {
              "async" : true,
              "crossDomain" : true,
              "url" : "/wp-content/themes/zoner/template-parts/guardar-busqueda-test.php",
              "method" : "POST",
              "headers" : {
                  "content-type" : "application/x-www-form-urlencoded"
              },
              "data": formData
            }
            $.ajax(settings).done(function (response){ 
              console.log(response);
            } )
            .fail(function (jqXHR,textStatus,errorThrown){
              console.log(response);
            });
            //event.preventDefault();
    
            // Evita que se haga submit una segunda vez
            $(document).off('submit');
            $("#buscador_form").attr('action', '/propiedades');
            return true;
        }
    });
    */