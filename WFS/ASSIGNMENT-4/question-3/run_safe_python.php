<?php

$command = escapeshellcmd("python script.py");

$output = shell_exec($command);

echo $output;
