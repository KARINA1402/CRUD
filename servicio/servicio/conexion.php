<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'turismo'
) or die(mysqli_erro($mysqli));

?>
