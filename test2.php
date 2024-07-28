<?php

$file = file_get_contents('test.php');
echo base64_encode($file);