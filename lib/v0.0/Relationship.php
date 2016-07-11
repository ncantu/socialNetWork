<?php
class Relationship {

    public $name;

    public $labelName;

    public $start;

    public $end;

    public $attributList = array();

    public $scoreListId = array();

    public $scoreList = array();

    public function __construct($name, $labelName, $start, $end, $attributList) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $start);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $end);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $attributList);
        
        $this->name = $name;
        $this->labelName = $labelName;
        $this->start = $start;
        $this->end = $end;
        
        foreach ( $attributList as $k => $v ) {
            
            $attribut = new Attribut($k, $v);
            $this->attributList[$k] = $attribut;
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function scoreAdd($conf, $id) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $id);
        
        $score = new Node(false, $conf);
        $this->attributList->scoreList[$id] = $score;
        $this->attributList->scoreListId[$id] = $id;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }
}

?>