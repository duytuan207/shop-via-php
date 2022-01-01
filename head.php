<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$site['site_domain'];?><?=$site['site_favicon'];?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$site['site_domain'];?><?=$site['site_favicon'];?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$site['site_domain'];?><?=$site['site_favicon'];?>">
    <meta property="og:title" content="<?=$site['site_tenweb'];?>" />
    <meta property="og:image" content="<?=$site['site_domain'];?><?=$site['site_image'];?>" />
    <meta property="og:description" content="<?=$site['site_mota'];?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="<?=$site['site_tukhoa'];?>" />
    <meta name="description" content="<?=$site['site_mota'];?>" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/styles/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/src/scripts/sweetalert.min.js"></script>
    <style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    ::-webkit-scrollbar-thumb {
        background: <?=$site['color'];
        ?>;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    .btn-primary {
        color: #fff;
        background-color: <?=$site['color'];
        ?>;
        border-color: <?=$site['color'];
        ?>;
    }

    .text-blue {
        color: <?=$site['color'];
        ?>;
    }
    </style>
</head>