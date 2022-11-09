<?php
require("header.php");
$contador = 0;
$capitulos = curl_init();
curl_setopt($capitulos, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/1");
curl_setopt($capitulos, CURLOPT_RETURNTRANSFER, TRUE);
$Respuesta = curl_exec($capitulos);
curl_close($capitulos);
$capitulo = json_decode($Respuesta, TRUE);
echo '<center><H1><u>Episodio 1 ' . $capitulo['name'] . '</u></H1></center>';
echo '<br><center><H1><u>Personajes principales </u></H1></center>';
echo "<container class='recommendations-characters'>";
foreach ($capitulo['characters'] as $personajes) {
    $personaje = curl_init();
    curl_setopt($personaje, CURLOPT_URL, $personajes);
    curl_setopt($personaje, CURLOPT_RETURNTRANSFER, TRUE);
    $Respuesta = curl_exec($personaje);
    curl_close($personaje);
    $person = json_decode($Respuesta, TRUE);
    $location = $person['location'];
    $origin = $person['origin'];
    if ($person['status'] == "Alive") {
        $person['status'] = "Vivo";
    } else {
        $person['status'] = "Muerto";
    }
    if ($person['gender'] == "Male") {
        $person['gender'] = "Masculino";
    } else {
        $person['gender'] = "Femenino";
    }

    echo '
    <div class="characters_card border border-dark">
        <div class="characters_Inf">
            <img class="Tarjeta_Img" src="' . $person['image'] . '">
        </div>
        <div class="personaje-info">
            <h3><u>Personaje: ' . $person['name'] . '<u/></h3>
            <h3>Especie: ' . $person['species'] . '</h3>
            <h3>Status: ' . $person['status'] . '</h3>
            <h3>Genero: ' . $person['gender'] . '</h3>
            <h3>Location: ' . $location['name'] . '</h3>
            <h3>Origen: ' . $origin['name'] . '</h3>
        </div>
    </div> ';
    $contador += 1;
    if ($contador == 2) {
        echo "</container>";
        echo "<br></br>";
        $contador = 0;
        echo "<container class='recommendations-characters'>";
    }
}

require("footer.php");

?>