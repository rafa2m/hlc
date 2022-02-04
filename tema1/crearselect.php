<?php
    echo htmlspecialchars('<select name="operacion>"');
    for($i=0;$i<10;$i++)
        echo htmlspecialchars('<option value=$i>$i</option>');    
    echo htmlspecialchars('</select>');
?>