<?php
/**
 * @author Nicolas Cantu
 * @category Sample
 * @package  Framework
 * @copyright 2016 InSTRiiT SAS
 * @license GNU General Public License, version 3
 * @since 0.0 Init
 * @uses Request for Request management
 * @uses Token for Token management
 * @uses Conf for Conf management
 * @uses Filter for Filter management
 * @uses Attribut for Attribut management
 * @uses Relationship for Relationship management
 * @uses Node for Node management
 * @version 0.0
 *
 */

/**
 * Response management
 */
class Response extends Node {

    CONST CONF_FILE = 'page.json';

    CONST CONF_VERSION = 'v0.0';

    CONST LIB_DIR = 'lib/';

    CONST LIB_EXT = '.php';

    protected $confFile = self::CONF_FILE;

    protected $buildState = false;

    protected $requireList = false;

    protected $service = false;

    protected $token = false;

    protected $profilList = false;

    protected $microserviceAddList = false;

    protected $microserviceCallList = false;

    private $response;

    public function __construct($setUp = false, $confFile = self::CONF_FILE, $confVersion = self::CONF_VERSION) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $setUp);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $confFile);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $confVersion);
        
        parent::__construct(true, Conf::CONF_FILE, Conf::CONF_VERSION);
        $listFunctionList[] = 'listBuild';
        parent::__construct(true, $confFile, $confVersion);
        $this->buildRequireList();
        
        Trace::end(__LINE__, __METHOD__, __CLASS__);
    }

    public function build($buildState = true) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::start(__LINE__, __METHOD__, __CLASS__, $buildState);
        
        $this->buildState = $buildState;
        
        $this->buildTokenStatic();
        $this->buildFilterStatic();
        $this->buildRequireList();
        $this->buildService();
        $this->buildToken();
        $this->buildProfilList();
        
        return Trace::endOK(__LINE__, __METHOD__, __CLASS__);
    }

    public function buildRelationship($buildState = true) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::start(__LINE__, __METHOD__, __CLASS__, $buildState);
        
        $this->buildState = $buildState;
        
        return Trace::endOK(__LINE__, __METHOD__, __CLASS__);
    }

    public function run() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $res = $this->build();
        $res = $this->buildRelationship();
        
        $this->response = new stdClass();
        $this->response->principal = new stdClass();
        $this->response->principal->code = '000';
        $this->response->principal->msg = '';
        $this->response->secondary = new stdClass();
        $this->response->secondary->code = '000';
        $this->response->secondary->msg = '';
        $this->response->securityLevel = 0;
        $this->response->status = $res;
        
        echo json_encode($this, JSON_PRETTY_PRINT);
        
        return Trace::endOK(__LINE__, __METHOD__, __CLASS__);
    }

    protected function listBuild($listName, $conf, $name = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $listName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $conf);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $name);
        
        $func = 'build' . ucfirst($listName);
        
        foreach ( $conf->$listName as $key => $detailList ) {
            
            $node = $this->$func($detailList, $key);
            
            $conf->childListListAdd($node);
        }
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $conf);
    }

    private function buildTokenStatic() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $res = new Token(true);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    private function buildFilterStatic() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $res = new Filter(true);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    private function buildProfilList($labelName = 'Profil') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        foreach ( $this->profilList as $profil ) {
            
            $node = $this->buildProfil($profil);
            
            $this->profilListListAdd($node);
        }
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function buildProfil($profil, $labelName = 'Profil') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = new Node(false);
        $node->labelName = $labelName;
        $node->publicId = $profil->publicId;
        $node->title = $profil->title;
        $node->name = $profil->name;
        $node->nameFull = $profil->nameFull;
        $node->surname = $profil->surname;
        $node->email = $profil->email;
        $node->mdp = $profil->mdp;
        $node->mdpConfirm = $profil->mdpConfirm;
        $node->category = $profil->category;
        $node->nodeName = $profil->nodeName;
        $node->lang = $profil->lang;
        $node->descriptionLong = $profil->descriptionLong;
        $node->descriptionShort = $profil->descriptionShort;
        $node->auditState = $profil->auditState;
        $node->detailState = $profil->detailState;
        $node->childPaginationState = $profil->childPaginationState;
        $node->listActionState = $profil->listActionState;
        $node->showConf = $profil->showConf;
        $node->accessMode = $profil->accessMode;
        $node->versionConfDefault = $profil->versionConfDefault;
        $node->themeDefault = $profil->themeDefault;
        $node->semanticDefault = $profil->semanticDefault;
        $node->domainDefault = $profil->domainDefault;
        $node->avantageConfDefault = $profil->avantageConfDefault;
        $node->keywordListValue = $profil->keywordListValue;
        $node->editableState = $profil->editableState;
        $node->childEditableState = $profil->childEditableState;
        $node->childDetailState = $profil->childDetailState;
        $node->favoriteActionState = $profil->favoriteActionState;
        $node->loveActionState = $profil->loveActionState;
        $node->followActionState = $profil->followActionState;
        $node->shareActionState = $profil->shareActionState;
        $node->shareInternActionState = $profil->shareInternActionState;
        $node->pdfActionState = $profil->pdfActionState;
        $node->printActionState = $profil->printActionState;
        $node = $this->avantageListListBuild($node);
        $node = $this->notificationListListBuild($node);
        $node = $this->contactListListBuild($node);
        $node = $this->recommandationListListBuild($node);
        $node = $this->recommandationByListListBuild($node);
        $node = $this->portfolioListListBuild($node);
        $node->setUp();
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildPortfolio($detailList, $key = 0, $labelName = 'RecommandationBy') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detailList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($detailList, $labelName, $key);
        $node = $this->profilListListBuild($labelName);
        $node = $this->microserviceAddListListBuild($labelName);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildRecommandationBy($detailList, $key = 0, $labelName = 'RecommandationBy') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detailList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($detailList, $labelName, $key);
        $node = $this->profilListListBuild($labelName);
        $node = $this->microserviceAddListListBuild($labelName);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildRecommandation($detailList, $key = 0, $labelName = 'Recommandation') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detailList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($detailList, $labelName, $key);
        $node = $this->profilListListBuild($labelName);
        $node = $this->microserviceAddListListBuild($labelName);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildContact($detaiList, $key = 0, $labelName = 'Contact') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detaiList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($detaiList, $labelName, $key);
        $node->name = $detaiList->name;
        $node->nameFull = $detaiList->nameFull;
        $node->surname = $detaiList->surname;
        $node->email = $detaiList->email;
        $node = $this->microserviceAddListListBuild($node);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildNotification($detaiList, $key = 0, $labelName = 'Notification') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detaiList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($detaiList, $labelName, $key);
        $node = $this->profilListListBuild($node);
        $node = $this->microserviceAddListListBuild($node);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildMicroserviceAdd($detailList, $key = 0, $labelName = 'MicroserviceAdd') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detailList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($this->token, $labelName, $key);
        $node->notificationSetStateAccept = $detailList->notificationSetStateAccept;
        $node->notificationSetStateAccept = $detailList->notificationSetStateAccept;
        $node->buttonTitle = $detailList->buttonTitle;
        $filter = $detailList->filter;
        $node->filter = Filter::$$filter;
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildWorkflow($detailList, $key = 0, $labelName = 'Workflow') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detailList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = new Node(false);
        $node->labelName = $labelName;
        $node->order = $key;
        $node->contactManagement = $detailList->contactManagement;
        $node->nodeName = $detailList->nodeName;
        $node->typeList = $detailList->typeList;
        $node->accessMode = $detailList->accessMode;
        $node->expireTimeStamp = $detailList->expireTimeStamp;
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildToken($labelName = 'Token', $profilLabelName = 'Profil', $avantageLabelName = 'avantage') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $profilLabelName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $avantageLabelName);
        
        $context = $this->buildContext();
        $profil = $this->buildProfil($this->token->profil);
        $node = $this->buildInit($this->token, $labelName);
        
        $node->childListListAdd($context);
        $node->childListListAdd($profil);
        
        $this->token = $node;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function buildContext($labelName = 'Context') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($this->token->context, $labelName);
        
        $node->setUp();
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildAvantage($detaiList, $key = 0, $labelName = 'Avantage') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detaiList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($detaiList, $labelName, $key);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }

    private function buildService($labelName = 'Service') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $node = $this->buildInit($this->service, $labelName);
        $this->service = $node;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function buildRequireList() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        foreach ( $this->requireList as $version => $requireList ) {
            
            foreach ( $requireList as $key => $require ) {
                
                $this->buildRequire($version, $key, $requireList);
            }
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function buildRequire($version, $key, $libName, $labelName = 'Require') {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $version);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $libName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        
        $file = self::LIB_DIR . $version . '/' . $libName . self::LIB_EXT;
        $node = new Node(false);
        $node->nodeName = $libName;
        $node->labelName = $labelName;
        $node->versionConf = $version;
        $node->order = $key;
        
        if (is_file($file) === true) {
            
            $node->state = false;
            $this->requireList[$key] = $node;
            
            return false;
        }
        $node->state = true;
        $this->requireList[$key] = $node;
        
        require_once $file;
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    private function buildInit($detaiList, $labelName, $key = 0) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $detaiList);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $labelName);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $key);
        
        $node = new Node(false);
        $node->labelName = $labelName;
        $node->order = $key;
        $node->nodeName = $detaiList->nodeName;
        $node->publicId = $detaiList->publicId;
        $node->title = $detaiList->title;
        $node->text = $detaiList->text;
        $node->showConf = $detaiList->showConf;
        $node->accessMode = $detaiList->accessMode;
        $node->lang = $detaiList->lang;
        $node->versionConf = $detaiList->versionConf;
        $node->credit = $detaiList->credit;
        $node->category = $detaiList->category;
        $node->keywordList = $detaiList->keywordList;
        $node->descriptionLongValue = $detaiList->descriptionLongValue;
        $node->descriptionShortValue = $detaiList->descriptionShortValue;
        $node->domain = $detaiList->domain;
        $node->typeList = $detaiList->typeList;
        $node->expireTimeStamp = $detaiList->expireTimeStamp;
        $node->text = $detaiList->text;
        $node->auditState = $detaiList->auditState;
        $node->childPaginationState = $detaiList->childPaginationState;
        $node->childEditableState = $detaiList->childEditableState;
        $node->childDetailState = $detaiList->childDetailState;
        $node->favoriteActionState = $detaiList->favoriteActionState;
        $node->loveActionState = $detaiList->loveActionState;
        $node->followActionState = $detaiList->followActionState;
        $node->shareActionState = $detaiList->shareActionState;
        $node->shareInternActionState = $detaiList->shareInternActionState;
        $node->pdfActionState = $detaiList->pdfActionState;
        $node->printActionState = $detaiList->printActionState;
        $node->listActionState = $detaiList->listActionState;
        $node = $this->buildWorkflowList($node);
        $profil = $this->buildProfil($node);
        
        $node->childListListAdd($profil);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $node);
    }
}

?>