<html>
<head>
    <meta charset="utf-8" />
    <title>Excercici 2</title>
    <style type="text/css">
        table, th, td {
            border: 1px solid black;
        }
        table {
            width: 50%;
        }

        th {
            height: 70px;
        }
    </style>
</head>

<body>
<h1>Temps destinat</h1>
<form action="<?php RUTA2 . 'indexPlugin2.php'?>", method="POST">
    <input type="submit" name="accio" value="Començar">
    <input type="submit" name="accio" value="Parar i afegir">
    <input type="submit" name="accio" value="Total temps">
    <input type="submit" name="accio" value="Resetejar">
</form>
<?php
define('RUTA2',plugin_dir_path(__FILE__));
echo "<br>";

function eliminarTasca()
{
    $Tasca = $_POST["Tasca"];
    require('connexio.php');
    $statement = "DELETE FROM ex1 WHERE tasques = ?";
    $stmt = $connexio->prepare($statement);
    $stmt->execute(array($Tasca));
}

function hacabat(){
        require ('connexio.php');
        $sentenciaSelect = "SELECT acabat FROM ex2 WHERE id = 1";
        $query = $connexio->query($sentenciaSelect);
        while ( $fila = $query->fetch(PDO::FETCH_ASSOC)){
            $arraybasededades[]=$fila;
        }
        if (isset($arraybasededades)){
            return $arraybasededades;
        }
}
function començar(){
        require ('connexio.php');
        $statement = $connexio->prepare("UPDATE ex2
                                            SET inici = current_timestamp, acabat = 0
                                            WHERE id = 1");
        $statement -> execute();
        echo "Començat!!";
}

function acabar(){
        require ('connexio.php');
        $statement = $connexio->prepare("UPDATE ex2
                                            SET final = current_timestamp
                                            WHERE id = 1");
        $statement -> execute();
        echo "Acabat!!";
}

function total(){
    $acabat=1;
    require ('connexio.php');
    $statement = $connexio->prepare("UPDATE ex2
                                            SET total = total+(SELECT TIMEDIFF(final,inici) FROM ex2) , acabat = ?
                                            WHERE id = 1");
    $statement -> execute(array($acabat));
}

function resetejar()
{
    $acabat = 1;
    require('connexio.php');
    $statement = $connexio->prepare("DELETE FROM `ex2` WHERE `ex2`.`id` = 1");
    $statement->execute(array($acabat));
    require('connexio.php');
    $statement = $connexio->prepare("INSERT INTO `ex2` (`id`, `inici`, `final`, `total`, `acabat`) VALUES ('1', current_timestamp(), current_timestamp(), '0', '1')");
    $statement->execute(array($acabat));
    echo "Resetejat!!!";
}

function diferencia(){

    require ('connexio.php');
    $sentenciaSelect = "SELECT TIMEDIFF(final,inici) as diferencia FROM ex2 WHERE id = 1";
    $query = $connexio->query($sentenciaSelect);
    while ( $fila = $query->fetch(PDO::FETCH_ASSOC)){
        $arraybasededades[]=$fila;
    }
    if (isset($arraybasededades)){
        return $arraybasededades;
    }
}

function veuretemps(){
    require ('connexio.php');
    $sentenciaSelect = "SELECT total FROM ex2 WHERE id = 1";
    $query = $connexio->query($sentenciaSelect);
    while ( $fila = $query->fetch(PDO::FETCH_ASSOC)){
        $arraybasededades[]=$fila;
    }
    if (isset($arraybasededades)){
        return $arraybasededades;
    }
}


echo "<br>";
if (isset($_POST["accio"])){
        if ($_POST["accio"] == "Començar") {
            $flag= hacabat();
            if (($flag[0]['acabat']) == 1) {
                començar();
            }
            else{
                echo "Ja esta en marcha!!";
            }
        }
        if ($_POST["accio"] == "Parar i afegir") {
            $flag= hacabat();
            if (($flag[0]['acabat']) == 1){
                echo "<br>"."Has de començar primer!!!";
            }
            else{
                acabar();
                total();
                $differencia=diferencia();
                echo "<br>"."<h3>"."El temps realitzat del projecte són ".$differencia[0]['diferencia']."</h3>";
            }
        }
        if ($_POST["accio"] == "Total temps"){
            $total=veuretemps();
            echo "<br>"."<h2>"."El temps total del projecte són ".$total[0]['total']."</h2>";
        }
        if ($_POST["accio"] == "Resetejar"){
            resetejar();
    }
}
?>
</body>
</html>