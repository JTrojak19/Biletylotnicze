<html>
    <head>
        
    </head>
    <body>
        <h1>Symulator Lotto:</h1>
        <p>Wybierz 6 liczb z zakresu 1-49</p>
        <form action="" method="post">
            <input type="text" name="number1" placeholder="Liczba pierwsza"> <br><br>
            <input type="text" name="number2" placeholder="Liczba druga"> <br> <br>
            <input type="text" name="number3" placeholder="Liczba trzecia"><br><br>
            <input type="text" name="number4" placeholder="Liczba czwarta"><br><br>
            <input type="text" name="number5" placeholder="Liczba piąta"><br><br>
            <input type="text" name="number6" placeholder="Liczba szósta"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $number1 = $_POST['number1']; 
    $number2 = $_POST['number2']; 
    $number3 = $_POST['number3']; 
    $number4 = $_POST['number4']; 
    $number5 = $_POST['number5']; 
    $number6 = $_POST['number6'];
    
    $numbers = [$number1, $number2, $number3, $number4, $number5, $number6]; 
    
    $random1 = random_int(1, 49); 
    $random2 = random_int(1, 49); 
    $random3 = random_int(1, 49); 
    $random4 = random_int(1, 49); 
    $random5 = random_int(1, 49); 
    $random6 = random_int(1, 49); 
    
    $random = [$random1, $random2, $random3, $random4, $random5, $random6]; 
    
    $result = array_intersect($numbers, $random); 
    
    var_dump($numbers); 
    var_dump($random); 
    var_dump($result); 
    
    
    
}
