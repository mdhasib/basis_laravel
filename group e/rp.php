<?php
function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}

$password = generate_password(rand(5,25));
echo $password, "<br>";
function generateStrongPassword($length=9, $add_dashes = false, $available_sets = 'luds'){
	$sets = array();
	if (strpos($available_sets, 'l') !==false) {
		$sets[]='abcdefghjkmnpqrstuvwxyz';
	}
	if (strpos($available_sets, 'u') !==false) {
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	}
	if (strpos($available_sets, 'd') !== false) {
		$sets[] = '23456789';
	}
	if (strpos($available_sets, 's') !==false) {
		$sets[] = '!@#$%&*?';
	}
	$all='';
	$password='';
	foreach ($sets as $key => $value) {
		$password .= $value[array_rand(str_split($value))];
		$all .=$value;
	}
	$all = str_split($all);
	for ($i=0; $i < $length - count($sets); $i++) { 
		$password .=$all[array_rand($all)];
	}
		$password = str_shuffle($password);
		if(!$add_dashes)
		return $password;
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($password) > $dash_len)
		{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
		}
		$dash_str .= $password;
		return $dash_str; 
}
$password1 = generateStrongPassword();
echo $password1;

// -------------------------------------------------------------------------
/*$list = array(
	array('a','b', 'c'),
	array('1', '2', '3'),
	array('"aaa"', '"bbb"')
	);

$fp = fopen('arif.csv', 'w')
	foreach ($list as $key => $value) {
		fputcsv($fp, $value);
	}
	
fclose($fp);*/

$list = array (
    array($password1),
    array($password),
    array('"aaa"', '"bbb"')
);

$fp = fopen('file.csv', 'a');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
// ---------------------------------------------------------
fclose($fp);
$myfile = "file.csv"; 
if (!isset($_POST['submit'])) {
$f = fopen($myfile, 'r');
echo "<table>";
while (($line = fgetcsv($f)) !== false) {
    echo "<tr>";
    foreach ($line as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>\n";
}
fclose($f);
echo "\n</table>";
echo "
<form action='' method='POST'>
<table border='1'>
    <tr>
        <td><input name='var1' type='text'></td>
        <td>MMR</td>
    </tr>
    <tr>
        <td><input name='var2' type='text'></td>
        <td>FIVE_IN_ONE</td>
    </tr>
    <tr>
        <td><input name='var3' type='text'></td>
        <td>BOOSTER</td>
    </tr>
    <tr>
        <td><input name='var4' type='text'></td>
        <td>MENC</td>
    </tr>
</table>
<input name='submit' type='submit' value='Submit'>
</form>";
} else {
    $text1 = $_POST['var1'];
    $text2 = $_POST['var2'];
    $text3 = $_POST['var3'];
    $text4 = $_POST['var4'];

    $fh = fopen($myfile, 'a');
    fwrite($fh, $text1 . "\r\n" . $text2 . "\r\n" . $text3 . "\r\n" . $text4);
    fclose($fh);

    echo $text1 . "<br>" . $text2 . "<br>" . $text3 . "<br>" . $text4; 
}