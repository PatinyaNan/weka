<?php
//$cmd = 'java -classpath "weka.jar" weka.classifiers.trees.J48 -t "glass.arff"';
//$cmd = 'java -classpath "weka.jar" weka.classifiers.lazy.IBk -K 3 -t "glass.arff"';
//$cmd = 'java -classpath "weka.jar" weka.classifiers.bayes.NaiveBayes -t "glass.arff"';
$cmd = 'java -classpath "weka.jar" weka.classifiers.trees.J48 -t "balance-scale.arff" -d "balance1.model" -x 5';
exec($cmd,$output);
exec($cmd,$output);
for ($i=0;$i<sizeof($output);$i++)
{
  trim($output[$i]);
  echo $output[$i]."<br>";
}

// show load model
$cmd = 'java -classpath "weka.jar" weka.classifiers.trees.J48 -T "balance_unseen.arff" -l "balance1.model" -p 5';
// show output prediction
exec($cmd,$output);
for ($i=0;$i<sizeof($output);$i++)
{
trim($output[$i]);
echo $output[$i]."<br>";
}
?>
