<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/Home.class.php");

SelectMatchDAO::startDb();

$wordList = WordConverter::convertWord(
    SelectMatchDAO::getAllWords()
);

echo Home::pageHead();
echo Header::header(true);
echo Home::fixedButtons();
echo Home::filter();
echo Home::order();
echo Home::wordList($wordList);
echo Home::pageEnd();