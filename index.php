<?php
require_once 'CONFIG.php';

use CytatyBomba\Controller\PageController;

$Page = new PageController();
$Page->include_html("__head");
$Page->include_html("__nav");
$Page->Start();
$Page->include_html("__footer");

?>

