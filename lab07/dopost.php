<?php
echo "<h3>View posted data:<h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<hr>";
echo "<h3>View individual data:<h3>";
echo $_POST['name'] . "<br />";
echo $_POST['email'] . "<br />";
echo $_POST['address'] . "<br />";
    $hostname = "localhost";
    $user = "it58160697";
    $password = "it58160697";
    $dbname = "it58160697";
    $connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
    mysql_query( "SET NAMES UTF8" );
    $db = mysql_select_db($dbname)or die("cannot connect database!");
    $sql = "INSERT INTO register_form(name,email,sex,interest1,interest2,address,province) VALUES(
		'".$_POST['name'].
		"','".$_POST['email'].
		"','".$_POST['sex'].
        "','".$_POST['intr1'].
        "','".$_POST['intr2'].
        "','".$_POST['address'].
        "','".$_POST['province']."')";
    //$dbquery=mysql_db_query($dbname,$sql);
    if(mysql_db_query($dbname,$sql)){
				//echo "Insert data to Driver successfully.";
				return true;
			}else{
				//echo "Can't insert data to Driver";
				return false;
			}
    mysql_close($connect);
?>
