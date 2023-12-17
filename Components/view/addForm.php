<?php

require_once("../../Config.inc.php");
require_once("../../class/object/Words.class.php");
require_once("../../PDOAgent.class.php");
require_once("../../DAO/FunctionWordDAO.class.php");
require_once("../../class/converter/WordConverter.class.php");
require_once("../../class/html/Header.class.php");
require_once("../../class/html/AddForm.class.php");

FunctionWordDAO::startDb();

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
    
    FunctionWordDAO::insertWord($newWord);

    header("Location: ./home.php");
};

echo AddForm::pageHead();
echo Header::header(false);
echo AddForm::title();
echo AddForm::form();
echo AddForm::options();
echo AddForm::pageEnd();