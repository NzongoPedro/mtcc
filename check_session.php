<?php

function check_login_off()
{
    if (!isset($_SESSION['id_estudante'])) {
        header("location: ./?view=login");
    }
}

function check_login_on()
{
    if (isset($_SESSION['id_estudante'])) {
        header("location: ./");
    }
}
