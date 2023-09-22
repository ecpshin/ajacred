<?php
defined('BASEPATH') or exit('No Direct script access allowed!');

function numberConverter($number) {
    $number = str_replace('R$ ', '', $number);
    return str_replace(',', '.', str_replace('.', '', $number));
}
function formatar_numero($numero)
{
    return number_format($numero, 2, ",", ".");
}
function formata_data($data)
{
    return date('d/m/Y', strtotime($data));
}

