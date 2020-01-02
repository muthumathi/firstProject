<!DOCTYPE html>
<html lang="en">
<head>
<title>Comments And Variables</title>



</head>

<body>
<h2> Today Date is <?= date('l') ?>   </h2>

<?php
# <h1>Hello </h1>
$a=29;
$b=232;
echo  "The Value Of A Addition B is" . boldOP($a+$b)."<br />";
$name=Muthu ;
echo "Hello <b>" . $name ."</b><br />"; 
$res = ($a > $b);
echo "is".boldOP(var_export($res,true))."<br />";
$today = new DateTime();
echo "Today Date is ". $today->format("d/l/M/Y");




function boldOP ($text){
  return "<b>" .$text . "</b>";

}

?>


</body>
</html>