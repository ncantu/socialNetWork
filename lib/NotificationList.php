<?php

class NotificationList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;

    public function setUp($labelName, $accessMode, $show) {
    
        parent::setUp($labelName, $accessMode, $show);
        
       $list                  = parent::get($labelName, $accessMode, $show);       
       $notification1         = new NotificationRecommandationNew();
       
       $notification1->setUp($this->nodeName, $accessMode, $show);
       
       $this->notification1Id = $list->fieldItemListAddObj($notification1);       
    }
}

?>