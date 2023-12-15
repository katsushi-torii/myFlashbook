<?php
    class SelectWordDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Words');
        }
        
        public static function getAllWords(){
            
            $sql = "SELECT * FROM words";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->resultSet();
        }

        public static function getMatchById( int $id ){

            $sql = "SELECT * FROM matches WHERE id=:id";
    
            self::$db->query($sql);
    
            self::$db->bind(':id',$id);
    
            self::$db->execute();
    
            return self::$db->singleResult();
        }

        public static function getAllWordsKeywords($keyword){

            $sql = "SELECT * FROM words WHERE
            word LIKE :keyword
            OR meaning LIKE :keyword";

            self::$db->query($sql);
                
            self::$db->bind(':keyword', "%{$keyword}%");

            self::$db->execute();

            return self::$db->resultSet();
        }
    }