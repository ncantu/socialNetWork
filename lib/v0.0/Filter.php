<?php
class Filter extends Node {

    public static $me;

    public static $share;

    public function __construct($setUp = false) {

        parent::__construct($setUp);
        
        if ($setUp === true) {
            
            $this->setUp();
        }
    }

    public function setUp() {

        self::$me = self::meGet();
        self::$share = self::shareGet();
    }

    public static function meGet() {

        $filter = new Filter(true);
        $filter->nodeName = 'list';
        
        $filter->accessModeListListAdd('write');
        
        $child = new Node(true);
        $child->nodeName = 'user';
        $child->value = Token::$profil->userPublicId;
        
        $filter->childListListAdd($child);
        
        $filter->accessModeListListAdd('stateUpdate');
        
        return $filter;
    }

    public static function shareGet() {

        $filter = self::filterMeGet();
        
        $filter->accessModeListListAdd('read');
        
        $child = new Node(true);
        $child->nodeName = 'share';
        $child->value = 'other';
        
        $filter->childListListAdd($child);
        
        $child = new Node(true);
        $child->nodeName = 'public';
        $child->value = 'other';
        
        $filter->childListListAdd($child);
        
        return $filter;
    }
}

?>