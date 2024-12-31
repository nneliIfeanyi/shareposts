<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/theme.css" />
  <link rel="stylesheet" href="<?= URLROOT; ?>/bootstrap-icons/bootstrap-icons.css" />
  <title><?php echo SITENAME; ?></title>
  <!-- more meta -->
  <meta name="keyword" content="Sharefaith, Socoal Media, Social network, fediverse, mastodon, peertube, bluesky" />
  <meta name="description" content="A growing and under-developed social network app built on the TraversyMVC framework" />
  <meta name="robots" content="index, nofollow" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="apple-mobile-web-app-title" content="goodscores" />
  <meta name="application-name" content="Sharefaith" />
  <meta name="msapplication-TileName" content="Sharefaith" />
  <meta name="msapplication-TileImage" content="<?php echo URLROOT; ?>/icons/favicon-32x32.png" width="32" height="32" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT; ?>/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT; ?>/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT; ?>/icons/favicon-16x16.png">
  <link rel="manifest" href="<?= URLROOT; ?>/site.webmanifest">
  <!-- theme-color -->
  <meta name="apple-mobile-web-app-status-bar" content="#ced4da">
  <meta name="theme-color" content="#ced4da">
  <style>
    .horizontal-scroll {
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;

      &::-webkit-scrollbar {
        display: none;
      }

      .cardz {
        display: inline-block;
      }

    }
  </style>
</head>

<body>
  <div id="loading-bg"></div>
  <div id="loading-image" class="spinner-border text-success" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <!-- <img id="loading-image" src="http://zundapps.com/content/images/large_%20loader.gif" alt=""> -->
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="container">