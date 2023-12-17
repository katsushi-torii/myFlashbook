<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/Test.class.php");

SelectWordDAO::startDb();

$wordList = WordConverter::convertWord(
    SelectWordDAO::getAllWords()
);

shuffle($wordList);

$selectedWords = array_slice($wordList, 0, 10);

echo Test::pageHead();
echo Header::header(false);
echo Test::quizList($selectedWords);
echo Test::pageEnd();