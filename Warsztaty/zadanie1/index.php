<html>
    <head>
        
    </head>
    <body>
        <h1>Podaj swoje imię: </h1>
        <form action='' method="post">
            <input type='text' name="imie" placeholder="Twoje imię">
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['imie']; 
    echo "Cześć ". $name; 
}
