<?php

class MainContent {
    
    public $profilListMyId;

    public function setUp($labelName, $accessMode, $show) {
    
        parent::setUp($labelName, $accessMode, $show);
              
        $profilListMy = new ProfilListMy();
        
        $profilListMy->setUp($this->nodeName, $accessMode, $show);
        
        $this->profilListMyId = $profilListMy->id;
        
        $this->add($profilListMy);
    }
}


?>