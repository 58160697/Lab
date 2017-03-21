<html>
    <head>
        <meta charset = "utf-8">
        <style>
            td{
                text-align: center 
            }
        </style>
    </head>
    <body>
        <?php
                    $hostname = "localhost";
                    $user = "it58160697";
                    $password = "it58160697";
                    $dbname = "it58160697";
                    $connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
                    mysql_query( "SET NAMES UTF8" );
                    mysql_query("SET character_set_results=utf8");
                    mysql_query("SET character_set_client=utf8");
                    mysql_query("SET character_set_connection=utf8");
                    $db = mysql_select_db($dbname)or die("cannot connect database!");
                    $sql = "SELECT * FROM register_form natural join provinces where register_form.PROVINCE_ID = provinces.PROVINCE_ID";
                    $dbquery = mysql_db_query($dbname,$sql);
                    $row = mysql_num_rows($dbquery);?>
                    <center><table border="1px">
                        <tr><center>
                            <td>#</td>
                            <td>ชื่อสกุล</td>
                            <td>อีเมลล์</td>
                            <td>เพศ</td>
                            <td>ความสนใน</td>
                            <td>ที่อยู่</td>
                            <td>จังหวัด</td></cener>
                        </tr>
                        <?php while($result = mysql_fetch_array($dbquery)) {?>
                        <tr id="tr">
                            <td><?php echo $result["id"]; ?></td>
                            <td><?php echo $result["name"]; ?></td>
                            <td><?php echo $result["email"]; ?></td>
                            <td><?php 
                                if($result["sex"]=="M"){
                                    echo "ชาย";
                                }else{
                                    echo "หญิง";
                                }
                            ?>
                            </td>
                            <td>
                            <?php 
                                if($result["interest1"]=="on"){
                                    echo "เรียน";
                                    if($result["interest2"]=="on"){
                                        echo "<br>";
                                    }
                                }
                                if($result["interest2"]=="on"){
                                    echo "เกมส์";
                                }?>
                            </td>
                            <td><?php echo $result["address"]; ?></td>
                            <td><?php echo $result["PROVINCE_NAME"]; ?></td>
                        </tr>
                    <?php } ?>
                    </table></center>
                    <?php mysql_close($connect);?>
    </body>
</html>