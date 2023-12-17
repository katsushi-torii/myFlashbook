<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/SelectWordDAO.class.php");
require_once("../../DAO/FunctionWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/EditForm.class.php");

SelectWordDAO::startDb();
FunctionWordDAO::startDb();

$word = WordConverter::convertWord(SelectWordDAO::getWordById($_GET['id']));
$meaningNum = count(explode(", ", $word->meaning));

if(!empty($_POST)){
    //make it into an array
    $words = [];
    for($i = 0; $i < $_POST['meaningNum']; $i++){
        $words[] = $_POST["meaning{$i}"];
    };
    //array to string
    $wordsString = implode(", ", $words);

    $newWord = new Words();

    $newWord->setWord($_POST['word']);
    $newWord->setMeaning($wordsString);
    $newWord->setDate($_POST['date']);
    
    FunctionWordDAO::editWord($newWord, $_GET['id']);

    header("Location: ./home.php");
};

echo EditForm::pageHead();
echo Header::header(false);
echo EditForm::title();
echo EditForm::form($word);
echo EditForm::options($word);
echo EditForm::pageEnd($meaningNum, $word->meaning);