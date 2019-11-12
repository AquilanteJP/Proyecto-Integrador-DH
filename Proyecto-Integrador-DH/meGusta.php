<?php
require_once('./loader.php');
$losmg = Consulta::read("posts.like","posts",$db,"posts.id ='".$_POST["meGusta"]."'");
//var_dump($losmg[0]['like']);
$nuevoMg = $losmg[0]['like'] +1;
//var_dump($nuevoMg);
//exit;
 Consulta::update("posts","posts.like",$nuevoMg,$_POST["meGusta"],$db);
 header("location:inicio.php");
?>
