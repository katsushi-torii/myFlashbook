<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../class/object/ResultWords.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../DAO/FunctionWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/Result.class.php");

SelectWordDAO::startDb();
FunctionWordDAO::startDb();

$wordList = [];

if(!empty($_POST)){
    $idArray = explode(",", $_POST['ids']);
    $resultArray = explode(",", $_POST['results']);
    
    for($i = 0; $i < 10; $i++){
        $resultWord = new ResultWords;
        $resultWord->setId($idArray[$i]);
        $databaseWord = WordConverter::convertWord(SelectWordDAO::getWordById(intval($idArray[$i])));
        $resultWord->setWord($databaseWord->word);
        $resultWord->setMeaning($databaseWord->meaning);
        $resultWord->setAqquirement($databaseWord->aqquirement);
        $resultWord->setResult($resultArray[$i]);
        $wordList[] = $resultWord;
    }

    if(!empty($_POST['aqquire'])){
        FunctionWordDAO::editAqquirement($_POST['aqquire'], 1);
    }
    if(!empty($_POST['aqquireReset'])){
        FunctionWordDAO::editAqquirement($_POST['aqquireReset'], 0);
    }
}

echo Result::pageHead();
echo Header::header(false);
echo Result::title($_POST['score']);
echo Result::resultList($wordList, $_POST['ids'], $_POST['results'], $_POST['score']);
echo Result::pageEnd();