<?php 

class GraphRequestPortfolioListGet extends PortfolioList {

    use TraitGraph;

    private $request = ''; // @todo

    private static function setUp($res) {

        // @todo

        $list  = new PortfolioListMy();
        $fake1 = new PortFolioFake1();
        $fake2 = new PortFolioFake2();
        $fake3 = new PortFolioFake3();
        $fake4 = new PortFolioFake4();

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