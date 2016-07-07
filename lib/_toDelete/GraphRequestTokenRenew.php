<?php 

class GraphRequestTokenRenew extends Token {
    
    use TraitGraph;
    
    private $request = ''; // @todo
    
    private function resultSet($res, $filter) {
        
        // @todo

        $res = new TokenFake1();
        
        $res->setUp($this->nodeName, $this->accessMode, $this->show);
        
        return $res;        
    }
}

?>

