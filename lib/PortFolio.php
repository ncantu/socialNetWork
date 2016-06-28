<?php

class PortFolio extends FieldList { 
    
    use TraitMedia;
    
    public $titleId;
    public $ImageId;    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
    
    public static function setUp($labelName, $accessMode, $show, $title) {

        parent::setUp($labelName, $accessMode, $show);
        
        $url           = $this->mediaImageUrlGet();
        $title         = new PortFolioTitle();        
        $this->titleId = $title->id;
        $image         = new PortFolioImage();
        $this->imageId = $image->id;
        

        $title->setUp($this->nodeName, $this->accessMode, $this->show, $title);
        $image->setUp($this->nodeName, $this->accessMode, $this->show, $url);
        
        $this->add($title);
        $this->add($image);
    }    
    public function itemTitleSet($value, $attributName = 'value') {

        $obj = $this->itemList[$this->tileId];
        
        return $this->itemAttributSet($obj, $attributName, $value);
    }    
    public function itemImageSet($title, $url) {

        $obj = $this->itemList[$this->ImageId];
        
        $this->itemAttributSet($obj, 'title', $title);        
        $this->itemAttributSet($obj, 'url', $url);
        
        return true;
    }
}

?>