<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/Home.class.php");

SelectWordDAO::startDb();

echo Home::pageHead();
echo Header::header(true);
echo Home::fixedButtons();
echo Home::filter();

$parameter = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
if(!empty($_GET['sortBy'])){
    //exclude sortby part
    $parameter = explode("&sortBy", $parameter)[0];
};

echo Home::order($parameter);


if(!empty($_GET['keyword'])){
    $wordList = WordConverter::convertWord(
        SelectWordDAO::getAllWordsKeywords($_GET['keyword'])
    );
}elseif(empty($_GET['keyword'])){
    $wordList = WordConverter::convertWord(
        SelectWordDAO::getAllWords()
    );
};

if(!empty($_GET['sortBy'])){
    $sortBy = $_GET['sortBy'];

    if($sortBy == "alpDesc"){
        usort(
            $wordList, function($a, $b){
                return $a->word < $b->word ? -1 : 1;
            }
        );
    }elseif($sortBy == "alp"){
        usort(
            $wordList, function($a, $b){
                return $a->word > $b->word ? -1 : 1;
            }
        );
    }elseif($sortBy == "dateDesc"){
        usort(
            $wordList, function($a, $b){
                return $a->date < $b->date ? -1 : 1;
            }
        );
    }elseif($sortBy == "date"){
        usort(
            $wordList, function($a, $b){
                return $a->date > $b->date ? -1 : 1;
            }
        );
    }
};

echo Home::wordList($wordList);
echo Home::pageEnd();