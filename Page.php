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
 * @uses Node for Node management
 * @version 0.0
 *
 */

/**
 * Page management
 */
class Page extends Node {

    CONST CONF_FILE = 'conf/page.json';

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

    public function __construct($setUp = false, $confFile = false) {

        parent::__construct(true, Conf::CONF_FILE);
        $listFunctionList[] = 'listBuild';
        parent::__construct(true);
        $this->buildRequireList();
    }

    public function build($buildState = true) {

        $this->buildState = $buildState;
        
        $this->buildTokenStatic();
        $this->buildFilterStatic();
        $this->buildRequireList();
        $this->buildService();
        $this->buildToken();
        $this->buildProfilList();
        
        return true;
    }

    protected function listBuild($listName, $conf, $name = false) {

        $func = 'build' . ucfirst($listName);
        
        foreach ( $conf->$listName as $key => $detailList ) {
            
            $node = $this->$func($detailList, $key);
            
            $conf->childListListAdd($node);
        }
        return $conf;
    }

    private function buildTokenStatic() {

        return new Token(true);
    }

    private function buildFilterStatic() {

        return new Filter(true);
    }

    private function buildProfilList($labelName = 'Profil') {

        foreach ( $this->profilList as $profil ) {
            
            $node = $this->buildProfil($profil);
            
            $this->profilListListAdd($node);
        }
        return true;
    }

    private function buildProfil($profil, $labelName = 'Profil') {

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
        
        return $node;
    }

    private function buildPortfolio($detailList, $key = 0, $labelName = 'RecommandationBy') {

        $node = $this->buildInit($detailList, $labelName, $key);
        $node = $this->profilListListBuild($labelName);
        $node = $this->microserviceAddListListBuild($labelName);
        
        return $node;
    }

    private function buildRecommandationBy($detailList, $key = 0, $labelName = 'RecommandationBy') {

        $node = $this->buildInit($detailList, $labelName, $key);
        $node = $this->profilListListBuild($labelName);
        $node = $this->microserviceAddListListBuild($labelName);
        
        return $node;
    }

    private function buildRecommandation($detailList, $key = 0, $labelName = 'Recommandation') {

        $node = $this->buildInit($detailList, $labelName, $key);
        $node = $this->profilListListBuild($labelName);
        $node = $this->microserviceAddListListBuild($labelName);
        
        return $node;
    }

    private function buildContact($detaiList, $key = 0, $labelName = 'Contact') {

        $node = $this->buildInit($detaiList, $labelName, $key);
        $node->name = $detaiList->name;
        $node->nameFull = $detaiList->nameFull;
        $node->surname = $detaiList->surname;
        $node->email = $detaiList->email;
        $node = $this->microserviceAddListListBuild($node);
        
        return $node;
    }

    private function buildNotification($detaiList, $key = 0, $labelName = 'Notification') {

        $node = $this->buildInit($detaiList, $labelName, $key);
        $node = $this->profilListListBuild($node);
        $node = $this->microserviceAddListListBuild($node);
        
        return $node;
    }

    private function buildMicroserviceAdd($detailList, $key = 0, $labelName = 'MicroserviceAdd') {

        $node = $this->buildInit($this->token, $labelName, $key);
        $node->notificationSetStateAccept = $detailList->notificationSetStateAccept;
        $node->notificationSetStateAccept = $detailList->notificationSetStateAccept;
        $node->buttonTitle = $detailList->buttonTitle;
        $filter = $detailList->filter;
        $node->filter = Filter::$$filter;
        
        return $node;
    }

    private function buildWorkflow($detailList, $key = 0, $labelName = 'Workflow') {

        $node = new Node(false);
        $node->labelName = $labelName;
        $node->order = $key;
        $node->contactManagement = $detailList->contactManagement;
        $node->nodeName = $detailList->nodeName;
        $node->typeList = $detailList->typeList;
        $node->accessMode = $detailList->accessMode;
        $node->expireTimeStamp = $detailList->expireTimeStamp;
        
        return $node;
    }

    private function buildToken($labelName = 'Token', $profilLabelName = 'Profil', $avantageLabelName = 'avantage') {

        $context = $this->buildContext();
        $profil = $this->buildProfil($this->token->profil);
        $node = $this->buildInit($this->token, $labelName);
        
        $node->childListListAdd($context);
        $node->childListListAdd($profil);
        
        $this->token = $node;
        
        return true;
    }

    private function buildContext($labelName = 'Context') {

        $node = $this->buildInit($this->token->context, $labelName);
        $node->setUp();
        
        return $node;
    }

    private function buildAvantage($detaiList, $key = 0, $labelName = 'Avantage') {

        $node = $this->buildInit($detaiList, $labelName, $key);
        return $node;
    }

    private function buildService($labelName = 'Service') {

        $node = $this->buildInit($this->service, $labelName);
        $this->service = $node;
        
        return true;
    }

    private function buildRequireList() {

        foreach ( $this->requireList as $version => $requireList ) {
            
            foreach ( $requireList as $key => $require ) {
                
                $this->buildRequire($version, $key, $requireList);
            }
        }
        return true;
    }

    private function buildRequire($version, $key, $libName, $labelName = 'Require') {

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
        
        return true;
    }

    private function buildInit($detaiList, $labelName, $key = 0) {

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
        
        return $node;
    }
}

?>