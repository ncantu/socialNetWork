<?php 

class GraphUserLoginPrivateGet extends UserLoginPrivate {

    use TraitGraph;

    private $request = ''; // @todo

    private function setUp($res, $filter) {

        // @todo

        $res = new UserLoginPrivateFake1();

        $res->setUp($this->nodeName, $this->accessMode, $this->show);

        return $res;
    }
}

?>