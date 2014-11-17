<?php

// Initialize Session Messages
if($_SESSION['login_error']=="1"){
echo '<p><div class="attention"><center><br>Check all boxes.<br><br></center></div><p>
';}
else if($_SESSION['login_error']=="2"){
echo '<p><div class="attention"><center><br>Invalid email. (Choose another)<br><br></center></div><p>
';}
else if($_SESSION['login_error']=="3"){
echo '<p><div class="attention"><center><br>Invalid Password. (choose another)<br><br></center></div><p>
';}

// Destroy Error Session
unset($_SESSION['login_error']);
?>