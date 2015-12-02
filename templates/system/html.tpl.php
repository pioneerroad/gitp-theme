<!DOCTYPE html>
<html lang="en">
<head profile="<?php print $grddl_profile; ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Official Portal for the Decade on Civil Registration and Vital Statistics 2015 - 2024">
    <meta name="author" content="United Nations Economic and Social Commission for Asia and the Pacific (ESCAP)">
    <link rel="icon" href="assets/favicon.ico">

    <title><?php print $head_title; ?></title>

    <?php print $styles; ?>
    <?php print $scripts; ?>

    <!-- fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

</head>

<body class="<?php print($classes); ?>">
    <div class="container-fluid">
        <?php print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>
    </div>
</body>
</html>
