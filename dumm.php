<?php

include "connection.php";

?>
<html>
    <head></head>
    <body>
        <select name="" id="">
            <?php
            $stmt=$conn->prepare('SELECT id from rooms where type="Executive Suite" and status="Empty"');
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {


?>
        <option value=""><?php echo $row['id']  ?></option>
        <?php } ?>
        </select>        
    </body>
</html>