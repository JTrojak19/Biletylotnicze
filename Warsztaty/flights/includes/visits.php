<?php


if(!isset($_COOKIE['visits']))
{
    setcookie("visits", 1, time()+ 31556926); 
    echo "Witaj pierwszy raz na naszej stronie!"; 
}
else 
{
    $cookie = ++$_COOKIE['visits'];
    echo "Witaj, odwiedziłeś już nas " . $cookie . " razy. "; 
}