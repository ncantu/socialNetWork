<?php

class Image extends Field {
    
    public $url;
    public $scriptUpload;
    
    public function setUp($labelName, $accessMode, $show, $url) {
        
        parent::setUp($labelName, $accessMode, $show);
        
        $this->url          = new Url();        
        $this->scriptUpload = new ScriptUpload();

        $this->url->setUp($this->nodeName, $show, $url);
        $this->scriptUpload->setUp($this->nodeName, 'showVisible');
    }
}

?>