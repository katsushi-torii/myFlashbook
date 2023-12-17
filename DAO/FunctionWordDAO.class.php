<?php
    class FunctionWordDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Words');
        }

        public static function insertWord(Words $newWord){

            $sql = "INSERT INTO words(word, meaning, date) VALUES (:word, :meaning, :date)";

            self::$db->query($sql);
    
            self::$db->bind(":word",$newWord->getWord());
            self::$db->bind(":meaning",$newWord->getMeaning());
            self::$db->bind(":date",$newWord->getDate());
    
            self::$db->execute();
    
            return self::$db->lastInsertId();
        }

        public static function editWord(Words $newWord, $id){

            $sql = "UPDATE words SET word=:word, meaning=:meaning, date=:date WHERE id=:id";

            self::$db->query($sql);
    
            self::$db->bind(":id",$id);
            self::$db->bind(":word",$newWord->getWord());
            self::$db->bind(":meaning",$newWord->getMeaning());
            self::$db->bind(":date",$newWord->getDate());
    
            self::$db->execute();
    
            return self::$db->lastInsertId();
        }

        // public static function deleteMatch($id){

        //     $sql = "DELETE from matches WHERE id=:id";

        //     self::$db->query($sql);
    
        //     self::$db->bind(":id",$id);
    
        //     self::$db->execute();
    
        //     return self::$db->rowCount();
        // }
        
    }