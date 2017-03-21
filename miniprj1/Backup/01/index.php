<?php
session_start (); 
function loginForm() {
    echo '
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Please enter your name and your e-mail to continue:</p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <br><label for="e-mail">E-mail:</label>
        <input type="email" name="e-mail" id="name" />
        <br><input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $fp = fopen ( "log.html", 'a' );
        fwrite ( $fp, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat session.</i><br></div>" );
        fclose ( $fp );
    } else {
        echo '<span class="error">Please type in a name</span>';
    }
    if ($_POST["name"] <>""){
        $hostname="localhost";
        $user="it58160697";
        $password="it58160697";
        $dbname="it58160697";
        $connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
        $db = mysql_select_db($dbname)or die("cannot connect database!");
        $sql="INSERT INTO ChatUser (name) VALUES ('$_POST[name]');";
        $dbquery=mysql_db_query($dbname,$sql);
    }
        $name = $_POST["name"];
    }

if (isset ( $_GET ['logout'] )) {
    
    
    $fp = fopen ( "log.html", 'a' );
    fwrite ( $fp, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>" );
    fclose ( $fp );
    
    session_destroy ();
    header ( "Location: index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
<title>Chat</title>
</head>
<body>
    <?php
    if (! isset ( $_SESSION ['name'] )) {
        loginForm ();
    } else {
        ?>
<div id="wrapper">
        <div id="menu">
            <p class="welcome">
                Welcome, <b><?php echo "*".$_SESSION['name']."*"; ?></b>
            </p>
            <p class="logout">
                <a id="exit" href="#">Exit Chat</a>
            </p>
            <div style="clear: both"></div>
        </div>
        <table align="center">
            <tr>
            <td> <div id="userbox">
                <?php
                    $hostname = "localhost";
                    $user = "it58160697";
                    $password = "it58160697";
                    $dbname = "it58160697";
                    $connect = mysql_connect($hostname,$user,$password) or die("cannot connect");
                    $db = mysql_select_db($dbname)or die("cannot connect database!");
                    $sql = "SELECT DISTINCT name FROM ChatUser";
                    $dbquery = mysql_db_query($dbname,$sql);
                    $row = mysql_num_rows($dbquery);
                    while($result=mysql_fetch_array($dbquery)) {
                        if($result[name]==$_SESSION['name']){
                            
                        }else{
                            $a[] = $result[name];
                        }  
                    }
                    for($i=count($a)-1;$i>=0;$i--) {
                        echo $a[$i]."<br>";
                    }
                ?>
        </div></td>
            <td><div id="chatbox"><?php
        if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
            $handle = fopen ( "log.html", "r" );
            $contents = fread ( $handle, filesize ( "log.html" ) );
            fclose ( $handle );
            
            echo $contents;
        }
        ?></div></td>
            </tr>
        </table>
        
       

        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" size="63" /> <input
                name="submitmsg" type="submit" id="submitmsg" value="Send" />
        </form>
    </div>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">

$(document).ready(function(){
});


$(document).ready(function(){
    
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true){window.location = 'index.php?logout=true';}
    });
});


$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});              
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});

function loadLog(){     
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; 
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){        
            $("#chatbox").html(html);    
            
                       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; 
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); 
            }               
        },
    });
}

setInterval (loadLog, 2000);
</script>
<?php
    }
    ?>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
</script>
</body>
</html>