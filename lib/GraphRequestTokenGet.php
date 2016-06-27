<?php 

class GraphRequestTokenGet extends Token {

    use TraitGraph;

    private $request = ''; // @todo

    public function graphRequest($filter) {

        $verif = new GraphRequestTokenVerif();
        $res   = $verif->graphRequest($filter);

        if($res === false) {
             
            return false;
        }
        $res = parent::graphRequest($filter);

        return $res;
    }
    private function resultSet($res, $filter) {

        // @todo

        $res = new TokenFake2();

        $res->setUp($this->nodeName, $this->accessMode, $this->show);

        return $res;
    }
}

?>