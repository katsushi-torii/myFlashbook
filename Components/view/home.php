<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/Home.class.php");

SelectWordDAO::startDb();

$page = 1;
$parameter = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
if(!empty($_GET['page'])){
    $page = $_GET['page'];
    //exclude page part
    $parameter = explode("&page", $parameter)[0];
}

$pageAmount = ceil(count(WordConverter::convertWord(
    SelectWordDAO::getAllWords(0)
))/10);

echo Home::pageHead();
echo Header::header(true);
echo Home::fixedButtons();
echo Home::form();

$wordList = WordConverter::convertWord(
    SelectWordDAO::getAllWords($page)
);

class Filter {
    public $keyword = "";
    public $aqquirement = "";
    public $order = "";
};
$values = new Filter;

if(!empty($_GET)){
    if(!empty($_GET['keyword'])){
        $values->keyword = $_GET['keyword'];
        $wordList = WordConverter::convertWord(
            SelectWordDAO::getAllWordsFiltered($values, $page)
        );
        $pageAmount = ceil(count(WordConverter::convertWord(
            SelectWordDAO::getAllWordsFiltered($values, 0)
        ))/10);
    };
    
    if(!empty($_GET['aqquirement'])){
        $values->aqquirement = $_GET['aqquirement'];
        $wordList = WordConverter::convertWord(
            SelectWordDAO::getAllWordsFiltered($values, $page)
        );
        $pageAmount = ceil(count(WordConverter::convertWord(
            SelectWordDAO::getAllWordsFiltered($values, 0)
        ))/10);
    }

    if(!empty($_GET['sortBy'])){
        $values->order = $_GET['sortBy'];
        $wordList = WordConverter::convertWord(
            SelectWordDAO::getAllWordsFiltered($values, $page)
        );
    }
}

echo Home::pageButtons($parameter, $pageAmount, $page);
echo Home::wordList($wordList);
echo Home::pageButtons($parameter, $pageAmount, $page);
echo Home::pageEnd($values);