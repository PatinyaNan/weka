<?php
  echo exec('whoami');
  echo "<br /><br />";
  echo "********************************************************<br><br>";
 ?>
 <?php
 $cmd = 'dir';
 exec($cmd,$output);
 for ($i=0;$i<sizeof($output);$i++)
 {
 trim($output[$i]);
 echo $output[$i]."<br>";
 }
//echo $i."<bt>";

 ?>
