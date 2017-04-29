<?php
if ($_SERVER['REQUEST METHOD'] == 'POST')
{
    if ($_POST['departure'] == $_POST['arrival'])
    {
        echo "Lotnisko wylotu i przylotu nie mogą być takie same."; 
    }
    else 
    {
        $departure = $_POST['departure']; 
        $arrival = $_POST['arrival']; 
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
}