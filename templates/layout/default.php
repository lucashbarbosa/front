<!DOCTYPE html>
<html lang="en">
<?php $wroot = "webroot/" ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="<?= $wroot ?>img/favicon.png" rel="icon">
    <link href="<?= $wroot ?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?= $wroot ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= $wroot ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= $wroot ?>css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?= $wroot ?>lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="<?= $wroot ?>css/style.css" rel="stylesheet">
    <link href="<?= $wroot ?>css/style-responsive.css" rel="stylesheet">
    <script src="<?= $wroot ?>lib/chart-master/Chart.js"></script>

</head>

<body>

    <section id="container">
        <?= $this->element("header") ?>
        <?= $this->element("aside") ?>
        <?= $this->fetch('content') ?>
    </section>


</body>


</html>


<script src="<?= $wroot ?>lib/jquery/jquery.min.js"></script>
<script src="<?= $wroot ?>lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?= $wroot ?>lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= $wroot ?>lib/jquery.scrollTo.min.js"></script>
<script src="<?= $wroot ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= $wroot ?>lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="<?= $wroot ?>lib/common-scripts.js"></script>
<script type="text/javascript" src="<?= $wroot ?>lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?= $wroot ?>lib/gritter-conf.js"></script>
<!--script for this page-->
<script src="<?= $wroot ?>lib/sparkline-chart.js"></script>
<script src="<?= $wroot ?>lib/zabuto_calendar.js"></script>