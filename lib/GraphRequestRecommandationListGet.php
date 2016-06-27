<?php 

class GraphRequestRecommandationListGet extends RecommandationList {

    use TraitGraph;

    private $request = ''; // @todo

    private static function setUp($res, $filter) {

        // @todo

        $list  = new RecommandationListMe();
        $fake1 = new RecommandationFake1();
        $fake2 = new RecommandationFake2();
        $fake3 = new RecommandationFake3();
        $fake4 = new RecommandationFake4();

        $list->setUp($this->nodeName, $this->accessMode, $this->show);
        $fake1->setUp($this->nodeName, $this->accessMode, $this->show);
        $fake2->setUp($this->nodeName, $this->accessMode, $this->show);
        $fake3->setUp($this->nodeName, $this->accessMode, $this->show);
        $fake4->setUp($this->nodeName, $this->accessMode, $this->show);
        $list->add($fake1);
        $list->add($fake2);
        $list->add($fake3);
        $list->add($fake4);

        return $list;
    }
}

?>