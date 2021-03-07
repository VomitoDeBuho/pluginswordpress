<html>
<head>
    <meta charset="utf-8" />
    <title>Excercici 1</title>
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
<h1>Tasques Principals!!!</h1>
<form action="<?php RUTA . 'indexPlugin.php'?>", method="POST">
    <label>Tasca: </label><input type="text", name="Tasca"/><br>
    <input type="submit" name="accio" value="Afegir">
    <input type="submit" name="accio" value="Realitzada">
    <input type="submit" name="accio" value="Veure les coses pendents">
</form>
<?php
define('RUTA',plugin_dir_path(__FILE__));
echo "<br>";

function contingutbasedades(){
    require ('connexio.php');
    $sentenciaSelect = "SELECT * FROM ex1";
    $query = $connexio->query($sentenciaSelect);
    while ( $fila = $query->fetch(PDO::FETCH_ASSOC)){
        $arraybasededades[]=$fila;
    }
    if (isset($arraybasededades)){
        return $arraybasededades;
    }
}
function mostrarllista(&$llista){
    if (isset($llista[0]['tasques'])){
        foreach ( $llista as $key => $var ) {
            echo "<br>"."<br>"."Tasca nº ".($key+1).":"."<br>";
            echo "<ul>";
            echo "<li>".$var['tasques']."</li>";
            echo "</ul>";
        }
    }
    else {
        echo "<br>" . "No hi han tasques, felicitats!";
    }
}

function eliminarTasca()
{
    $Tasca = $_POST["Tasca"];
    require('connexio.php');
    $statement = "DELETE FROM ex1 WHERE tasques = ?";
    $stmt = $connexio->prepare($statement);
    $stmt->execute(array($Tasca));
}

function afegirTasca14(){
        $tasca=$_POST["Tasca"];
        require ('connexio.php');
        $statement = $connexio->prepare("INSERT INTO ex1(tasques) VALUES (?)");
        $statement -> execute(array($tasca));

}
echo "<br>";
if (isset($_POST["accio"])){
    if (isset($_POST["Tasca"])) {
        if ($_POST["accio"] == "Afegir") {
            if (!empty($_POST['Tasca'])){
                afegirTasca14();
                $llista=contingutbasedades();
                mostrarllista($llista);
            }
            else{
                echo "<br>"."Has d'introduir alguna tasca";
            }
        }
        if ($_POST["accio"] == "Realitzada") {
            if (!empty($_POST['Tasca'])) {
                eliminarTasca();
                $llista = contingutbasedades();
                mostrarllista($llista);
            }
            else{
                echo "<br>"."Has d'introduir alguna tasca";
            }
        }
        if ($_POST["accio"] == "Veure les coses pendents") {
            $llista =contingutbasedades();
            mostrarllista($llista);
        }
    }
}
?>
</body>
</html>