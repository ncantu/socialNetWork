<?php

/**
 * Node management
 * This is the main object of the framework, iso as a Neo4j node
 *
 * @author Nicolas Cantu
 * @category Core
 * @package  Framework
 * @copyright 2016 InSTRiiT SAS
 * @license GNU General Public License, version 3
 * @since 0.0 Init
 * @uses Attribut for Attribut management
 * @uses Relationship for Relationship management
 * @uses Filter for Filter management
 * @version 0.0
 *
 */

/**
 * Node management
 */
class Node extends Conf {

    /**
     *
     * @var string The nodeName for the audit node in case of a creation context
     */
    CONST AUDIT_CREATE_STEP = 'create';

    /**
     *
     * @var string The nodeName for the audit node in case of an update context
     */
    CONST AUDIT_UPDATE_STEP = 'update';

    /**
     *
     * @var Object Json default configuration
     */
    public static $confDefault;

    /**
     *
     * @var Object Configuration
     */
    public $conf;

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

    /**
     *
     * @var \Node[] The list of any keywords in relationships with this node
     */
    public $keywordListValue = array();

    /**
     *
     * @var \Node[] The list of any keywords in relationships with this node
     */
    public $keywordList = false;

    /**
     *
     * @var Object The list of any filter in relationships with this node
     */
    public $filterList = false;

    /**
     *
     * @var Object The list of any microservice in relationships with this node
     */
    public $microserviceList = false;

    public $childList = false;

    public function setUp() {

        parent::setUp();
        
        $this->reqConf();
        
        $id = $this->getId();
        $this->url = 'http://' . Token::$context->domain . '/' . $id . '.php';
        $this->style = 'http://cdn.' . Token::$context->domain . '/style/' . $id . '.css';
        $this->script = 'http://cdn.' . Token::$context->domain . '/script/' . $id . '.js';
        $this->image = 'http://cdn.' . Token::$context->domain . '/image/' . $id . '.png';
        $this->icon = 'http://cdn.' . Token::$context->domain . '/image/' . $this->labelName . '_icon.png';
        
        foreach ( $this->keywordListValue as $kw ) {
            
            $conf = new stdClass();
            $conf->auditState = false;
            $conf->value = $kw;
            $keyword = new Node(false, $conf);
            
            $this->keywordListAdd($keyword);
        }
        
        return true;
    }

    public function buttonAdd($title, $nodeName, $filter) {

        $filter->nodeName = $nodeName;
        $button = new Node(true);
        $button->title = 'title';
        $button->state = 'state';
        $buttonMicroservice = new Node(true);
        $buttonMicroservice->filterListListAdd($filter);
        
        $button->microserviceListAdd($buttonMicroservice);
        
        return $this->childAddListAdd($button);
    }

    private function childToRelationship($objName, $obj) {

        foreach ( $this->attributList->stepWorkflow as $this->workflowStep ) {
            
            foreach ( $this->workflowStep->valueList as $child ) {
                
                if ($child->labelName === 'Audit') {
                    
                    $relationshipWorkflowStep = $child;
                }
            }
        }
        $relationshipName = $this->nodeName . '_' . $obj->nodeName;
        $relationshipLabelName = strtoupper($objName) . '_TO';
        $relationship = new Relationship($relationshipName, $relationshipLabelName, $this->nodeName, $obj->nodeName, $relationshipWorkflowStep);
        
        return $relationship;
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

    public function audit($step) {

        if ($this->auditState === false) {
            
            return true;
        }
        $workflowStep = $this->auditGet($step, $this);
        
        $this->workflowStepListAdd($workflowStep);
        
        return true;
    }

    public function create() {

        $this->conf();
        
        $this->audit(self::AUDIT_CREATE_STEP);
        
        return $this->publicId;
    }

    private function req($lib) {

        $file = 'lib' . DIRECTORY_SEPARATOR . $lib . '.php';
        
        if (is_file($file) === false) {
            
            return false;
        }
        require_once $file;
        
        return true;
    }

    private function actionAdd($conf, $filterConf, $confirmConf = false) {

        $conf->auditState = false;
        $action = new Node(false, $conf);
        
        if ($confirmConf !== false) {
            
            $confirmConf->auditState = false;
            $confirm = new Node(false, $confirmConf);
            
            $action->childListAdd($confirm);
        }
        $filterConf->auditState = false;
        $filter = new Node(false, $filterConf);
        $microservice = new Node(false, $this);
        
        $microservice->filterListAdd($filter);
        
        $action->microservice = $microservice;
        
        $id = $this->actionListAdd($action);
        
        return $id;
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
}

?>