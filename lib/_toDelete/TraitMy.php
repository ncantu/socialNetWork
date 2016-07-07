<?php

trait TraitMy {
    
    public function myGetFilter($myState = true) {
        
        if($myState !== true) {
            
            $this->myState = $myState;
        }        
        $filter = new Filter();
        
        if($this->myState === true) {
            
            $filter->userCreatedBy = Token::userLoginPrivateGet();
        }
        if($this->myState === true) {
            
            $filter->userCreatedByNot = Token::userLoginPrivateGet();
        }
        return $filter;
    }
}

?>