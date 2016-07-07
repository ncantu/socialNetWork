<?php

class MainMenu extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    
    public function setUp($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {
    
        parent::setUp($labelName, $accessMode, $show, $value);

        $actionButtonMenuItemProfilListMy         = new ActionButtonMenuItemProfilListMy();        
        $actionButtonMenuItemNotificationList     = new ActionButtonMenuItemNotificationList();
        $actionButtonMenuItemContactList          = new ActionButtonMenuItemContactList();
        $actionButtonMenuItemPortfolioListMy      = new ActionButtonMenuItemPortfolioListMy();        
        $actionButtonAddContact                   = new ActionButtonAddContact();
        $actionButtonAddRecommandation            = new ActionButtonAddRecommandation();        
        $actionButtonMenuItemRecommandationListMe = new ActionButtonMenuItemRecommandationListMe();
        $actionButtonMenuItemRecommandationListMy = new ActionButtonMenuItemRecommandationListMy();
        $actionButtonMenuItemCategoryList         = new ActionButtonMenuItemCategoryList();
        $actionButtonMenuItemAvantageList         = new ActionButtonMenuItemAvantageList();
        
        $actionButtonMenuItemProfilListMy->setUp($this->nodeName);
        $actionButtonMenuItemNotificationList->setUp($this->nodeName);
        $actionButtonMenuItemContactList->setUp($this->nodeName);
        $actionButtonMenuItemPortfolioListMy->setUp($this->nodeName);
        $actionButtonAddContact->setUp($this->nodeName);
        $actionButtonAddRecommandation->setUp($this->nodeName);
        $actionButtonMenuItemRecommandationListMe->setUp($this->nodeName);
        $actionButtonMenuItemRecommandationListMy->setUp($this->nodeName);
        $actionButtonMenuItemCategoryList->setUp($this->nodeName);
        $actionButtonMenuItemAvantageList->setUp($this->nodeName);
        
        $actionButtonMenuItemNotificationList->actionButtonItemToolsPaginationAdd();
        $actionButtonMenuItemRecommandationListMe->actionButtonItemToolsPaginationAdd();
        $actionButtonMenuItemCategoryList->actionButtonItemToolsPaginationAdd();

        $actionButtonMenuItemContactList->actionButtonItemToolsAdd();
        $actionButtonMenuItemPortfolioListMy->actionButtonItemToolsAdd();
        $actionButtonMenuItemRecommandationListMy->actionButtonItemToolsAdd();
        $actionButtonMenuItemAvantageList->actionButtonItemToolsAdd();
                
        $this->add($actionButtonMenuItemProfilListMy);
        $this->add($actionButtonMenuItemNotificationList);
        $this->add($actionButtonMenuItemContactList);
        $this->add($actionButtonMenuItemPortfolioListMy);
        $this->add($actionButtonAddContact);
        $this->add($actionButtonAddRecommandation);        
        $this->add($actionButtonMenuItemRecommandationListMe);
        $this->add($actionButtonMenuItemRecommandationListMy);
        $this->add($actionButtonMenuItemCategoryList);
        $this->add($actionButtonMenuItemAvantageList);        
        
        return $this;
    }
}

?>