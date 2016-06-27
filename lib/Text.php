<?php 

class Text extends Field {

    public $valueListState = false;

    public function setUp($labelName, $accessMode, $show, $value) {

        parent::setUp($labelName, $accessMode, $show, $value);

        if(get_class($this) !== __CLASS__) {

            $textList = new TextList();
            $text     = new Text();

            $textList->setUp($this->nodeName, $accessMode, $show);
            $text->setUp($this->nodeName, $accessMode, $show, $value);
            $text->translate();
            $textList->add($text, $this);
            $this->valueSet($textList);

            $this->valueListState = true;
        }
    }
    public function translate() {

        $value = $this->graphTextGet();

        if($value === false) {

            return false;
        }
        $this->valueSet($value);

        return true;
    }
}

?>