<?php
require("header.php");
for($i=1; $i<51;$i++)
{
    $capitulos = curl_init();
    curl_setopt($capitulos, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/" . ($i + 1));
    curl_setopt($capitulos, CURLOPT_RETURNTRANSFER, TRUE);
    $Respuesta = curl_exec($capitulos);
    curl_close($capitulos);
    $capitulo = json_decode($Respuesta, TRUE);
    echo'<div  class="container">
    <div class="row">
    <div class="col-md-8" align"Center>"
    <form action="Capitulo.php" method="get">
    <h3>◉   Episodio:  '. $capitulo['name'] . ' </h3>
    <br>
    </form></div></div></div>';

}

require("footer.php")

    ?>