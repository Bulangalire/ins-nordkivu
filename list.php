<?php
include("libs/db_connected.php");

$type= empty($_GET['type'])?'cellule' :$_GET['type'];

if($type==='cellule'){
    $table='cellules';
    $foreign='quartier';

}else if($type==='avenue'){
    $table='avenue';
    $foreign='cellule';
}else{
    throw new Exception('Type inconu '. $type);
}
$filtre=  $_GET['filter'];
$query="SELECT id, nom From $table Where $foreign=". $filtre;

$resultRequete = mysqli_query($con, $query);

$donnees= mysqli_fetch_all($resultRequete);


header('Content-Type:application/json');



 echo json_encode(array_map  (function($key, $value){
    return[
        'label'=>$value[1],
        'value'=>$value[0],
    ];

},
array_keys($donnees), array_values($donnees)));


?>