<?php
/*(
global $count;
function readCSV($csvFile){
$file_handle = fopen($csvFile, 'r');
while (!feof($file_handle) ) {
$line_of_text[] = fgetcsv($file_handle, 1024);
}
$count = "as";
fclose($file_handle);
return $line_of_text;
}


echo $count;
// Set path to CSV file
$csvFile = './file/csv/file.csv';

//calling the function
$csv = readCSV($csvFile);
if(!empty($csv)){
    foreach($csv as $file){
        //inserting into database 
  }
}else{
   echo 'Csv is empty'; 
}
*/
write_csv(1);
function write_csv($a) {
    $data = array('1119aaa', 'bbb', 'ccc', 'dddd');
    $file_name = "student.csv";
	chmod($file_name, 0777);
	$fp = fopen("./".$file_name , 'a');
    fputcsv($fp, $data);
    fclose($fp);
}
