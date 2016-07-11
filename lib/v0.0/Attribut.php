<?php
class Attribut {

    public $name;

    public $type;

    public $valueList = array();

    public function __construct($name, $value = null, $valueId = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $valueId);
        
        $this->name = $name;
        
        if ($value !== null) {
            
            $this->set($value, $valueId);
        }
        return Trace::endOK(__LINE__, __METHOD__, __CLASS__);
    }

    public function get($id = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $id);
        
        if ($id === false) {
            
            return $this->last();
        }
        $res = $this->valueList[$id];
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    public function set($value, $id = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $id);
        
        $res = $this->add($value, $id);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    public function update($value, $id = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $id);
        
        if ($id === false) {
            
            $id = count($this->valueList) - 1;
        }
        $this->type = gettype($value);
        $this->valueList[$id] = $value;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function removeValue($value) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        
        $id = $this->getId($value);
        $res = $this->removeId($id);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    public function removeId($id) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $id);
        
        if (isset($this->valueList[$id]) === false) {
            
            return Trace::fatal(__LINE__, __METHOD__, __CLASS__);
        }
        unset($this->valueList[$id]);
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function getId($value) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        
        $res = array_search($value, $this->valueList);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    private function last() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $res = end($this->valueList);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    private function add($value, $id = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $id);
        
        if ($id === false) {
            
            $id = count($this->valueList);
        }
        if (isset($this->valueList[$id]) === true) {
            
            return false;
        }
        $this->type = gettype($value);
        $this->valueList[$id] = $value;
        
        return Trace::endOK(__LINE__, __METHOD__, __CLASS__);
    }
}

?>