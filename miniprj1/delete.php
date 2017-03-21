<?php
function delete(){
    $hostname = "localhost";
    $user = "it58160697";
    $password = "it58160697";
    $dbname = "it58160697";
    $connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
    $db = mysql_select_db($dbname)or die("cannot connect database!");
    $sql = "SELECT * FROM ChatUser";
    $dbquery = mysql_db_query($dbname,$sql);
    $row = mysql_num_rows($dbquery);
    while($result=mysql_fetch_array($dbquery)) {
        if($result[name]==$_SESSION['name']){
            $num[] = $result[id];
        } 
    }
    for($i=0;$i<count($num);$i++){
        $sql = "DELETE FROM ChatUser WHERE id = " .$num[$i];
        $dbquery = mysql_db_query($dbname,$sql);
    }
    //echo "<meta http-equiv='refresh' content=\"1;URL='index.php'\">";
}
?>