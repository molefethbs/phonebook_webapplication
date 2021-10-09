<?php
    
    function randomKey($length) {
        $char = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
        $key ="";
        for($i=0; $i < $length; $i++) {
            $key .= $char[mt_rand(0, count($char) - 1)];
        }
        return $key;
    }

?>