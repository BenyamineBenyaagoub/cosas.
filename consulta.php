<?php
require("config.php"); 

//$query="SELECT * FROM propiedades where id > '0' ";
//$sentencia = $base_de_datos->query( $query );
//$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);




$ciudad =  explode( ',', $_POST["ciudad"] );

echo count($ciudad);

$subzona =  explode( ',', $_POST["subzona"] );

if(empty($_POST["ciudad"])){
  echo 'vacio';
}


$query="SELECT ciudad , (habitaciones + habdobles) as hab FROM propiedades where id > '0' ";

$cerrar = false;
if(!empty($_POST["ciudad"] )){
  $array = $ciudad ;
  $longitud = count($array);
  $medidor = 1;


for($i=0; $i<$longitud; $i++){     
    
    if($i == 0){
          
          if( $array[$i] == 'Mallorca'  && $i +1 == $longitud ){

            $query .= "and zona_principal BETWEEN 1 AND 28 "; 
            $medidor = 2;

          }elseif(  $array[$i] == 'Mallorca' &&  $i < $longitud  ){

            $query .= "and ( zona_principal BETWEEN 1 AND 28 "; 
            $medidor = 2;

          }elseif($array[$i] == 'Menorca' && $i +1 == $longitud ){

            $query .= "and zona_principal BETWEEN 30 AND 37 ";
            $medidor = 2;

          }elseif(  $array[$i] == 'Menorca' &&  $i < $longitud  ){

            $query .= "and ( zona_principal BETWEEN 30 AND 37 ";
            $medidor = 2;

          }
      
    }else{

          if($array[$i] == 'Mallorca' && $i +1 < $longitud  ){
            
            $query .= "OR zona_principal BETWEEN 1 AND 28 "; 
          
          }elseif($array[$i] == 'Mallorca' &&  $i+1 > $longitud){

            $query .= "OR zona_principal BETWEEN 1 AND 28) "; 

          }elseif($array[$i] == 'Menorca' && $i +1 < $longitud ){

            echo $i;
            $query .= "OR zona_principal BETWEEN 30 AND 37 ";
          
           }elseif($array[$i] == 'Menorca' &&  $i +1 == $longitud){

            $query .= "OR zona_principal BETWEEN 30 AND 37) "; 

          }



    }

    if($array[$i] != 'Menorca' && $array[$i] != 'Mallorca'){


                
                if($i +1 == $longitud && !empty($_POST["subzona"])){
                
                  $cerrar=true;

                }

               if( !empty($_POST['subzona']) &&  $array[$i] == '1'){
                  // que no haga nada.
               }elseif( $medidor == 1 &&  $longitud == '1' ){

                        $query .= "AND zona_principal = "."'".$array[$i]."'";
                        $medidor = 2;
                        

                }elseif($medidor == 1  &&  $i < $longitud){

                        $query .= "AND ( zona_principal = "."'".$array[$i]."'";
                        $medidor = 2;
                        
                }elseif( $medidor == 2 && $i +1 < $longitud ){

                        $query .= "OR zona_principal = "."'".$array[$i]."'";

                }
                elseif( $medidor == 2  &&  $i +1 == $longitud && empty($_POST["subzona"])){

                        $query .= "OR zona_principal = "."'".$array[$i]."')";
                        $cerrar=true;
                        
                }  

    }	  
  }
}

     if(!empty($_POST['subzona'])){
      
     

      for($i=0; $i< count($subzona); $i++){  


      

         if($i == 0){
            if($subzona[$i] == null){
              $query .= " and ( zona_principal = '1' and subzona_normalizado = BETWEEN 1 and 90 ";
        
           }elseif (count($ciudad) == 1){

            $query .= " and ( zona_principal = '1' and subzona_normalizado = '".$subzona[$i]."' ";

          }else{

            $query .= " or zona_principal = '1' and subzona_normalizado = '".$subzona[$i]."' ";

          }
         
         }else{

          $query .= " or  subzona_normalizado = '".$subzona[$i]."' ";

         }
         if($cerrar == true  &&  $i +1 == count($subzona)){

          $query .= ")";

         }
      } 

    }
      
    if(!empty($_POST['habitaciones'])){

      $query .= "and (habitaciones + habdobles) >= '".$_POST['habitaciones']."'";

    }

    if(!empty($_POST['tipo'])){

        $query .= "and tipo_ofer_normalizado = '".$_POST['tipo']."'";

      }
 
echo $query;

$sentencia = $base_de_datos->query( $query );
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
print_r($resultado);



?>