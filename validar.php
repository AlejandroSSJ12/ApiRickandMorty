<?php
// echo $numRandom = rand(1,826);
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/character/?page=25");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// $data = curl_exec($ch);
// curl_close($ch);
// $datos = json_decode($data);
// $personajes = $datos->results;

// foreach ($personajes as $personaje) {
//     echo "<center>";
//     echo "<br>";
//     echo "<h2>$personaje->name</h2>";
//     echo "<h3> Id: $personaje->id</h3>";
//     echo "<img src='$personaje->image'><br>";
//     echo "<h3>$personaje->status</h3>";
//     echo "<a href=$personaje->url target= 'blank'>Informacion del personaje<a/>";
//     echo "</center>";
// }
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/?page=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
$datos = json_decode($data);
$chapters = $datos->results;

foreach ($chapters as $chapter) {
    echo "<center>";
    echo "<br>";
    echo "<h2>$chapter->name</h2>";
    echo "<h3> Id: $chapter->episode</h3>";
    echo "<h3>$chapter->air_date<h3><br>";
    echo "</center>";
}
?>