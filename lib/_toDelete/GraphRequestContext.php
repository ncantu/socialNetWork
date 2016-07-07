<?php 

class GraphRequestContext extends Context {

    use TraitGraph;

    private $request = ''; // @todo

    public function graphRequest($filter) {

        $tokenCreate = new GraphRequestTokenCreate();
        $res         = $tokenCreate->graphRequest($filter);
        $res         = parent::graphRequest($filter);

        return $res;
    }
    private function resultSet($res, $filter) {

        // @todo

        $res = new ContextFake1();

        $res->setUp($this->nodeName, $this->accessMode, $this->show);

        return $res;
    }
}

?>