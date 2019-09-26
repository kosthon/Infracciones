<?php

require_once('Conexion.php');
//instanciación de la clase conexión a postgresql.

$conexion = new ConexionPGSQL();
$conexion->conectar();

   

    $Warning='Warning';
    $citation='Citation';
    $sero='SERO';
    $esero='ESERO';

   


    if(isset($_POST['color'])){

        $color=$_POST['color'];
        $raza=$_POST['raza'];
        $tipocarro=$_POST['tipocarro'];
        $genero=$_POST['tipogenero'];
        $licencia=$_POST['licencia'];

        $totalinfracciones = $conexion->getCountInfractions();

        $conexion->setTotalInfracciones($totalinfracciones);

        $atraercolor = $conexion->atraercolor($citation,$color);
        $atraerraza = $conexion->atraerraza($citation,$raza);
        $atraertipodecarro = $conexion->atraertipodecarro($citation,$tipocarro);
        $atraergenero =$conexion->atraergenero($citation,$genero);
        $estadolicencia =$conexion->estadolicencia($citation,$licencia);
        $cantidadinfracciones = $conexion->cantidadInfracciones($citation);
        $pesocitation = $conexion->calcularalgo($atraercolor,$atraergenero,$atraerraza,$estadolicencia,$atraertipodecarro,$cantidadinfracciones);
        echo 'CITATION: <br>';
        echo 'Color: '.$atraercolor.'<br>';
        echo 'Raza: '.$atraerraza.'<br>';
        echo 'Carro: '.$atraertipodecarro.'<br>';
        echo 'Genero: '.$atraergenero.'<br>';
        echo 'Estado: '.$estadolicencia.'<br>';
        echo 'Cantidad: '.$cantidadinfracciones.'<br>';
        echo 'Total' .$totalinfracciones.'<br>';
        echo 'Peso: '.$pesocitation.'<br>';
        echo '<br>';

        $atraercolora = $conexion->atraercolor($esero,$color);
        $atraerrazaa = $conexion->atraerraza($esero,$raza);
        $atraertipodecarroa = $conexion->atraertipodecarro($esero,$tipocarro);
        $atraergeneroa =$conexion->atraergenero($esero,$genero);
        $estadolicenciaa =$conexion->estadolicencia($esero,$licencia);
        $cantidadinfraccionesa = $conexion->cantidadInfracciones($esero);
        $pesocitationa = $conexion->calcularalgo($atraercolora,$atraergeneroa,$atraerrazaa,$estadolicenciaa,$atraertipodecarroa,$cantidadinfracciones);       
        echo 'ESERO: <br>';
        echo 'Color: '.$atraercolora.'<br>';
        echo 'Raza: '.$atraerrazaa.'<br>';
        echo 'Carro: '.$atraertipodecarroa.'<br>';
        echo 'Genero: '.$atraergeneroa.'<br>';
        echo 'Estado: '.$estadolicenciaa.'<br>';
        echo 'Cantidad: '.$cantidadinfraccionesa.'<br>';
        echo 'Total' .$totalinfracciones.'<br>';
        echo 'Peso: '.$pesocitationa.'<br>';
        echo '<br>';

        $atraercolorw = $conexion->atraercolor($Warning,$color);
        $atraerrazaw= $conexion->atraerraza($Warning,$raza);
        $atraertipodecarrow= $conexion->atraertipodecarro($Warning,$tipocarro);
        $atraergenerow =$conexion->atraergenero($Warning,$genero);
        $estadolicenciaw =$conexion->estadolicencia($Warning,$licencia);
        $cantidadinfraccionesw = $conexion->cantidadInfracciones($Warning);
        $pesocitationw = $conexion->calcularalgo($atraercolorw,$atraergenerow,$atraerrazaw,$estadolicenciaw,$atraertipodecarrow,$cantidadinfraccionesw);       
        echo 'WARNINIG: <br>';
        echo 'Color: '.$atraercolorw.'<br>';
        echo 'Raza: '.$atraerrazaw.'<br>';
        echo 'Carro: '.$atraertipodecarrow.'<br>';
        echo 'Genero: '.$atraergenerow.'<br>';
        echo 'Estado: '.$estadolicenciaw.'<br>';
        echo 'Cantidad: '.$cantidadinfraccionesw.'<br>';
        echo 'Total' .$totalinfracciones.'<br>';
        echo 'Peso: '.$pesocitationw.'<br>';
        echo '<br>';

        $atraercolors = $conexion->atraercolor($sero,$color);
        $atraerrazas= $conexion->atraerraza($sero,$raza);
        $atraertipodecarros= $conexion->atraertipodecarro($sero,$tipocarro);
        $atraergeneros =$conexion->atraergenero($sero,$genero);
        $estadolicencias=$conexion->estadolicencia($sero,$licencia);
        $cantidadinfraccioness = $conexion->cantidadInfracciones($sero);
        $pesocitations = $conexion->calcularalgo($atraercolors,$atraergeneros,$atraerrazas,$estadolicencias,$atraertipodecarros,$cantidadinfraccioness);       
        echo 'SERO: <br>';
        echo 'Color: '.$atraercolors.'<br>';
        echo 'Raza: '.$atraerrazas.'<br>';
        echo 'Carro: '.$atraertipodecarros.'<br>';
        echo 'Genero: '.$atraergeneros.'<br>';
        echo 'Estado: '.$estadolicencias.'<br>';
        echo 'Cantidad: '.$cantidadinfraccioness.'<br>';
        echo 'Total' .$totalinfracciones.'<br>';
        echo 'Peso: '.$pesocitations.'<br>';
        echo '<br>';


    }
    ?>