<?php 

class PortFolioFake extends PortFolio {

    use TraitFake;

    public static function setUp($labelName, $accessMode, $show, $title) {

        parent::setUp($labelName, $accessMode, $show, $title);

        $id    = $this->fakeGetId();
        $title = $id.' title';

        $this->itemTitleSet($title);
        $this->itemImageSet($title, $this->url);
    }
}

?>