<?php

class ScriptUpload extends Field {
    
    use TraitMedia;

    public function setUp($labelName, $show) {
    
        parent::setUp($labelName, 'read', $show);
        
        $this->url = $this->mediaJsUrlGet();
    }
}

?>