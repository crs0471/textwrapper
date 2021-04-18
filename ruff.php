<?php

$text = "hello my name is cherish. i am a student.   i am good boy.";
$exploded = explode(".",$text);
$result = "";
for ($i=0; $i < count($exploded)-1; $i++) { 
    $result = $result . ucfirst(trim($exploded[$i])) .". ";
}

echo $result;
?>