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

        public static function getWordById( int $id ){

            $sql = "SELECT * FROM words WHERE id=:id";
    
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

        public static function getAllWordsAqquirement($aqquirement){

            $sql = "SELECT * FROM words WHERE
            aqquirement = :aqquirement";

            self::$db->query($sql);
                
            self::$db->bind(':aqquirement', $aqquirement);

            self::$db->execute();

            return self::$db->resultSet();
        }
    }