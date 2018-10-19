


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="ajax.js"></script>
  </head>
  <body>




<style>

.bg-dark {
  background-color: #f77a00!important;
}

.btn{
  border-radius: 2px;

}

.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 100%;
}    

*{
  padding-right: 5px !important;
  padding-left: 5px !important;  
}
.filter-option{
 border-radius:0px !important;
 background-color: #f3f3f3;ç
}
.dropdown-toggle{ height: 38px; }

</style>




<form name="empleado" onsubmit="return false" action="return false"class="row p-1 col-12">



  <div class="form-group col-2 ">
     
  <?php
        include_once "config.php";
        $sentencia = $base_de_datos->query("SELECT DISTINCT zonas_principales.id_zona as codi, CONCAT( zonas_principales.zona , '  (',lower(zonas_principales.lugar),')' ) AS ciudad from propiedades,zonas_principales where   propiedades.zona_principal = zonas_principales.id_zona;  ;");
        $zonas = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
        echo "<select name='ciudad[]' id='ciudad' placeholder='elige' col-sm-12 class='  selectpicker' data-live-search='true' multiple='true' id='zona'>";
     
       
        foreach($zonas as $zona){
          echo " <option value='$zona->codi'>$zona->ciudad</option> " ;
        }
        echo "</select>";
        ?>
  
  </div>
  <div class="form-group subzona col-2 ">
     
  <?php
          
          $sentencia = $base_de_datos->query("SELECT DISTINCT  subzona_normalizado FROM propiedades ;");
          $subzonas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
          echo "<select name='subzona[]' id='subzona' class='selectpicker' data-live-search='true' multiple='true' id='subzona'>";
          echo " <option value='' id='selected' selected='selected'>Todas las subzonas</option> ";
          foreach($subzonas as $subzona){
            echo " <option value='$subzona->subzona_normalizado'>$subzona->subzona_normalizado</option> " ;
          }
          echo "</select>";
          ?>
  
  </div>


  <div class="form-group col-1 ">
    <select id="habitacion" name="habitaciones" class="form-control" id="exampleSelect1">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
    </select>
  </div>

  <div class="form-group col-2 ">
    <select id="tipo" class="form-control" id="exampleSelect1">
      <option value="">Todos los tipos</option> 
      <option data-divider="true"></option>
      <option  value="viviendas" disabled>Viviendas</option>
      <option value="viviendas_casas_o_chalets">Casas o Chalets</option>
      <option value="viviendas_pisos">Pisos</option>
      <option value="viviendas_aticos">Áticos</option>
      <option value="viviendas_casas_rusticas">Casas Rústicas</option>
      <option data-divider="true"></option>
      <option value="edificios" disabled>Edificios</option>
      <option value="garajes">Garajes</option>
      <option value="oficinas">Oficinas</option>
      <option value="terrenos">Terrenos</option>
      <option value="locales_naves">Locales o Naves</option>
    </select>
  </div>

   <div class="form-group col-1 ">
    <select class="form-control" id="exampleSelect1">
      <option value="0000000">Precio Min.</option>
      <option value="300" class="price price-rent hide-price">300€/mes</option>
      <option value="500" class="price price-rent hide-price">500€/mes</option>
      <option value="700" class="price price-rent hide-price">700€/mes</option>
      <option value="800" class="price price-rent hide-price">800€/mes</option>
      <option value="1400" class="price price-rent hide-price">1.400€/mes</option>
      <option value="1800" class="price price-rent hide-price">1.800€/mes</option>
      <option value="2000" class="price price-rent hide-price">2.000€/mes</option>
      <option value="50000" class="price price-sell">50.000€</option>
      <option value="70000" class="price price-sell">70.000€</option>
      <option value="100000" class="price price-sell">100.000€</option>
      <option value="150000" class="price price-sell">150.000€</option>
      <option value="200000" class="price price-sell">200.000€</option>
      <option value="250000" class="price price-sell">250.000€</option>
      <option value="300000" class="price price-sell">300.000€</option>
    </select>
  </div>

   <div class="form-group col-2 ">
    <select class="form-control" id="exampleSelect1">
      <option value="99999999">Precio Max.</option>
      <option value="700" class="price price-rent hide-price">700€/mes</option>
      <option value="800" class="price price-rent hide-price">800€/mes</option>
      <option value="1400" class="price price-rent hide-price">1400€/mes</option>
      <option value="1800" class="price price-rent hide-price">1800€/mes</option>
      <option value="2000" class="price price-rent hide-price">2000€/mes</option>
      <option value="2500" class="price price-rent hide-price">2500€/mes</option>
      <option value="3000" class="price price-rent hide-price">3000€/mes</option>
      <option value="70000" class="price price-sell show">70.000€</option>
      <option value="100000" class="price price-sell show">100.000€</option>
      <option value="150000" class="price price-sell show">150.000€</option>
      <option value="200000" class="price price-sell show">200.000€</option>
      <option value="250000" class="price price-sell show">250.000€</option>
      <option value="300000" class="price price-sell show">300.000€</option>
      <option value="500000" class="price price-sell show">500.000€</option>
      <option value="1000000" class="price price-sell show">1.000.000€</option>
      <option value="2000000" class="price price-sell show">2.000.000€</option>
    </select>
  </div>

  <div class="form-group col-1 ">
  <button onclick="Registrar();" class="btn btn-primary col-12">Buscar</button>
  </div>


</form>

<div id="respuesta"></div>

 <div class="datagrid" id="datagrid">

</div>  
<script>

        function displayVals() {

          $(".subzona").hide();
          if($( "#ciudad" ).val() != null){
                if($( "#ciudad" ).val().indexOf('1') > -1) {
                $(".subzona").show();
                $('#subzona').on('change', function() { 
                      $('#selected').removeAttr('selected');
                      $('#selected').prop('disabled', true);
                      
                  
                  });
                }
          }  

        }
        
        $( "select" ).change( displayVals );

        displayVals();
</script>


      </body>
