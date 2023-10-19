<?php
    echo $_POST["nombre"] ;
    echo "<br>";
    echo $_POST["password"];

if ($_POST["nombre"] == "Juan" && $_POST["password"] == 1234){
    header("Location: ./crud/index.html");
}