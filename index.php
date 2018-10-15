


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css">
  </head>
  <body>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

<script>
  $(document).ready(function(){
  //Chosen
  $(".limitedNumbChosen").chosen({
        max_selected_options: 10,
    placeholder_text_multiple: "Selecciona tu ciudad"
    })
    .bind("chosen:maxselected", function (){
        window.alert("no puedes seleccionar mas de 10 elementos!");
    })
 
});
</script>


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
 
     .dropdown-toggle{
      height: 38px;
     }
    
      .form-group{

      }
    


</style>



<p></p>
<form action='index.php' method='get' class="row p-1 col-12">


  <div class="form-group col-2 ">
     
  <?php
        include_once "config.php";
        $sentencia = $base_de_datos->query("SELECT DISTINCT  ciudad FROM propiedades ;");
        $zonas = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
        echo "<select name='ciudad' col-sm-12 class=' selectpicker' data-live-search='true' multiple='true' id='zona'>";
        foreach($zonas as $zona){
          echo " <option value='$zona->ciudad'>$zona->ciudad</option> " ;
        }
        echo "</select>";
        ?>
  
  </div>
  <div class="form-group subzona col-2 ">
     
  <?php
          
          $sentencia = $base_de_datos->query("SELECT DISTINCT  subzona_normalizado FROM propiedades ;");
          $subzonas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
          echo "<select class='selectpicker' data-live-search='true' multiple='true' id='subzona'>";
          echo " <option value='*' id='selected' selected='selected'>Todas las subzonas</option> ";
          foreach($subzonas as $subzona){
            echo " <option value='$subzona->subzona_normalizado'>$subzona->subzona_normalizado</option> " ;
          }
          echo "</select>";
          ?>
  
  </div>


  <div class="form-group col-1 ">
    <select class="form-control" id="exampleSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
    </select>
  </div>

  <div class="form-group col-2 ">
    <select class="form-control" id="exampleSelect1">
      <option>tipo_vivienda</option>
      <option>tipo_vivienda</option>
      <option>tipo_vivienda</option>
      <option>tipo_vivienda</option>
      <option>tipo_vivienda</option>
      <option>tipo_vivienda</option>
    </select>
  </div>

   <div class="form-group col-1 ">
    <select class="form-control" id="exampleSelect1">
      <option>10000</option>
      <option>20000</option>
      <option>30000</option>
      <option>40000</option>
      <option>50000</option>
      <option>60000</option>
    </select>
  </div>

   <div class="form-group col-2 ">
    <select class="form-control" id="exampleSelect1">
      <option>50000</option>
      <option>100000</option>
      <option>150000</option>
      <option>200000</option>
      <option>300000</option>
      <option>400000</option>
    </select>
  </div>

  <div class="form-group col-1 ">
  <button class="btn btn-primary col-12">Buscar</button>
  </div>


</form>


<?php 
$sentencia = $base_de_datos->query("SELECT * FROM propiedades where ciudad = '%%' ;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
print_r($resultado);
?>

<script>

        function displayVals() {

          $(".subzona").hide();
          if($( "#zona" ).val() != null){
                if($( "#zona" ).val().indexOf('Palma de Mallorca') > -1) {
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
