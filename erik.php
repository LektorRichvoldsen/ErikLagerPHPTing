<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
		//Tilkoblingsinformasjon
			$tjener = "localhost";
			$brukernavn = "root";
			$passord = "root";
			$database = "telefondb";

            //Opprette kobling
$kobling = new mysqli($tjener, $brukernavn, $passord, $database);

//Sjekk om kobling virker
if ($kobling->connect_error) {
    die("Noe gikk galt: " . $kobling->connect_error);
}

//Angi UTF-8 som tegnsett
$kobling->set_charset("utf8");

$sql = "SELECT * FROM telefonkatalog";

$resultat = $kobling->query($sql);

if (!$resultat) {
    echo "Noe gikk galt med spørringen $sql ($kobling->error).";
} else {
    echo '<table><tr><th>Navn</th><th>Score</th></tr>';
    
    while ($rad = $resultat->fetch_assoc()) {
        $fnavn = $rad["fornavn"];
        $enavn = $rad["etternavn"];
        $tlf = $rad["telefonnummer"];
        echo '<tr><td>' . $fnavn . '</td><td>' . $enavn . '</td><td>' . $tlf . '</td></tr>';
    }
    echo '</table>';
}
    ?>




    <h1>Dette er php</h1>
</body>
</html>