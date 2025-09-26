<?php

function calcule($a, $operation, $b) {
    switch ($operation) {
        case "+";
            return $a + $b;

        case "-"; 
            return $a - $b;
            
        case "*";
            return $a * $b; 
        case "/";
            return $a / $b; 
            
        default:
            return "Opération inconnue";    
    }
}

echo calcule(7, "+", 15);
echo "<br>";
echo calcule(4, "*", 4);
echo "<br>";
echo calcule(100, "-", 45);
echo "<br>";
echo calcule(20, "/", 2);

?>