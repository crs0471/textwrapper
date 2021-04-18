<?php

function init($text,$cap="",$newline="",$upper="",$lower="")
{
    $result = $text;
    if ($cap == 'on') {
        $exploded = explode(".",$result);
        $re = "";
        for ($i=0; $i < count($exploded)-1; $i++) { 
            $re = $re . ucfirst(trim($exploded[$i])) .". ";
        }
        $result = $re;
    }
    if ($newline == 'on') {
        $exploded = explode(".",$result);
        $re = "";
        for ($i=0; $i < count($exploded)-1; $i++) { 
            $re = $re.$exploded[$i].".<br>";
        }
        $result = $re;
    }
    if ($upper=='on') {
        $re = strtoupper($result);
        $result = $re; 
    }
    if ($lower=='on') {
        $re = strtolower($result);
        $result = $re; 
    }
    
    return $result;
}
?>