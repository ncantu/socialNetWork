<?php 

class Relationship {
    
    public $name;
    public $labelName;    
    public $start;
    public $end;    
    public $attributList = array();
    public $scoreListId  = array();
    public $scoreList    = array();
    
    public function __construct($name, $labelName, $start, $end, $attributList){
        
        $this->name         = $name;
        $this->labelName    = $labelName;
        $this->start        = $start;
        $this->end          = $end;
        
        foreach($attributList as $k => $v) {
            
            $attribut               = new Attribut($k, $v);            
            $this->attributList[$k] = $attribut;
        }
    }
    public function scoreAdd($conf, $id) {
        
        $score                                = new Node(false, $conf);        
        $this->attributList->scoreList[$id]   = $score;
        $this->attributList->scoreListId[$id] = $id;
        
        return true;
    }
}

?>