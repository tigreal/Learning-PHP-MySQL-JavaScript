<?php
// pasar los argumentos por referencia, es acceder al valor de los parametros sin necesitdad de pasarlos por la funcion directamente, para  acceder alos valores de los parametros por referencia se debe colar frente a ellos el simbolo de & .

 $a1= "WILLIAM";
 $a2="henry";
 $a3="gatES";

 echo $a1. " ".$a2." ".$a3."<br>";
 fix_names($a1,$a2,$a3);
 echo $a1. " ".$a2." ".$a3."<br>";

function fix_names(&$n1,&$n2,&$n3)
{
    // accedimos al valor de la variable a1, pero por referencia en n1,  cambimos los valores en n1, pero se refleja los cambios en la variable a1, sin averla mandado directamente  ni delverla directamente.
    $n1= ucfirst(strtolower($n1));
    $n2=ucfirst(strtolower($n2));
    $n3=ucfirst(strtolower($n2));

}

?>