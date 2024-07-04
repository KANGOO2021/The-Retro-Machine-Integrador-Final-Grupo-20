<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'retro_machine'
) or die(mysqli_error($mysqli));


/*
session_start();

$conn = mysqli_connect(
  'localhost',
  'id22382915_root',
  'Mateo2024.',
  'id22382915_retro_machine'
) or die(mysqli_error($mysqli));?>*/