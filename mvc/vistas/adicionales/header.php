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
    <link href="<?php echo $_layoutParams['ruta_css']; ?>justified-nav.css" rel="stylesheet">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    
  </head>
