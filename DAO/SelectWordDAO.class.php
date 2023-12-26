<?php
    class SelectWordDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Words');
        }
        
        public static function getAllWords(int $page){
            
            $limit = ($page - 1)* 10;

            $sql = "SELECT * FROM words LIMIT $limit, 10";
    
            self::$db->query($sql);
    
            self::$db->execute();
    
            return self::$db->resultSet();
        }

        public static function getWordById(int $id){

            $sql = "SELECT * FROM words WHERE id=:id";
    
            self::$db->query($sql);
    
            self::$db->bind(':id',$id);
    
            self::$db->execute();
    
            return self::$db->singleResult();
        }

        public static function getAllWordsKeywords($keyword, int $page){

            $limit = ($page - 1)* 10;

            $sql = "SELECT * FROM words WHERE
            word LIKE :keyword
            OR meaning LIKE :keyword
            LIMIT $limit, 10";

            self::$db->query($sql);
                
            self::$db->bind(':keyword', "%{$keyword}%");

            self::$db->execute();

            return self::$db->resultSet();
        }

        public static function getAllWordsAqquirement($aqquirement, int $page){

            $limit = ($page - 1)* 10;

            $sql = "SELECT * FROM words WHERE
            aqquirement = :aqquirement
            LIMIT $limit, 10";

            self::$db->query($sql);
                
            self::$db->bind(':aqquirement', $aqquirement);

            self::$db->execute();

            return self::$db->resultSet();
        }
    }