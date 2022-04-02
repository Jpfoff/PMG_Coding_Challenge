#!/usr/bin/php
<?php
// loop through each element in the $argv array
$final_array = array();
for($i = 1; $i < $argc; $i++)
{
  array_push($final_array, $argv[$i]);
}
function combine_csv(array $in_files) {
  if(!is_array($in_files)) {
      throw new Exception('$in_files are not an array and they have to be');
  }

  
  $new_csv = array();
  foreach($in_files as $file) {
      $open_file = fopen($file, "r"); //open the file 
    if (($handle = fopen( $file, "r")) !== FALSE) {
      $header_line = fgetcsv($handle, 1000, ","); //get the header of csv
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // get each line of the csv
          $data[] = $file;
          $new_csv[] = $data; // store in the new csv array
      }
    fclose($handle);
    }

}
array_push($header_line,"filename"); // add the new column name 
fputcsv(STDOUT, $header_line); // put the header at the beginning of the new csv
foreach ($new_csv as $line) {
  fputcsv(STDOUT, $line); //send each line of the new csv to STDOUT
}
      fclose($open_file);
      unset($open_file);
  }


combine_csv($final_array) //call the function
?>
