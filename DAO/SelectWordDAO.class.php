<?php
    class SelectMatchDAO {

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

        public static function getAllMatchesKeywords($keyword){

            $sql = "SELECT * FROM matches WHERE
            competition LIKE :keyword
            OR leg LIKE :keyword
            OR teamA LIKE :keyword
            OR teamB LIKE :keyword
            OR scorerA LIKE :keyword
            OR scorerB LIKE :keyword
            OR comment LIKE :keyword";

            self::$db->query($sql);
                
            self::$db->bind(':keyword', "%{$keyword}%");

            self::$db->execute();

            return self::$db->resultSet();
        }
        
        public static function getAllMatchesFiltered($selectedValues){

            $star = "";
            $competition = "";
            $team = "";
            $count = 0;

            $selectedStar = $selectedValues->star;
            if($selectedStar != ""){
                $count += 1;
                $star = "star = {$selectedStar}";
            };
            
            $selectedCompetition = $selectedValues->competition;
            if($selectedCompetition != ""){
                $count += 1;
                if($count == 1){
                    $competition = "competition = '{$selectedCompetition}'";
                }else{
                    $competition = "AND competition = '{$selectedCompetition}'";
                };
            };
            
            $selectedTeam = $selectedValues->team;
            if($selectedTeam != ""){
                $count += 1;
                if($count == 1){
                    $team = "(teamA = '{$selectedTeam}' OR teamB = '{$selectedTeam}')";
                }else{
                    $team = "AND (teamA = '{$selectedTeam}' OR teamB = '{$selectedTeam}')";
                };
            };
            
            //$whereはフィルターが１つでもあったら存在
            $where = "";
            if($count > 0){
                $where = "WHERE";
            };

            $sql = "SELECT * FROM matches $where $star $competition $team";

            self::$db->query($sql);

            self::$db->execute();

            return self::$db->resultSet();
        }
    }