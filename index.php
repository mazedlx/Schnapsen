<?php
function dd()
{
    $args = func_get_args();
    call_user_func_array('dump', $args);
    die();
}

require_once('vendor/autoload.php');

$schnapsen = new Schnapsen\Schnapsen();
$schnapsen->mischen()->abheben()->geben();

dd($schnapsen->spielerEins, $schnapsen->spielerZwei);
