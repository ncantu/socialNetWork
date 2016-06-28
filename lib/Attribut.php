<?php 

class Attribut {
    
    public $name;
    public $valueList = array();
    
    public function __construct($name, $value = null, $valueId = false) {
        
        $this->name = $name;
        
        if($value !== null) {
            
            $this->set($value, $valueId);
        }
    }
    public function get($id = false) {
        
        if($id === false) {
        
            return $this->last();
        }
        return $this->valueList[$id];
    }
    public function set($value, $id = false) {
        
        return $this->add($value, $id);
    }
    public function update($value, $id = false) {
        
        if($id === false) {
        
            $id = count($this->valueList)-1;
        }
        $this->valueList[$id] = $value;
        
        return true;
    }
    public function removeValue($value) {
        
        $id = $this->getId($value);
                
        return $this->removeId($id);
    }
    public function removeId($id) {
        
        if(isset($this->valueList[$id]) === false) {
            
            return false;
        }        
        unset($this->valueList[$id]);
        
        return true;
    }
    public function getId($value) {
        
        return array_search($value, $this->valueList);
    }
    private function last() {
        
        return end($this->valueList);
    }
    private function add($value, $id = false) {
        
        if($id === false) {
            
            $id = count($this->valueList);
        }
        if(isset($this->valueList[$id]) === true) {
            
            return false;
        }
        $this->valueList[$id] = $value;
        
        return true;
    }
}

?>