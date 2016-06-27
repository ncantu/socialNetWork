<?php 

class GraphRequestContactListGet extends ContactList {

    use TraitGraph;

    private $request = ''; // @todo

    private static function setUp($res, $filter) {

        // @todo

        $list  = new ContactList();
        $fake1 = new ProfilFake1();
        $fake2 = new ProfilFake2();
        $fake3 = new ProfilFake3();
        $fake4 = new ProfilFake4();

        $list->setUp($this->nodeName, $this->accessMode, $this->show);
        $fake1->setUp($this->nodeName, $this->accessMode, $this->show, false);
        $fake2->setUp($this->nodeName, $this->accessMode, $this->show, false);
        $fake3->setUp($this->nodeName, $this->accessMode, $this->show, false);
        $fake4->setUp($this->nodeName, $this->accessMode, $this->show, false);
        $list->add($fake1);
        $list->add($fake2);
        $list->add($fake3);
        $list->add($fake4);

        return $list;
    }
}

?>