<?php
class Filter extends Node {

    public static $me;

    public static $share;

    public function __construct($setUp = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $setUp);
        
        parent::__construct($setUp);
        
        if ($setUp === true) {
            
            $this->setUp();
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function setUp() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        self::$me = self::meGet();
        self::$share = self::shareGet();
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public static function meGet() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $filter = new Filter(true);
        $filter->nodeName = 'list';
        
        $filter->accessModeListListAdd('write');
        
        $child = new Node(true);
        $child->nodeName = 'user';
        $child->value = Token::$profil->userPublicId;
        
        $filter->childListListAdd($child);
        
        $filter->accessModeListListAdd('stateUpdate');
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $filter);
    }

    public static function shareGet() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
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
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $filter);
    }
}

?>