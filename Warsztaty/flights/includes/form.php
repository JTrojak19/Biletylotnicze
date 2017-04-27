<html>
    <head>
        
    </head>
    <body>
        <form action="pdf.php" method="post">
            <select name="departure">
                <option>
                    Lotnisko wylotu: 
                </option>
                <?php
                include "airports.php"; 
                for ($i = 0; $i < count($airports); $i++)   
                {
                    echo "<option>" . $airports[$i]['name'] . "</option>"; 
                }
                ?>
            </select>
        </form>
    </body>
</html>