<?php
include 'Constantes.php';
include 'Librerias.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $oCamp=new Campeonato();
        
       
          while($obj=$oCamp->ListaCampeonatos()){
             echo "<a href=ListadoEquipos.php?idcampeonato=$obj->idcampeonato>$obj->nombre </a><br>";
          };
        ?>
    </body>
</html>