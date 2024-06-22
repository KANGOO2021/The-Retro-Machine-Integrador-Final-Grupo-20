<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'retro_machine'
) or die(mysqli_error($mysqli));