<?php 

trait TraitFake {

    public $fake = true;

    public function fakeGetId($prefix = 'fake') {

        return $prefix.$this->fakeId;
    }
}

?>