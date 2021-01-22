<?php

$file = $_POST['fileName'];

$readFile = file_get_contents('./' . $file , true);

echo $readFile;
