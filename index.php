<?php
include('./config.php');
include('./includes/function.php');
$templateMode = empty($_GET['_pjax']);
if ($templateMode && $_GET['page'] != 'card') {
    include('./includes/header.php');
}
switch ($_GET['page']) {
    case "submit":
        include('./pages/submit.php');
        break;
    case "more":
        include('./pages/more.php');
        break;
    case "about":
        include('./pages/about.php');
        break;
    case "card":
        include('./pages/card.php');
        break;
    default:
        include('./pages/homepage.php');
}
if ($templateMode && $_GET['page'] != 'card') {
    include('./includes/footer.php');
}
