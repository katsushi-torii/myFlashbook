<?php
    class SelectWordDAO {

        private static $db;

        public static function startDb(){
            self::$db = new PDOAgent('Words');
        }
        
        public static function getAllWords(int $page){
            
            $pageNum = ($page - 1)* 10;
            $limit = "";
            if($page != 0){
                $limit = "LIMIT $pageNum, 10";
            }

            $sql = "SELECT * FROM words $limit";
    
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

        public static function getAllWordsFiltered($values, $page){

            $keyword = "";
            $aqquirement = "";
            $order = "";
            $count = 0;

            $typedKeyword = $values->keyword;
            if($typedKeyword != ""){
                $count += 1;
                $keyword = "(word LIKE '%{$typedKeyword}%' OR meaning LIKE '%{$typedKeyword}%')";
            };

            $selectedAqquirement = $values->aqquirement;
            if($selectedAqquirement != ""){
                $count += 1;
                if($count == 1){
                    $aqquirement = "aqquirement = {$selectedAqquirement}";
                }else{
                    $aqquirement = "AND aqquirement = {$selectedAqquirement}";
                };
            };
            
            $selectedOrder = $values->order;
            if($selectedOrder == "alp"){
                $order = "ORDER BY word";
            }elseif($selectedOrder == "alpDesc"){
                $order = "ORDER BY word DESC";
            }elseif($selectedOrder == "dateDesc"){
                $order = "ORDER BY date DESC";
            }elseif($selectedOrder == "date"){
                $order = "ORDER BY date";
            }
            
            $where = "";
            if($count > 0){
                $where = "WHERE";
            };

            $pageNum = ($page - 1)* 10;
            $limit = "";
            if($page != 0){
                $limit = "LIMIT $pageNum, 10";
            }

            $sql = "SELECT * FROM words $where $keyword $aqquirement $order $limit";
            
            self::$db->query($sql);

            self::$db->execute();

            return self::$db->resultSet();
        }
    }
    