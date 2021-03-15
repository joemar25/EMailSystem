<?php
  $con = mysqli_connect("localhost", "root", "1234", "mydatabase");

  if ( mysqli_connect_errno() )
  echo "Failed to connect: " . mysqli_connect_errno();
