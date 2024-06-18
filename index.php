<?php
$default = [
    'parking' => '',
    'vote' => '',
];

$_GET = array_replace($default, $_GET);

$selectOption = $_GET['parking'];
$selectVote = $_GET['vote'];

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:32,height:32/https://www.filepicker.io/api/file/iperH9IBTIalnkREa5pL" rel="icon" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>

<body class='bg-dark text-white text-center'>
    <section class="d-flex container justify-content-center flex-wrap">
        <h1 class="col-12 text-center">Hotels</h1>
        <div class="row">
            <form method="GET" class="form-control d-flex bg-dark mt-3">

                <select name="parking" class="form-control bg-dark me-2 text-white">
                    <option value="showAll" selected>Mostra Tutti</option>
                    <option value="0">Senza Parcheggio</option>
                    <option value="1">Con Parcheggio</option>
                </select>

                <input class="form-control w-25 mx-2 bg-dark text-white" type="number" min="0" max="5" name="vote" value="0">

                <button class="btn btn-primary ms-2" type="submit">Invia</button>

            </form>
        </div>
    </section>
    <section class="d-flex container justify-content-center flex-wrap my-5 border py-5">

        <?php

        foreach ($hotels as $hotel) {
            if ($selectOption == "showAll" && $hotel["vote"] >= $selectVote) {
                echo "<ul class='col-2'>" .
                    $hotel["name"] .
                    "<li>" . " Description: " . $hotel["description"] . "</li>" .
                    "<li>" . " Parking: " . $hotel["parking"] . "</li>" .
                    "<li>" . " Vote: " . $hotel["vote"] .  "</li>" .
                    "<li>" . " Distance To Center: " . $hotel["distance_to_center"] .  "</li>" .
                    "</ul>";
            } elseif ($hotel["parking"] == false && $selectOption == 0 && $hotel["vote"] >= $selectVote) {
                echo "<ul class='col-2'>" .
                    $hotel["name"] .
                    "<li>" . " Description: " . $hotel["description"] . "</li>" .
                    "<li>" . " Parking: No" . "</li>" .
                    "<li>" . " Vote: " . $hotel["vote"] .  "</li>" .
                    "<li>" . " Distance To Center: " . $hotel["distance_to_center"] .  "</li>" .
                    "</ul>";
            } elseif ($hotel["parking"] == true && $selectOption == 1 && $hotel["vote"] >= $selectVote) {
                echo "<ul class='col-2'>" .
                    $hotel["name"] .
                    "<li>" . " Description: " . $hotel["description"] . "</li>" .
                    "<li>" . " Parking: Sì" . "</li>" .
                    "<li>" . " Vote: " . $hotel["vote"] .  "</li>" .
                    "<li>" . " Distance To Center: " . $hotel["distance_to_center"] .  "</li>" .
                    "</ul>";
            } else {
                echo "";
            }
        }
        ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>