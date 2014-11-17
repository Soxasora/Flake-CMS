<?php

// Warnings
if($_SESSION['error']=="1"){
echo '<p><div class="attention"><center><br>Invalid Name. (Chose another)<br><br></center></div><p>
';}
else if($_SESSION['error']=="2"){
echo '<p><div class="attention"><center><br>Check all boxes.<br><br></center></div><p>
';}
else if($_SESSION['error']=="3"){
echo '<p><div class="attention"><center><br>Registered Name. (Choose another)<br><br></center></div><p>
';}
else if($_SESSION['error']=="4"){
echo '<p><div class="attention"><center><br>Passwords aren't same<br><br></center></div><p>
';}
else if($_SESSION['error']=="5"){
echo '<p><div class="attention"><center><br>Registered email. (choose another)<br><br></center></div><p>
';}

// Destroy Error Session
unset($_SESSION['error']);
?>