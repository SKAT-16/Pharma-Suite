<?php
  $conn = mysqli_connect("localhost","root","") or die("Connection Failed: ".mysqli_connect_error());
  mysqli_select_db($conn, "pharmacy_inventory");
?>