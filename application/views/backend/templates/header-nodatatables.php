<?php defined('BASEPATH') or exit('No script direct access allowed!'); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $titulo . ' | ' . $subtitulo ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=base_url('assets/fontawesome-free/css/all.css') ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/1.3.2/css/ionicons.min.css" integrity="sha512-tIDFJc2fFeV494m7zhgq/VmzgsyxauLzYGbA3WQxtyeWqnyVt80kJKhXaDaFDIL/oiJti45KVBGWyBn+BASgNg==" crossorigin="anonymous" />
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?=base_url('assets/css/OverlayScrollbars.min.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url('assets/plugins/css/adminlte.min.css') ?>">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style type="text/css">
            *{font-size: 14px;}
            .cpf{}
            .cep{}
            .phone{}
            .card-border{
                border: 2px solid #D81B60!important;
                background: #f7eff6;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">

