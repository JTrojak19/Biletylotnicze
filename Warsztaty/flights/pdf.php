<?php
require_once './vendor/autoload.php';
include "includes/airports.php"; 

use NumberToWords\NumberToWords;

 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($_POST['departure'] == $_POST['arrival'])
    {
        echo "Lotnisko wylotu i przylotu nie mogą być takie same."; 
    }
    else 
    {
        $departure = $_POST['departure']; 
        $arrival = $_POST['arrival']; 
        
        if (isset($departure) && isset($arrival))
        {
            foreach ($airports as $key=>$value)
            {
                foreach ($value as $airport)
                {
                    if ($airport == $departure)
                    {
                        $timezone_departure = $value['timezone']; 
                        $code_departure = $value['code']; 
                    }
                    else 
                    {
                        $timezone_arrival = $value['timezone']; 
                        $code_arrival = $value['code']; 
                    }
                }
            }
        }
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
    $timezone_1 = new DateTimeZone($timezone_departure); 
    $timezone_2 = new DateTimeZone($timezone_arrival); 
    
    $date_departure = new DateTime(); 
    $date_departure->setTimezone($timezone_1); 
    $date_departure->modify($localtime); 
    $date1 = $date_departure->format('d.m.Y H:i:s'); 
    
    $date_arrival = new DateTime(); 
    $date_arrival->setTimezone($timezone_2); 
    $date_arrival->modify($localtime. '+'.$length . "hours"); 
    $date2 = $date_arrival->format('d.m.Y H:i:s'); 
    
    $faker = Faker\Factory::create(); 
    
    $name = $faker->name; 
    
    $numberToWords = new NumberToWords(); 
    $currencyTransformer = $numberToWords->getCurrencyTransformer('pl'); 
    $price_words = $currencyTransformer->toWords($price*100, 'PLN'); 
}

$output="
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <table>
            <tr>
                <td>Imię i nazwisko pasażera:</td>
                <?php
                echo '<tr>
                    <td>$name</td>
                </tr>'
                ?>
            </tr>
            <tr>
            <td colspan='2'>Lotnisko wylotu:</td>
            <td colspan='4'>Lotnisko przylotu:</td>
            </tr>
            <?php
            echo '<tr>
                <td>$departure</td>
                <td>$date1</td>
                <td>$code_departure</td>
                <td>$arrival</td>
                <td>$date2</td>
                <td>$code_arrival</td>
             </tr>'
            ;?>
            <tr>
            <td>Czas lotu:</td>
            <td>Cena lotu:</td>
            <td>Cena lotu słownie:</td>
            </tr>
            <?php
            '<tr>
                <td>$length</td>
                <td>$price</td>
                <td>$price_words</td>
             </tr>'
            ?>
        </table>
    </body>
</html>";

echo $output; 

$mpdf = new mPDF(); 
$mpdf->WriteHTML($output); 
$mpdf->Output('ticket.pdf', 'D'); 
?>