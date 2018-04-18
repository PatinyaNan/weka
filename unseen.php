<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table width=90% style="border:3px dashed #005483;" cellspacing="5" bgcolor=" #005483" cellpadding="5">
      <tr>
        <td >
          <div style="border: 3px dashed #33FF00;background-color:#CCFF66">
            <form action="#" method="post"><br>
               <center>Value1: <input type="text" name="name1" style="border-radius:10px;"><br><br></center>
               <center>Value2: <input type="text" name="name2" style="border-radius:10px;"><br><br></center>
               <center>Value3: <input type="text" name="name3" style="border-radius:10px;"><br><br></center>
               <center>Value4: <input type="text" name="name4" style="border-radius:10px;"><br><br></center>
               <br>
               <center><input type="submit" value = "ส่งข้อมูล" ></center>
            </form>
            <br>
          </div>
        </td>
      </tr>
    </table>

    <?php
      $value1 = $_POST["name1"];
      $value2 = $_POST["name2"];
      $value3 = $_POST["name3"];
      $value4 = $_POST["name4"];

      /*echo $value1;
      echo $value2;
      echo $value3;
      echo $value4;*/
     ?>
    <?
    $data = array ('left-weight,left-distance,right-weight,right-distance,class',
    '5,1,3,2,L',
    '4,2,3,1,B',
    '3,5,2,1,R',
    $value1.','.$value2.','.$value3.','.$value4.',?');
    $fp = fopen('balance_csv.csv', 'w');
    foreach($data as $line){
      $val = explode(",",$line);
      fputcsv($fp, $val);
    }
    fclose($fp);
    // save file csv to arff-file
    // -L last set last attribute is a normial value
    $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader -N "last" balance_csv.csv > balance_unseen_test.arff ';
    exec($cmd,$output);
    // run unseen data -p 5 is class attribute
    $cmd1 = 'java -classpath "weka.jar" weka.classifiers.trees.J48 -T "balance_unseen_test.arff" -l "balance1.model" -p 5'; // show output prediction
    exec($cmd1,$output1);
    for ($i=0;$i<sizeof($output1);$i++)
    {
      trim($output1[$i]);
      //echo $i." ".$output1[$i]."<br>";
      //  $last = $i;
      //echo $last;
    }
    $last = sizeof($output1)
    ?>
    <table width=90% cellpadding="4" cellspacing="0" style="border:double 5px hotpink;">
      <tr>
        <td style="border:double 5px hotpink;" background =http://www.yenta4.com/webboard/upload_images/81631_688240.gif>
          ข้อมูลที่คุณป้อนของคุณคือ <?php echo " ".$value1." ".$value2." ".$value3." ".$value4."<br>"; ?>
          ผลลัพธ์ที่ได้จาการทำนายคือ : <?php echo $output1[$last-2];?>
        </td>
      </tr>
    </table>

  </body>
</html>
