<?php
$counter = 1; 

if(!isset($_COOKIE['visits']))
{
    echo "Witaj pierwszy raz na naszej stronie!"; 
    setcookie("visits",$counter, time()+ 31556926); 

}
else 
{
    $visits = $_COOKIE['visits']; 
    $visits++; 
    setcookie('visits', $visits); 
    echo "Witaj, odwiedziłeś nas już " . $visits . " razy"; 
}