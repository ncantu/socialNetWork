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

    public function buttonAdd($title, $nodeName, $filter) {

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
        
        return $this->childAddListListAdd($button);
    }

    private function buildTokenStatic() {

        return new Token(true);
    }

    private function buildFilterStatic() {

        return new Filter(true);
    }

    private function buildProfilList($labelName = 'Profil') {

        foreach ( $this->profilList as $profil ) {
            
            // @todo create buildProdil()
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
            $node = $this->buildAvantageList($node);
            
            // @todo
            $todo = '
                  "notificationList": {
                    "contactAdd": {
                      "publicId": "sdfsdfsdfkdsdsdjsdgn",
                      "title": "Demande d\'ajout de contact",
                      "text": "Demande d\'ajout de contact",
                      "typeList": [
                        "contact",
                        "add"
                      ],
                      "showConf": "showVisible",
                      "accessMode": "stateSet",
                      "nodeName": "contactAdd1",
                      "labelName": "Notification",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "contactManagement",
                            "toRead",
                            "contact",
                            "add"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": false
                        }
                      },
                      "profil": {
                        "publicId": "sdfkdsdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      },
                      "microserviceAddList": {
                        "notificationSetStateAccept": {
                          "buttonTitle": "Accept",
                          "nodeName": "notification",
                          "filter": "publicId"
                        },
                        "notificationSetStateRefuse": {
                          "buttonTitle": "Refuse",
                          "nodeName": "notification",
                          "filter": "publicId"
                        }
                      }
                    },
                    "contactAccepted": {
                      "publicId": "sdfsdfsdfkdsdsdjsdgn",
                      "title": "Demande d\'ajout acceptée",
                      "text": "Demande d
            \'ajout acceptée",
                      "typeList": [
                        "contact",
                        "accepted"
                      ],
                      "showConf": "showVisible",
                      "accessMode": "read",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "contactManagement",
                            "toRead",
                            "contact",
                            "accepted"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": 116515616515
                        }
                      },
                      "nodeName": "contactAccepted1",
                      "labelName": "Notification",
                      "profil": {
                        "publicId": "sdfkdsdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      }
                    },
                    "recommandationAdd": {
                      "publicId": "qsdqd6300sdsdf",
                      "title": "Demande de recommandation",
                      "text": "Demande de recommandation",
                      "typeList": [
                        "recommandation",
                        "add"
                      ],
                      "showConf": "showVisible",
                      "accessMode": "stateSet",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "recommandationManagement",
                            "toRead",
                            "recommandation",
                            "add"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": false
                        }
                      },
                      "nodeName": "recommandationAdd1",
                      "labelName": "Notification",
                      "profil": {
                        "publicId": "sdfkdsdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      },
                      "microserviceAddList": {
                        "notificationSetStateAccept": {
                          "buttonTitle": "Accept",
                          "nodeName": "notification",
                          "filter": "publicId"
                        },
                        "notificationSetStateRefuse": {
                          "buttonTitle": "Refuse",
                          "nodeName": "notification",
                          "filter": "publicId"
                        }
                      }
                    },
                    "recommandationAccepted": {
                      "publicId": "sdfsdfsdsdfsdffkdsdsdjsdgn",
                      "title": "Demande de recommandation acceptée",
                      "text": "Demande de recommandation acceptée",
                      "typeList": [
                        "recommandation",
                        "accepted"
                      ],
                      "showConf": "showVisible",
                      "accessMode": "read",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "recommandationManagement",
                            "toRead",
                            "recommandation",
                            "accepted"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": 116515616515
                        }
                      },
                      "nodeName": "recommandationAccepted",
                      "labelName": "Notification",
                      "profil": {
                        "publicId": "sdfkdsdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      }
                    },
                    "recommandationAdded": {
                      "publicId": "sdfsdfsdsdfsdffkdsdsdjsdgn",
                      "title": "Nouvelle recommandation de votre contact",
                      "text": "Nouvelle recommandation de votre contact",
                      "typeList": [
                        "recommandation",
                        "added"
                      ],
                      "showConf": "showVisible",
                      "accessMode": "read",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "recommandationManagement",
                            "toRead",
                            "recommandation",
                            "added"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": 116515616515
                        }
                      },
                      "nodeName": "recommandationAdded",
                      "labelName": "Notification",
                      "profil": {
                        "publicId": "sdfkdsdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      },
                      "profilList": {
                        "profil": {
                          "publicId": "sdfkdsdsdjsdgn",
                          "title": "Experte psycho",
                          "name": "Cantu",
                          "nameFull": "Nicole Cantu",
                          "surname": "Nicole",
                          "email": "li_ni_2@yahoo.fr",
                          "category": "plombier",
                          "nodeName": "li_ni_2@yahoo.fr",
                          "labelName": "Profil",
                          "lang": "FR",
                          "descriptionLong": "",
                          "descriptionShort": "",
                          "auditState": false,
                          "editableState": false,
                          "detailState": false,
                          "childPaginationState": false,
                          "childEditableState": false,
                          "childDetailState": true,
                          "favoriteActionState": true,
                          "loveActionState": true,
                          "followActionState": true,
                          "shareActionState": true,
                          "shareInternActionState": true,
                          "pdfActionState": true,
                          "printActionState": true,
                          "listActionState": false,
                          "showConf": "showVisible",
                          "accessMode": "read"
                        }
                      }
                    },
                    "portfollioUpdated": {
                      "typeList": [
                        "portfollio",
                        "updated"
                      ],
                      "publicId": "sdfqsdsdfsdsdfsdffkdsdsdjsdgn",
                      "title": "Travail avec Nicolas Cantu",
                      "text": "Travail avec Nicolas Cantu",
                      "showConf": "showVisible",
                      "accessMode": "read",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "portfolioManagement",
                            "toRead",
                            "portfollio",
                            "updated"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": 116515616515
                        }
                      },
                      "nodeName": "TravailAvecNicolasCantu",
                      "labelName": "PortFolio",
                      "profil": {
                        "publicId": "sdfkdssdsdfdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      }
                    },
                    "avantagePush": {
                      "typeList": [
                        "avantage",
                        "push"
                      ],
                      "publicId": "sdfqsdsdfsdsdsdfsdffsdffkdsdsdjsdgn",
                      "title": "Vous êtes un professionnel et vous souhaitez être recommandé?",
                      "text": "Vous êtes un professionnel et vous souhaitez être recommandé?",
                      "showConf": "showVisible",
                      "accessMode": "read",
                      "workflowList": {
                        "contactManagement": {
                          "nodeName": "toRead",
                          "typeList": [
                            "avantageManagement",
                            "toRead",
                            "avantage",
                            "push"
                          ],
                          "labelName": "workflow",
                          "accessMode": "stateSet",
                          "expireTimeStamp": 116515616515
                        }
                      },
                      "nodeName": "avantagePush1",
                      "labelName": "avantage",
                      "microserviceAddList": {
                        "avantageSetStateAccept": {
                          "buttonTitle": "Commander le pack 10 recommandations",
                          "nodeName": "avantage10",
                          "filter": "publicId"
                        },
                        "notificationSetStateRefuse": {
                          "buttonTitle": "Commander le pack 20 recommandations",
                          "nodeName": "avantage20",
                          "filter": "publicId"
                        }
                      }
                    }
                  },
                  "contactList": {
                    "profil": {
                      "publicId": "sdfkdssdsdfdsdjsdgn",
                      "title": "Experte psycho",
                      "name": "Cantu",
                      "nameFull": "Nicole Cantu",
                      "surname": "Nicole",
                      "email": "li_ni_2@yahoo.fr",
                      "category": false,
                      "nodeName": "li_ni_2@yahoo.fr",
                      "labelName": "Profil",
                      "lang": "FR",
                      "descriptionLong": "",
                      "descriptionShort": "",
                      "auditState": false,
                      "editableState": false,
                      "detailState": false,
                      "childPaginationState": false,
                      "childEditableState": false,
                      "childDetailState": true,
                      "favoriteActionState": true,
                      "loveActionState": true,
                      "followActionState": true,
                      "shareActionState": true,
                      "shareInternActionState": true,
                      "pdfActionState": true,
                      "printActionState": true,
                      "listActionState": false,
                      "showConf": "showVisible",
                      "accessMode": "read"
                    },
                    "microserviceAddList": {
                      "portfolioEdit": {
                        "buttonTitle": "Mettre à jour",
                        "nodeName": "profilEdit",
                        "filter": "publicId"
                      }
                    }
                  },
                  "recommandationList": {
                    "fsdfsdf4": {
                      "publicId": "sdfsdfsdsdfsdffkdsdsdjsdgn",
                      "title": "Nouvelle recommandation de votre contact",
                      "text": "Nouvelle recommandation de votre contact",
                      "showConf": "showVisible",
                      "accessMode": "edit",
                      "workflowList": {
                        "portfolioManagement": {
                          "nodeName": "toEdit",
                          "typeList": [
                            "recommandationManagement",
                            "toEdit",
                            "recommandation",
                            "edit"
                          ],
                          "labelName": "workflow",
                          "accessMode": "edit",
                          "expireTimeStamp": 116515616515
                        }
                      },
                      "nodeName": "recommandationAdded",
                      "labelName": "Notification",
                      "profil": {
                        "publicId": "sdfkdsdsdjsdgn",
                        "title": "Experte psycho",
                        "name": "Cantu",
                        "nameFull": "Nicole Cantu",
                        "surname": "Nicole",
                        "email": "li_ni_2@yahoo.fr",
                        "category": false,
                        "nodeName": "li_ni_2@yahoo.fr",
                        "labelName": "Profil",
                        "lang": "FR",
                        "descriptionLong": "",
                        "descriptionShort": "",
                        "auditState": false,
                        "editableState": false,
                        "detailState": false,
                        "childPaginationState": false,
                        "childEditableState": false,
                        "childDetailState": true,
                        "favoriteActionState": true,
                        "loveActionState": true,
                        "followActionState": true,
                        "shareActionState": true,
                        "shareInternActionState": true,
                        "pdfActionState": true,
                        "printActionState": true,
                        "listActionState": false,
                        "showConf": "showVisible",
                        "accessMode": "read"
                      },
                      "profilList": {
                        "profil": {
                          "publicId": "sdfkdsdsdjsdgn",
                          "title": "Experte psycho",
                          "name": "Cantu",
                          "nameFull": "Nicole Cantu",
                          "surname": "Nicole",
                          "email": "li_ni_2@yahoo.fr",
                          "category": "plombier",
                          "nodeName": "li_ni_2@yahoo.fr",
                          "labelName": "Profil",
                          "lang": "FR",
                          "descriptionLong": "",
                          "descriptionShort": "",
                          "auditState": false,
                          "editableState": false,
                          "detailState": false,
                          "childPaginationState": false,
                          "childEditableState": false,
                          "childDetailState": true,
                          "favoriteActionState": true,
                          "loveActionState": true,
                          "followActionState": true,
                          "shareActionState": true,
                          "shareInternActionState": true,
                          "pdfActionState": true,
                          "printActionState": true,
                          "listActionState": false,
                          "showConf": "showVisible",
                          "accessMode": "read"
                        }
                      },
                      "microserviceAddList": {
                        "portfolioEdit": {
                          "buttonTitle": "Mettre à jour",
                          "nodeName": "recommandationEdit",
                          "filter": "publicId"
                        }
                      }
                    }
                  },
                  "recommandationByList": {},
                  "portfolioList": {}';
            $node->setUp();
            
            $this->profilListListAdd($node);
        }
        return true;
    }

    private function buildNotificationList($obj) {

        foreach ( $obj->notificationList as $notificationDetailList ) {
            
            $node = $this->buildNotification($notificationDetailList);
            
            $obj->childListListAdd($node);
        }
        return $obj;
    }

    private function buildNotification($notificationDetailList, $labelName = 'Notification') {

        $node = new Node(false);
        $node->publicId = $notificationDetailList->publicId;
        $node->title = $notificationDetailList->title;
        $node->text = $notificationDetailList->text;
        $node->typeList = $notificationDetailList->typeList;
        $node->showConf = $notificationDetailList->showConf;
        $node->accessMode = $notificationDetailList->accessMode;
        $node->nodeName = $notificationDetailList->nodeName;
        $node = $this->buildWorkflowList($node);
        
        // @todo
        $todo = '
        $node->microserviceAddList": {
        $node->notificationSetStateAccept": {
        $node->buttonTitle": "Accept",
        $node->nodeName": "notification",
        $node->filter": "publicId"
        }';
        
        return $node;
    }

    private function buildWorkflowList($obj) {

        foreach ( $obj->workflowList as $workflowDetailList ) {
            
            $node = $this->buildWorkflow($workflowDetailList);
            
            $obj->childListListAdd($node);
        }
        return $obj;
    }

    private function buildWorkflow($workflowDetailList, $labelName = 'Workflow') {
        
        // @todo
        $todo = '
                 $node->workflowList": {
        $node->contactManagement": {
        $node->nodeName": "toRead",
        $node->typeList": [
                "contactManagement",
                "toRead",
                "contact",
                "add"
        ],
                        $node->labelName": "workflow",
        $node->accessMode": "stateSet",
        $node->expireTimeStamp": false
        ';
        
        return $node;
    }

    private function buildToken($labelName = 'Token', $contextLabelName = 'Context', $profilLabelName = 'Profil', $avantageLabelName = 'avantage') {
        
        // @todo create buildContext()
        $context = new Node(false);
        $context->keywordList = $this->token->context->keywordList;
        $context->descriptionLongValue = $this->token->context->descriptionLongValue;
        $context->labelName = $contextLabelName;
        $context->descriptionShortValue = $this->token->context->descriptionShortValue;
        $context->title = $this->token->context->title;
        $context->lang = $this->token->context->lang;
        $context->version = $this->token->context->version;
        $context->domain = $this->token->context->domain;
        $context->setUp();
        
        // @todo call buildProfil()
        $profil = new Node(false);
        $profil->nameFull = $this->token->profil->nameFull;
        $profil->title = $this->token->profil->title;
        $profil->publicId = $this->token->profil->publicId;
        $profil->name = $this->token->profil->name;
        $profil->surname = $this->token->profil->surname;
        $profil->email = $this->token->profil->email;
        $profil->nodeName = $this->token->profil->nodeName;
        $profil->connectedStatus = $this->token->profil->connectedStatus;
        $profil->labelName = $profilLabelName;
        $profil = $this->buildAvantageList($profil);
        
        $node = new Node(false);
        $node->nodeName = $this->token->domain;
        $node->labelName = $labelName;
        $node->lang = $this->token->lang;
        $node->versionConf = $this->token->versionConf;
        
        $node->childListListAdd($context);
        $node->childListListAdd($profil);
        
        $this->token = $node;
        
        return true;
    }

    private function buildAvantageList($obj) {

        foreach ( $obj->avantageList as $avantageDetailList ) {
            
            $avantage = $this->buildAvantage($avantageDetailList);
            
            $obj->childListListAdd($avantage);
        }
        return $obj;
    }

    private function buildAvantage($avantageDetailList, $labelName = 'Avantage') {

        $node = new Node(false);
        $node->title = $avantageDetailList->title;
        $node->publicId = $avantageDetailList->publicId;
        $node->nodeName = $avantageDetailList->nodeName;
        $node->labelName = $labelName;
        $node->credit = $avantageDetailList->credit;
        
        if (isset($avantageDetailList->categogy) === true) {
            
            $node->category = $avantageDetailList->categogy;
        }
        return $node;
    }

    private function buildService($labelName = 'Service') {

        $node = new Node(false);
        $node->nodeName = $this->service->domain;
        $node->labelName = $labelName;
        $node->lang = $this->service->lang;
        $node->versionConf = $this->service->versionConf;
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
}

?>