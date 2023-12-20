<?php

 class WordConverter {
 
     public static function convertWord( $newWord ) {
         if ( ! is_array( $newWord ) ) {
             $stdObj = new stdClass;
 
             $stdObj->id = $newWord->getId();
             $stdObj->word = $newWord->getWord();
             $stdObj->meaning = $newWord->getMeaning();
             $stdObj->date = $newWord->getDate();
             $stdObj->aqquirement = $newWord->getAqquirement();
 
             return $stdObj;
         } else {
             $objList = [];
             for($i = 0; $i < count($newWord); $i++){
                 $stdObj = new stdClass;
 
                 $stdObj->id = $newWord[$i]->getId();
                 $stdObj->word = $newWord[$i]->getWord();
                 $stdObj->meaning = $newWord[$i]->getMeaning();
                 $stdObj->date = $newWord[$i]->getDate();
                 $stdObj->aqquirement = $newWord[$i]->getAqquirement();
                 
                 $objList[] = $stdObj;
             }
 
             return $objList;
         }
     }
 
     public static function convertToObj($stdObject) {
 
         $newWord = new Words();
         $newWord->setWord($stdObject->word);
         $newWord->setMeaning($stdObject->meaning);
         $newWord->setDate($stdObject->date);
         $newWord->setAqquirement($stdObject->aqquirement);
         
         return $newWord;
     }
 }