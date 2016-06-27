<?php 

class KeywordList extends FieldList {

    public $keywordListToImport;
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    
    public function keywordListToImport() {
        
        foreach($$this->keywordListToImport as $v) {
            
            $obj = new Keyword();
            
            $obj->setUp($this->nodeName, $this->accessMode, $this->show, $v);
            $this->add($obj);
        }
        return true;
    }
    public function keywordListToImportSet($value, $attributName = 'keywordListToImport') {
    
        return $this->attributSet($attributName, $value);
    }
}

?>