<?php

    class Words {
        private int $id;
        private string $word;
        private string $meaning;
        private string $date;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of word
         */ 
        public function getWord()
        {
                return $this->word;
        }

        /**
         * Set the value of word
         *
         * @return  self
         */ 
        public function setWord($word)
        {
                $this->word = $word;

                return $this;
        }

        /**
         * Get the value of meaning
         */ 
        public function getMeaning()
        {
                return $this->meaning;
        }

        /**
         * Set the value of meaning
         *
         * @return  self
         */ 
        public function setMeaning($meaning)
        {
                $this->meaning = $meaning;

                return $this;
        }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }
    }