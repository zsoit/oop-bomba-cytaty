<?php
require_once 'CONFIG.php';
require_once 'src/class/PageController.php';
$Page = new PageController();

$Page->include_html("__head");
$Page->include_html("__nav");
$Page->Start();
$Page->include_html("__footer");
?>

