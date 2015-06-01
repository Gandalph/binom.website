<?php

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug PHP: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug PHP: " . $data . "' );</script>";

    echo $output;
}

?>
