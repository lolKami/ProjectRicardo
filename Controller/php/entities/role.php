<?php
    class role{
        private $ID_ROLE;
        private $DESCRIPTION;
        
        public function getID_ROLE(){
            return $this->ID_ROLE;
        }
        public function setID_ROLE($ID_ROLE){
           $this->ID_ROLE = $ID_ROLE;
        }
        public function getDESCRIPTION(){
            return $this->DESCRIPTION;
        }
        public function setDESCRIPTION($DESCRIPTION){
           $this->DESCRIPTION = $DESCRIPTION;
        }
        public function getEND_DATE(){
            return $this->END_DATE;
        }
    
        public function setEND_DATE($END_DATE){
            $this->END_DATE = $END_DATE;
        }
    }
?>