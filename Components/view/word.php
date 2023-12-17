<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../DAO/FunctionWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/WordData.class.php");

SelectWordDAO::startDb();
FunctionWordDAO::startDb();

$word = WordConverter::convertWord(SelectWordDAO::getWordById($_GET['id']));

if(!empty($_POST)){
    FunctionWordDAO::deleteWord($_POST['deleteId']);
    header("Location: ./home.php");
}

echo WordData::pageHead();
echo Header::header(false);
echo WordData::wordData($word);
echo WordData::options($word);
echo WordData::pageEnd();