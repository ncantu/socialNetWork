<?php
class Conf {

    private static $main;

    private static $node;

    private $listFunctionList = array(
            'ListAdd',
            'ListRemove',
            'ListUpdate',
            'ListClean',
            'ListExist',
            'ListGet',
            'ListSet');

    private $confFile = 'conf/node.json';

    public $attributList = false;

    public $actionList = false;

    public $emotionList = false;

    public function __construct($setUp = false, $confFile = false) {

        foreach ( $this as $k => $v ) {
            
            if (strstr($k, 'List') !== false && $v === false) {
                
                $this->$k = new stdClass();
            }
        }
        if ($confFile !== false) {
            
            $this->confFile = $confFile;
        }
        if ($setUp === true) {
            
            $this->setUp();
        }
    }
    // attributListListAddValue(array('toto'), true, false, 'title')
    public function __call($name, $argumentList = array()) {

        foreach ( $this as $k => $v ) {
            
            if (strstr($name, $k) !== false) {
                
                $name = str_replace($k, '', $name);
                
                foreach ( $this->listFunctionList as $listFunction ) {
                    
                    if (strstr($name, $listFunction) !== false) {
                        
                        $name = str_replace($listFunction, '', $name);
                        $conf = false;
                        
                        if ($listFunction === 'ListSet' || $listFunction === 'ListUpdate' || $listFunction === 'ListAdd') {
                            
                            $conf = $argumentList[0];
                        }
                        $k = lcfirst($k);
                        
                        return $this->$listFunction($k, $conf, $name);
                    }
                }
            }
        }
        return false;
    }
    // attributListListAddValue(array('toto'), true, false)
    public function __callstatic($name, $argumentList = array()) {

        $obj = new self(true);
        $obj->__call($name, $argumentList);
        
        return $obj;
    }

    public function setUp() {

        $content = file_get_contents($this->confFile);
        Node::$confDefault = json_decode($content);
        
        $this->merge(Node::$confDefault);
        
        self::$main = self::mainGet();
        
        $this->merge(self::$main);
        
        return true;
    }

    private function merge($conf) {

        foreach ( $this as $k => $v ) {
            
            if (isset($conf->$k) === true) {
                
                $this->$k = $conf->$k;
            }
        }
        return true;
    }

    private static function mainGet() {

        $conf = new Conf(true);
        $conf->nodeName = $token::$context->domain;
        $conf->labelName = 'page';
        $conf->title = $token::$context->titleValue;
        $conf->lang = $token::$context->lang;
        $conf->descriptionLong = $token::$context->descriptionLongValue;
        $conf->descriptionShort = $token::$context->descriptionShortValue;
        $conf->keywordListValue = $token::$context->keywordListValue;
        
        return $conf;
    }

    private function attributExist($name) {

        if (isset($this->$name) === false) {
            
            return false;
        }
        return true;
    }

    private function listAdd($listName, $conf, $name = false) {

        $confName = $conf->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === true) {
            
            return false;
        }
        $this->$listName->$confName = $conf;
        
        return true;
    }

    private function listRemove($listName, $conf, $name = false) {

        if (is_object($name) === true) {
            
            $name = $name->name;
        }
        unset($this->$listName->$name);
        
        return true;
    }

    private function listUpdate($listName, $conf, $name = false) {

        $confName = $conf->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === false) {
            
            return false;
        }
        $this->$listName->$confName = $conf;
        
        return true;
    }

    private function listGet($listName, $conf, $name) {

        $confName = $conf->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === false) {
            
            return false;
        }
        return $this->$listName->$confName->$name;
    }

    private function listSet($listName, $obj, $name, $value) {

        $confName = $obj->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === false) {
            
            return false;
        }
        
        if (isset($this->$listName->$confName) === false) {
            
            return false;
        }
        return $this->$listName->$confName->$name = $value;
    }

    private function listExist($listName, $conf, $name) {

        if (isset($this->$listName->$name) === false) {
            
            return false;
        }
        return true;
    }

    private function listClean($listName, $conf = false, $name = false) {

        foreach ( $this->$listName as $obj ) {
            
            $this->listRemove($listName, $obj);
        }
        return true;
    }
}

?>