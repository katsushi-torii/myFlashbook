<?php

require_once("../../class/html/Header.class.php");
require_once("../../class/html/Start.class.php");

echo Start::pageHead();
echo Header::header(false);
echo Start::mainHtml();