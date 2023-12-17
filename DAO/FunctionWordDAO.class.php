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

        // public static function editMatch(Matches $newWord, $id){

        //     $sql = "UPDATE matches SET matchDate=:matchDate, star=:star, competition=:competition, leg=:leg, teamA=:teamA, teamB=:teamB, scoreA=:scoreA, scoreB=:scoreB, scorerA=:scorerA, scorerB=:scorerB, comment=:comment WHERE id=:id";

        //     self::$db->query($sql);
    
        //     self::$db->bind(":id",$id);
        //     self::$db->bind(":matchDate",$newWord->getMatchDate());
        //     self::$db->bind(":star",$newWord->getStar());
        //     self::$db->bind(":competition",$newWord->getCompetition());
        //     self::$db->bind(":leg",$newWord->getLeg());
        //     self::$db->bind(":teamA",$newWord->getTeamA());
        //     self::$db->bind(":teamB",$newWord->getTeamB());
        //     self::$db->bind(":scoreA",$newWord->getScoreA());
        //     self::$db->bind(":scoreB",$newWord->getScoreB());
        //     self::$db->bind(":scorerA",$newWord->getScorerA());
        //     self::$db->bind(":scorerB",$newWord->getScorerB());
        //     self::$db->bind(":comment",$newWord->getComment());
    
        //     self::$db->execute();
    
        //     return self::$db->lastInsertId();
        // }

        // public static function deleteMatch($id){

        //     $sql = "DELETE from matches WHERE id=:id";

        //     self::$db->query($sql);
    
        //     self::$db->bind(":id",$id);
    
        //     self::$db->execute();
    
        //     return self::$db->rowCount();
        // }
        
    }