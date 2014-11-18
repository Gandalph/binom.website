<?php

/**
 *  Uspostavljanje konekcije sa bazom
 */
function connect() {
    global $link;
    $link = mysqli_connect("localhost", "root", "", "wordpress");
}

/**
 * Zatvaranje konekcije sa bazom
 */
function disconnect() {
    global $link;
    mysqli_close($link);
}

?>