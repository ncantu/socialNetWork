<?php 

class GraphRequestTokenVerif extends Token {

    use TraitGraph;

    private $request = ''; // @todo

    public function resultSet($res, $filter) {

        // @todo

        $res = new TokenFake4();

        $res->setUp($this->nodeName, $this->accessMode, $this->show);

        return $res;
    }
}

?>