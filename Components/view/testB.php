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
    SelectWordDAO::getAllWords(0)
);

shuffle($wordList);

$selectedWords = array_slice($wordList, 0, 10);

$ids = "";

foreach($selectedWords as $word){
    if($word == $selectedWords[9]){
        $ids .= strval($word->id);
    }else{
        $ids .= strval($word->id);
        $ids .= ',';
    }
}

echo Test::pageHead();
echo Header::header(false);
echo Test::quizList($selectedWords);
echo Test::pageEnd($ids, $selectedWords);