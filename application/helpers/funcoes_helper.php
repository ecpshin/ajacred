<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function limpar($string) {
    $table = array('/' => '', '(' => '', ')' => '',);

    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    $string = preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ", "-", $string);
    $string = str_replace("---", "-", $string);

    return $string;
}

function dataAtual() {
    $ano = date('Y');
    $mes = date('m');
    $dia = date('d');
    $diaSemana = date('l');
    $hora = date('H:i:s');

    return diaDaSemana(strtolower($diaSemana)) . ', ' . $dia . ' de ' . mesDoAno($mes) . ' de ' . $ano . ' ' . $hora;
}

function mesDoAno($mes) {

    switch ($mes) {
        case '01':
            return 'janeiro';
        case '02':
            return 'fevereiro';
        case '03':
            return 'março';
        case '04':
            return 'abril';
        case '05':
            return 'maio';
        case '06':
            return 'junho';
        case '07':
            return 'julho';
        case '08':
            return 'agosto';
        case '09':
            return 'setembro';
        case '10':
            return 'outubro';
        case '11':
            return 'novembro';
        default:
            return 'dezembro';
    }
}

function diaDaSemana($dia) {
    switch ($dia) {
        case 'monday':
            return 'segunda-feira';
        case 'tuesday':
            return 'terça-feira';
        case 'wednesday':
            return 'quarta-feira';
        case 'thursday':
            return 'quinta-feira';
        case 'friday':
            return 'sexta-feira';
        case 'saturday':
            return 'sábado';
        default:
            return 'domingo';
    }
}

function saudacao() {
    $segundos = intval(date('s')) + (intval(date('i')) * 60) + (intval(date('H')) * 3600);

    if ($segundos >= 0 && $segundos < 21600) {
        return 'Boa madrugada!';
    } elseif ($segundos >= 21600 && $segundos < 43200) {
        return 'Bom dia!';
    } elseif ($segundos >= 43200 && $segundos < 64800) {
        return 'Boa tarde!';
    } else {
        return 'Boa noite!';
    }
}

function userlevel($level, $logado) {
    if ($logado) {
        switch ($level) {
            case 'ROLE_ADMIN': return TRUE;
            case 'ROLE_USER': return TRUE;
            default: return FALSE;
        }
    } else {
        return FALSE;
    }
}

function menu($nivel) {
    if ($nivel != 'ROLE_USER') {
        return 'backend/templates/admin/sidebar-menu-admin';
    } else {
        return 'backend/templates/user/sidebar-menu-user';
    }
}

function formataData($string) {

    date_default_timezone_set('America/Recife');
    $semana = '';
    $dia_sem = date('w', strtotime($string));

    switch ($dia_sem) {
        case 1: $semana = 'Segunda-feira';
            break;
        case 2: $semana = 'Terça-feira';
            break;
        case 3: $semana = 'Quarta-feira';
            break;
        case 4: $semana = 'Quinta-feira';
            break;
        case 5: $semana = 'Sexta-feira';
            break;
        case 6: $semana = 'Sábado';
            break;
        default: $semana = 'Domingo';
            break;
    }

    $dia = date('d', strtotime($string));
    $mes = '';
    $mes_num = date('m', strtotime($string));

    switch ($mes_num) {
        case 1: $mes = "Janeiro";
            break;
        case 2: $mes = "Fevereiro";
            break;
        case 3: $mes = "Março";
            break;
        case 4: $mes = "Abril";
            break;
        case 5: $mes = "Maio";
            break;
        case 6: $mes = "Junho";
            break;
        case 7: $mes = "Julho";
            break;
        case 8: $mes = "Agosto";
            break;
        case 9: $mes = "Setembro";
            break;
        case 10: $mes = "Outubro";
            break;
        case 11: $mes = "Novembro";
            break;
        default: $mes = "Dezembro";
            break;
    }

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));

    return $semana . ', ' . $dia . ' de ' . $mes . ' de ' . $ano . ' ' . $hora;
}

function getcolor($situacao)
{
    if ($situacao == 1) {
        return 'bg-primary';
    } elseif ($situacao == 2) {
        return 'bg-success';
     
    } elseif ($situacao == 3) {
        return 'bg-warning';
    } 
    else
    {
        return 'bg-danger';
    }
}
function loadicon($situacao){
     if ($situacao == 1) {
        return 'fas fa-keyboard';
    } 
    elseif ($situacao == 2)
    {
        return 'far fa-thumbs-up';
    } 
    elseif ($situacao == 3)
    {
        return 'far fa-question-circle';
    } 
    else {
        return 'fas fa-ban';
    }
}
function status_contrato($status)
{
    switch ($status) {
        case 'APROVADO':
            $status = 'alert alert-default-success';
            break;        
        case 'DIGITADO':
            $status = 'alert alert-default-primary';
            break;        
        case 'PENDENTE':
            $status = 'alert alert-default-warning';
            break;        
        default:
            $status = 'alert alert-default-danger';
            break;
    }
    return $status;
}

function border_status($status)
{
    switch ($status) {
        case 'APROVADO':
            $status = 'border-success';
            break;        
        case 'DIGITADO':
            $status = 'border-primary';
            break;        
        case 'PENDENTE':
            $status = 'border-warning';
            break;        
        default:
            $status = 'border-danger';
            break;
    }
    return $status;
}