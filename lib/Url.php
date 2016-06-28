<?php

class Url extends Field {

    public function setUp($labelName, $show, $url) {
        
        parent::setUp($labelName, 'read', $show);        
        
        $this->url = $url;
    }
}

?>