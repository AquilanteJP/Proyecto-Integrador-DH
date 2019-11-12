<?php
require_once('./loader.php');
$losmg = Consulta::read("posts.like","posts",$db,"posts.id ='".$_POST["meGusta"]."'");
$nuevoMg = $losmg[0]['like'] +1;
 Consulta::update("posts","posts.like",$nuevoMg,$_POST["meGusta"],$db);
 return;
?>
