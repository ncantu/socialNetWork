<?php 

class Filter {
    
    public static $me;
    public static $share;
    
    public function __construct($setUp = false) {
        
       if($setUp === true) {
           
           $this->setUp();
       }
    }    
    public function setUp() {
        
        self::$me    = self::meGet();
        self::$share = self::shareGet();
    }
    public static function meGet() {
        
        $filterConf           = new Node(false, $this);
        $filterConf->nodeName = 'list';
        
        $filterConf->accessModeListAdd('write');
        
        $childConf           = new stdClass();
        $childConf->nodeName = 'user';
        $childConf->value    = Token::$profil->userPublicId;
        $child               = new Node(false, $childConf);
        
        $filterConf->childListAdd($child);
        
        $filterConf->accessModeListAdd('stateUpdate');
        
        return $filterConf;
    }
    public static function shareGet() {
        
        $filterShareConf = self::filterMeGet();
        
        $filterShareConf->accessModeListAdd('read');
        
        $childConf           = new stdClass();
        $childConf->nodeName = 'share';
        $childConf->value    = 'other';
        $child               = new Node(false, $childConf);
        
        $filterShareConf->childListAdd($child);
        
        $childConf           = new stdClass();
        $childConf->nodeName = 'public';
        $childConf->value    = 'other';
        $child               = new Node(false, $childConf);
        
        $filterShareConf->childListAdd($child);
        
        return $filterShareConf;
    }
}

?>