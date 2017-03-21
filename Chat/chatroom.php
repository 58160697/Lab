<?php
if ($_POST[mes] <>"")
{
$hostname="localhost";
$user="it58160697";
$password="it58160697";
$dbname="it58160697";
$connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
$db = mysql_select_db($dbname)or die("cannot connect database!");
$sql="INSERT INTO chatroom (mes) VALUES ('$_POST[mes]');";
$dbquery=mysql_db_query($dbname,$sql);
}
$name = $_POST["name"];
?>
<html>
<head>
<META HTTP-EQUIV="REFRESH" CONTENT="10"> 
<meta charset="UTF-8">
<? //<META HTTP-EQUIV="REFRESH" CONTENT="5">REFRESH ทุก 5 วินาที ?>
<title>Untitled Document</title>
</head>

<body>
<table width="70%" border="0" cellspacing="0" cellpadding="0">
<tr>
<th bgcolor="f2f2f2" scope="row"><form name="form2" method="post" action="<?=$PHP_SELF;?>">
<label>
<div align="left">
<?
$hostname = "localhost";
$user = "it58160697";
$password = "it58160697";
$dbname = "it58160697";//ชื่อฐานข้อมูล
$connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
$db = mysql_select_db($dbname)or die("cannot connect database!");
$sql = "select * from chatroom order by id DESC";//เรียกข้อมูล
$dbquery = mysql_db_query($dbname,$sql);
$row = mysql_num_rows($dbquery);
while($result=mysql_fetch_array($dbquery)) {
        $a[] = $result[mes]; //เก็บช้อความ 10 อันดับล่าสุดลงตัวแปร 
}

for($i=count($a)-1;$i>=0;$i--) {
    echo $a[$i]."<br>";
}
?>
</div>
</label>
</form> </th>
</tr>
<tr>
<th scope="row"><form name="form1" method="post" action="">
<table width="50%" border="1" cellspacing="0" cellpadding="0">
<tr>
<th scope="row"><font size="2">ชื่อ : <?php echo $name;?>พิมพ์ข้อความที่นี่ </font></th>
<td><label>
<div align="center">
<input name="mes" type="text" id="mes" size="60"></input>
</div>
</label></td>
<td><label>
<input name="Submit" type="submit" id="Submit" value="Send">
</label></td>
</tr>
</table>
</form> </th>
</tr>
</table>
</body>
</html>