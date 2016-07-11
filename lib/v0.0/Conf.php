<?php
class Conf {

    CONST DIR = 'conf/';

    CONST VERSION = 'v0.0';

    CONST ENV = 'developpement';

    CONST FILE = 'node.json';

    protected $listFunctionList = array(
            'ListAdd',
            'ListRemove',
            'ListUpdate',
            'ListClean',
            'ListExist',
            'ListGet',
            'ListSet');

    protected $confFile = false;

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

    public function __construct($setUp = false, $confFile = self::FILE, $confVersion = self::VERSION) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $setUp);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $confFile);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $confVersion);
        
        foreach ( $this as $k => $v ) {
            
            if (strstr($k, 'List') !== false && $v === false) {
                
                $this->$k = new stdClass();
            }
        }
        if ($confFile !== false) {
            
            $this->confFile = self::DIR . $confVersion . '/' . $confFile;
        }
        if ($setUp === true) {
            
            $this->setUp();
        }
        Trace::end(__LINE__, __METHOD__, __CLASS__);
    }

    public function setUp() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $content = file_get_contents($this->confFile);
        $confDefault = json_decode($content);
        
        $this->merge($confDefault);
        
        $this->getId();
        $this->reqConf();
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function req($lib) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $lib);
        
        $file = 'lib' . DIRECTORY_SEPARATOR . $lib . '.php';
        
        if (is_file($file) === false) {
            
            return false;
        }
        require_once $file;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function reqConf() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        foreach ( $this->traitNameList as $toolName ) {
            
            $this->req($toolName);
        }
        foreach ( $this->classNameList as $attibutName ) {
            
            $this->req($attibutName);
            
            $this->$attibutName = null;
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function __set($name, $value) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        
        if (isset($this->attributList->$name) === false) {
            
            return false;
        }
        $this->attributList->$name = new Attribut($name, $value);
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function __get($name) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        if (isset($this->attributList->$name) === false) {
            
            return false;
        }
        $this->attributList->$name->get();
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }
    
    // attributListListAddValue(array('toto'), true, false, 'title')
    public function __call($name, $argumentList = array()) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $argumentList);
        
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
                        $res = $this->$listFunction($k, $conf, $name);
                        
                        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
                    }
                }
            }
        }
        return Trace::fatal(__LINE__, __METHOD__, __CLASS__);
    }
    // attributListListAddValue(array('toto'), true, false)
    public static function __callstatic($name, $argumentList = array()) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $argumentList);
        
        $obj = new self(true);
        $obj->__call($name, $argumentList);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $obj);
    }

    /**
     *
     * @var \Node[] The list of any comptaible versions in relationships with this node
     */
    public function getId() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $id = $this->publicId;
        
        if (empty($id) === true || $id === false) {
            
            $this->publicId = $this->labelName . '_' . $this->nodeName;
        }
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $this->publicId);
    }

    private function merge($conf) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        
        foreach ( $this as $k => $v ) {
            
            if (isset($conf->$k) === true) {
                
                $this->$k = $conf->$k;
            }
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function attributExist($name) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        if (isset($this->$name) === false) {
            
            return false;
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function listAdd($listName, $conf, $name = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        $confName = $conf->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === true) {
            
            return false;
        }
        $this->$listName->$confName = $conf;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function listRemove($listName, $conf, $name = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        if (is_object($name) === true) {
            
            $name = $name->name;
        }
        unset($this->$listName->$name);
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function listUpdate($listName, $conf, $name = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        $confName = $conf->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === false) {
            
            return false;
        }
        $this->$listName->$confName = $conf;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function listGet($listName, $conf, $name) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        $confName = $conf->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === false) {
            
            return false;
        }
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $this->$listName->$confName->$name);
    }

    private function listSet($listName, $obj, $name, $value) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $obj);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $value);
        
        $confName = $obj->name;
        $funcExist = $listName . 'ListExist';
        
        if ($this->$funcExist($listName, $confName) === false) {
            
            return false;
        }
        
        if (isset($this->$listName->$confName) === false) {
            
            return false;
        }
        $this->$listName->$confName->$name = $value;
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $value);
    }

    private function listExist($listName, $conf, $name) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        if (isset($this->$listName->$name) === false) {
            
            return false;
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function listClean($listName, $conf = false, $name = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        foreach ( $this->$listName as $obj ) {
            
            $this->listRemove($listName, $obj);
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }
}

?>