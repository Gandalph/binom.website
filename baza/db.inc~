<?php

/**
 *  Uspostavljanje konekcije sa bazom
 */
function connect() {
    global $link;
    $link = mysqli_connect("localhost", "root", "multitouch", "wordpress");
    mysqli_query($link, "SET NAMES UTF8");
}

/**
 * Zatvaranje konekcije sa bazom
 */
function disconnect() {
    global $link;
    mysqli_close($link);
}

?>
