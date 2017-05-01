<?php
require_once './vendor/autoload.php';
include "includes/airports.php"; 


if ($_SERVER['REQUEST METHOD'] == 'POST')
{
    if ($_POST['departure'] == $_POST['arrival'])
    {
        echo "Lotnisko wylotu i przylotu nie mogą być takie same."; 
    }
    else 
    {
        $departure = $airports[$_POST['departure']['name']]; 
        $arrival = $airports[$_POST['arrival']['name']]; 
    }
    
    if (!isset($_POST['localdeparturetime']) && !isset($_POST['length']))
    {
        echo "Podaj datę i czas."; 
    }
    else 
    {
        $localtime = $_POST['localdeparturetime']; 
        $length = $_POST['length']; 
    }
    
    if ($_POST['price'] < 0)
    {
        echo "Cena musi być większa od zera."; 
    }
    else 
    {
        $price = $_POST['price']; 
    }
    $timezone_departure = new DateTimeZone($airports['departure']['timezone']); 
    $timezone_arrival = new DateTimeZone($airports['arrival']['timezone']); 
    
    $code_departure = $airports[$_POST['departure']['code']]; 
    $code_arrival = $airports[$_POST['arrival']['code']]; 
    
    $date_departure = new DateTime(); 
    $date_departure->setTimezone($timezone_departure); 
    $date_departure->modify($localtime); 
    $date1 = $date_departure->format('d.m.Y H:i:s'); 
    
    $date_arrival = new DateTime(); 
    $date_arrival->setTimezone($timezone_arrival); 
    $date_arrival->modify($localtime. '+'.$length . "hours"); 
    $date2 = $date_arrival->format('d.m.Y H:i:s'); 
    
    $faker = Faker\Factory::create(); 
    
    $name = $faker->name; 
}

?>
<html>
    <head>
        
    </head>
    <body>
        <table>
            <tr>
                <th colspan='3'>Imię i nazwisko pasażera:</th>
                <?php
                echo '<tr>
                    <td>'.$name.'</td>
                </tr>'
                ?>
            </tr>
            <tr>
            <th colspan="3">Lotnisko wylotu:</th>
            <th colspan="3">Lotnisko przylotu:</th>
            </tr>
            <?php
            echo '<tr>
                <td>'.$departure.'</td>
                <td>'.$date1.'</td>
                <td>'.$code_departure.'</td>
                <td>'.$arrival.'</td>
                <td>'.$date2.'</td>
                <td>'.$code_arrival.'</td>
             </tr>'
            ;?>
            <th colspan='3'>Czas lotu:</th>
            <th colspan='2'>Cena lotu:</th>
            <?php
            '<tr>
                <td>'.$length.'</td>
                <td>'.$price.'</td>
             </tr>'
            ?>
        </table>
    </body>
</html>