<?php
    $num1=12;
    $num2=3;
    $num3=5;
    $x=1;
    echo($num1%$num3*$num3),"<br>";
    echo($num1%$num2*$num3),"<br>";
    $z=$x++;
    echo $z, "<br>";
    echo $x, "<br>";
    $z=++$x;
    echo $z;
?>
<br>
<?php

// --------------------
// foo() will never get called as those operators are short-circuit

$a = (false && foo());
$b = (true  || foo());
$c = (false and foo());
$d = (true  or  foo());

// --------------------
// "||" has a greater precedence than "or"

// The result of the expression (false || true) is assigned to $e
// Acts like: ($e = (false || true))
$e = false || true;

// The constant false is assigned to $f and then true is ignored
// Acts like: (($f = false) or true)
$f = false or true;

var_dump($e, $f);

// --------------------
// "&&" has a greater precedence than "and"

// The result of the expression (true && false) is assigned to $g
// Acts like: ($g = (true && false))
$g = true && false;

// The constant true is assigned to $h and then false is ignored
// Acts like: (($h = true) and false)
$h = true and false;
echo "<pre>";
var_dump($g, $h);
echo"</pre>";
?>
<?php
    for($i=0; $i<=19; $i++){
        echo "hello World <br>";
        echo "$i <br>";
    }
?>
<?php
    for($i=65; $i>0; $i--){
        for($z=1; $z<=$i; $z++){
            echo"$z ";
        }
        echo"<br>";
    }
?>