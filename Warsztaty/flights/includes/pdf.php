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
}