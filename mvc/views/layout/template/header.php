<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Add custom CSS here -->
    <link href="<?php echo $_layoutParams['ruta_css']; ?>sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <link href="<?php echo $_layoutParams['ruta_css']; ?>style.css" rel="stylesheet" />
  </head>
