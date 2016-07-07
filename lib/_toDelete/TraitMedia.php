<?php

trait TraitMedia {
    
    public function mediapathGet() {
        
        return Token::$domainValueDefault.'/'.Token::$lang.'/'.Token::$themeValueDefault.'/'.Token::$semanticValueDefault.'/'.Token::$avantageMax.'/';
    }    
    public function mediaJsUrlGet (){
        
        $path = $this->mediapathGet();
        
        return 'http://'.$path.'/js/'.$this->nodeName.'.js';
    }
    public function mediaImageUrlGet (){$path = Token::$domainValueDefault.'/'.Token::$lang.'/'.Token::$themeValueDefault.'/'.Token::$semanticValueDefault.'/'.Token::$avantageMax.'/';

        $path = $this->mediapathGet();
        
        return 'http://'.$path.'/image/'.$this->nodeName.'.png';
    }
    public function mediaCssUrlGet (){
        
        $path = $this->mediapathGet();
        
        return 'http://'.$path.'/css/'.$this->nodeName.'.css';
    }
}

?>