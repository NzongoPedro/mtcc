<?php

function session_on()
{

    if (!isset($_SESSION['id_admin'])) {

        header("location:./pages-login.php");
    }
}
function session_off()
{

    if (isset($_SESSION['id_admin'])) {

        header("location:" . URL);
    }
}
