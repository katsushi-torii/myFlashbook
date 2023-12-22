<?php

    class ResultWords {
        private int $id;
        private string $word;
        private string $meaning;
        private string $aqquirement;
        private string $result;

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
         * Get the value of aqquirement
         */ 
        public function getAqquirement()
        {
                return $this->aqquirement;
        }

        /**
         * Set the value of aqquirement
         *
         * @return  self
         */ 
        public function setAqquirement($aqquirement)
        {
                $this->aqquirement = $aqquirement;

                return $this;
        }

        /**
         * Get the value of result
         */ 
        public function getResult()
        {
                return $this->result;
        }

        /**
         * Set the value of result
         *
         * @return  self
         */ 
        public function setResult($result)
        {
                $this->result = $result;

                return $this;
        }
    }