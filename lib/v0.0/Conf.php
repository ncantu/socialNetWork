<?php
class Conf {

    CONST CONF_FILE = 'conf/node.json';

    protected $listFunctionList = array(
            'ListAdd',
            'ListRemove',
            'ListUpdate',
            'ListClean',
            'ListExist',
            'ListGet',
            'ListSet');

    protected $confFile = self::CONF_FILE;

    /**
     *
     * @var string[] The list of the Traits required
     */
    protected $traitNameList = array();

    /**
     *
     * @var string[] The list of the Class required
     */
    protected $classNameList = array(
            'Attribut',
            'Relationship',
            'Filter');

    public $publicId;

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

    public function setUp() {

        $content = file_get_contents($this->confFile);
        $confDefault = json_decode($content);
        
        $this->merge($confDefault);
        
        $this->getId();
        $this->reqConf();
        
        return true;
    }

    private function req($lib) {

        $file = 'lib' . DIRECTORY_SEPARATOR . $lib . '.php';
        
        if (is_file($file) === false) {
            
            return false;
        }
        require_once $file;
        
        return true;
    }

    private function reqConf() {

        foreach ( $this->traitNameList as $toolName ) {
            
            $this->req($toolName);
        }
        foreach ( $this->classNameList as $attibutName ) {
            
            $this->req($attibutName);
            
            $this->$attibutName = null;
        }
        return true;
    }

    public function __set($name, $value) {

        if (isset($this->attributList->$name) === false) {
            
            return false;
        }
        $this->attributList->$name = new Attribut($name, $value);
        
        return true;
    }

    public function __get($name) {

        if (isset($this->attributList->$name) === false) {
            
            return false;
        }
        $this->attributList->$name->get();
        
        return true;
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

    /**
     *
     * @var \Node[] The list of any comptaible versions in relationships with this node
     */
    public function getId() {

        $id = $this->publicId;
        
        if (empty($id) === true || $id === false) {
            
            $this->publicId = $this->labelName . '_' . $this->nodeName;
        }
        return $this->publicId;
    }

    private function merge($conf) {

        foreach ( $this as $k => $v ) {
            
            if (isset($conf->$k) === true) {
                
                $this->$k = $conf->$k;
            }
        }
        return true;
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