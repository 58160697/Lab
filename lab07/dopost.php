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
?>
