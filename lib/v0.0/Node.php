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
     * @var \Node[] The list of any keywords in relationships with this node
     */
    public $keywordValueList = array();

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

    public $accessModeList = array();

    /**
     *
     * @var Object The list of any microservice in relationships with this node
     */
    public $microserviceList = false;

    public $childList = false;

    public $relationshipList = false;

    public $cdnDomain = 'cdn.';

    public function setUp() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        parent::setUp();
        
        $this->url = 'http://' . Token::$context->domain . '/' . $this->publicId . '.php';
        $this->style = 'http://' . $this->cdnDomain . Token::$context->domain . '/style/' . $this->publicId . '.css';
        $this->script = 'http: //' . $this->cdnDomain . Token::$context->domain . '/script/' . $this->publicId . '.js';
        $this->image = 'http://' . $this->cdnDomain . Token::$context->domain . '/image/' . $this->publicId . '.png';
        $this->icon = 'http://' . $this->cdnDomain . Token::$context->domain . '/image/' . $this->labelName . '_icon.png';
        
        foreach ( $this->keywordValueList as $kw ) {
            
            $conf = new stdClass();
            $conf->auditState = false;
            $conf->value = $kw;
            $keyword = new Node(false, $conf);
            
            $this->keywordListAdd($keyword);
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function buttonAdd($title, $nodeName, $filter) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $title);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $nodeName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $filter);
        
        $filter->nodeName = $nodeName;
        $button = new Node(true);
        $button->title = $title;
        $button->state = true;
        $button->nodeName = $nodeName;
        $button->labelName = 'button';
        $buttonMicroservice = new Node(true);
        $buttonMicroservice->nodeName = $nodeName;
        $buttonMicroservice->labelName = 'microservice';
        $buttonMicroservice->filterListListAdd($filter);
        
        $button->microserviceLisListtAdd($buttonMicroservice);
        
        $res = $this->childAddListListAdd($button);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    private function listToRelationshipList($list) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $list);
        
        foreach ( $list as $obj ) {
            
            $relationshipName = $this->nodeName . '_' . $obj->nodeName;
            $relationshipLabelName = strtoupper($obj->labelName) . '_TO';
            $relationship = new Relationship($relationshipName, $relationshipLabelName, $this->nodeName, $obj->nodeName, $obj->attributList);
            
            $this->relationshipListListAdd($relationship);
        }
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }
}

?>