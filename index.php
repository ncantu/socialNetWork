<?php 

$notificationLive = '';

if (isset($_FILES['uploaded_file'])) {
    // Example:
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], "media/" . $_FILES['uploaded_file']['name'])){
        $notificationLive = $_FILES['uploaded_file']['name']. " uploaded ...";
    } else {
        $notificationLive = $_FILES['uploaded_file']['name']. " NOT uploaded ...";
    }
}

trait TraitHtml {

    public static $htmlMenuNamePrefix          = 'menu_';
    public static $htmlMenuClassPrefix         = 'menu';
    public static $htmlMenuContener            = 'nav';    
    public static $htmlMenuListNamePrefix      = 'menuList_';
    public static $htmlMenuListClassPrefix     = 'menuList pam unstyled';
    public static $htmlMenuListContener        = 'ul';
    public static $htmlMenuItemNamePrefix      = 'menuItem_';
    public static $htmlMenuItemClassPrefix     = 'menuItem';
    public static $htmlMenuItemContener        = 'li';
    public static $htmlFieldNamePrefix         = 'field_';
    public static $htmlFieldClassPrefix        = 'field';
    public static $htmlFieldContener           = 'p';    
    public static $htmlAttributId              = 'id';
    public static $htmlAttributName            = 'name';
    
    public static $htmlAttributClass           = 'class';
    public static $htmlAttributUrl             = 'src';
    public static $htmlAttributValue           = 'value';
    public static $htmlAttributTitle           = 'title';
    public static $htmlAttributClassLabelName  = 'labelName';
    public static $htmlAttributClassNodeName   = 'nodeName';
    public static $htmlAttributClassAccessMode = 'accessMode';
    public static $htmlAttributClassAvantage   = 'avantage';
    public static $htmlAttributClassShow       = 'show';
    
    public static $htmlAccessModeRead          = 'accessModeRead';
    public static $htmlAccessModeUpdate        = 'accessModeUpdate';
    public static $htmlAccessModeCreate        = 'accessModeUpdate';
    public static $htmlAccessModeDelete        = 'accessModeDelete';
    public static $htmlAccessModeAdd           = 'accessModeAdd';
    public static $htmlShowNone                = 'showNone';
    public static $htmlShowVisible             = 'showVisible';
    public static $htmlShowHidden              = 'showHidden';    
    public static $htmlSelfCloserList          = array('input', 'img', 'hr', 'br', 'meta', 'link');
    public static $htmlTitleGetList            = array('img', 'a');
    public static $htmlUrlGetList              = array('img', 'script', 'link');
    public static $htmlValueGetList            = array('input', 'select', 'textara', 'option', 'button');
    public static $htmlClassGetList            = array('p', 'a', 'div', 'input', 'select', 'textara', 'option', 'button', 'img', 'br');
    public static $htmlIdGetList               = array('p', 'a', 'div', 'input', 'select', 'textara', 'option', 'button', 'img', 'br');
    public static $htmlNameGetList             = array('p', 'a', 'div', 'input', 'select', 'textara', 'option', 'button', 'img', 'br');

    public $htmlAccessMode                     = self::$htmlAccessModeRead;
    public $htmlShowState                      = self::$htmlShowNone;
    public $htmlAttributList                   = array();
    public $htmlText                           = '';
    public $htmlLabelName                      = false;
    public $htmlNodeName                       = false;    
    public $htmlRecommandState                 = false;
    public $htmlContactState                   = false;
    public $htmlAvantage                       = false;    
    public $htmlName                           = false;
    public $htmlId                             = false;    
    public $htmlType                           = false;
    public $htmlUrl                            = false;
    public $htmlSponsorshipNb                  = false;
    public $htmlDefault                        = false;
    public $htmlRecommandationNb               = false;
    public $htmlTitleDefault                   = false;
    public $htmlTitle                          = false;
    public $htmlUrlDefault                     = false;
    public $htmlValue                          = false;
    public $htmlTemplateUrl                    = false;
    public $htmlTemplateScriptUrl              = false;
       
    public function htmlFromConf($conf) {
        
        if(isset($conf->lang)             === true) UxComponent::$lang             = $conf->lang;
        if(isset($conf->domain)           === true) UxComponent::$domain           = $conf->domain;
        if(isset($conf->name)             === true) UxComponent::$name             = $conf->name;
        if(isset($conf->descriptionLong)  === true) UxComponent::$descriptionLong  = $conf->descriptionLong;
        if(isset($conf->descriptionShort) === true) UxComponent::$descriptionShort = $conf->descriptionShort;
        if(isset($conf->keyWordList)      === true) UxComponent::$keyWordList      = $conf->keyWordList;
        
        $this->htmlLabelName  = $conf->labelName;
        $this->htmlNodeName   = $conf->nodeName;
        $this->htmlAccessMode = $conf->accessMode;
        $this->htmlShowState  = $conf->show;
        
        if(isset($conf->recommandState) === true)   $this->htmlRecommandState   = $conf->recommandState;
        if(isset($conf->contactState) === true)     $this->htmlContactState     = $conf->contactState;
        if(isset($conf->avantage) === true)         $this->htmlAvantage         = $conf->avantage;        
        if(isset($conf->sponsorshipNb) === true)    $this->htmlSponsorshipNb    = $conf->sponsorshipNb;
        if(isset($conf->recommandationNb) === true) $this->htmlRecommandationNb = $conf->recommandationNb;
        
        if(isset($conf->default) === true) {
            
            $this->htmlAttributList[self::$htmlAttributValue] = $conf->default;
            $this->htmlText                                   = $conf->default;
        }                 
        if(isset($conf->value) === true) {
            
            $this->htmlAttributList[self::$htmlAttributValue] = $conf->value;
            $this->htmlText                                   = $conf->value;
        }        
        if(isset($conf->titleDefault) === true) $this->htmlAttributList[self::$htmlAttributTitle] = $conf->titleDefault;        
        if(isset($conf->title) === true)        $this->htmlAttributList[self::$htmlAttributTitle] = $conf->title;
        if(isset($conf->urlDefault) === true)   $this->htmlAttributList[self::$htmlAttributUrl]   = $conf->urlDefault;        
        if(isset($conf->url) === true)          $this->htmlAttributList[self::$htmlAttributUrl]   = $conf->url;
        
        if(isset($conf->cssContent) === true) {
            
            foreach($conf->cssContent->idList as $k => $detailList) {
                
                $id          = '#'.$k;
                $attributCss = '';
                
                foreach($detailList as $kCss => $vCss) {
                 
                    $attributCss .= "\n".$kCss.' = '.$vCss.';';
                }
                if(isset(UxComponent::$cssContent[$id]) === false) {
                    
                    UxComponent::$cssContent[$id] = '
'.$id.' {
   '.$attributCss.'
}
';              }
            }
            foreach($conf->cssContent->classList as $k => $detailList) {
                
                    $id          = '.'.$k;
                    $attributCss = '';
                    
                    foreach($detailList as $kCss => $vCss) {
                     
                        $attributCss .= "\n".$kCss.' = '.$vCss.';';
                    }
                    if(isset(UxComponent::$cssContent[$id]) === false) {
                        
                        UxComponent::$cssContent[$id] = '
'.$id.' {
   '.$attributCss.'
}
';
                }
            }
        }
        if(isset($conf->fieldList) === true) {
                        
            foreach($conf->fieldList as $confField) {
                
                $field = new UxComponent();
                $build = $field->HtmlField($confField);
                
                 $this->htmlContentSet($build);
            }
        }        
        if(isset($conf->menuList) === true) {

            $field = new UxComponent();            
            $build = $field->htmlMenu($conf->menuList);
            
            $this->htmlContentSet($build);
        }        
        return true;
    }
    
    public function htmlContentSet($content, $templateUrl = true) {
    
        if($templateUrl === true) {
             
            $content = file_get_contents($content);
        }
        if($content === false) return '';
        
        foreach($this as $k => $v) {
            
            if(strstr($k, 'html') === false) {
                
                continue;   
            }
            $k       = str_replace('html', '', $k);
            $k       = lcfirst($k);             
            $content = str_replace('{'.$k.'}', $v, $content);
        }
        $this->htmlInject($content);
        
        return true;
    }    
    
    public function htmlElement($type, $prefix = '') {
        
        $this->htmlId                                     = $prefix.$this->labelName.'['.$this->nodeName.']';
        $this->htmlTemplateUrl                            = 'http://'.UxComponent::$domain.'/'.UxComponent::$siteName.'/template/html/'.$this->labelName.'.html';
        $this->htmlTemplateScriptUrl                      = 'http://'.UxComponent::$domain.'/'.UxComponent::$siteName.'/template/js/'.$this->labelName.'.js';
        $this->htmlAttributList[self::$htmlAttributId]    = $this->htmlId;
        $this->htmlAttributList[self::$htmlAttributName]  = $this->labelName.'_'.$this->htmlLabelName;
        $this->htmlAttributList[self::$htmlAttributClass] = array();
        $this->htmType                                    = strtolower($type);
        
        $this->htmlContentSet($this->templateHtmlUrl,       true);
        $this->htmlContentSet($this->htmlTemplateScriptUrl, true);
        
        return true;
    }
     
    public function htmlElementClassAdd($class) {
        
        $this->htmlAttributList[self::$htmlAttributClass][] = $class;
        
        return true;
    }
    
    public function htmlGet($attribute) {
        
        if(isset($this->htmlAttributList[$attribute]) === false) {
            
            return '';
        }        
        return $this->htmlAttributList[$attribute];
    }

    public function htmlSet($attribute, $value = '') {
        
        if(is_array($attribute) === false) {
            
            $this->htmlAttributList[$attribute] = $value;
        }
        else {
            
            $this->htmlAttributList = array_merge($this->htmlAttributList, $attribute);
        }
        
        return true;
    }

    public function htmlRemove($att) {
        
        if(isset($this->htmlAttributList[$att])) {
            
            unset($this->htmlAttributList[$att]);
        }
        return true;
    }

    public function htmlClear() {
        
        $this->htmlAttributList = array();
        
        return true;
    }

    public function htmlInject($content) {
        
        if(is_object($content) === true) {
            
            $this->htmlText.= $content->htmlBuild();
        }
        else {
            
            $this->htmlText .= $content;
        }        
        return true;
    }

    public function htmlBuild() {
        
        if(in_array($this->type, self::$htmlTitleGetList) === false) {
            
            if(isset($this->htmlAttributList[self::$htmlAttributUrl]) === true) {
                
                unset($this->htmlAttributList[self::$htmlAttributUrl]);
            }
        }
        if(in_array($this->type, self::$htmlUrlGetList) === false) {
            
            if(isset($this->htmlAttributList[self::$htmlAttributUrl]) === true) {
                
                unset($this->htmlAttributList[self::$htmlAttributTitle]);
            }
        }
        if(in_array($this->type, self::$htmlValueGetList) === false) {
            
            if(isset($this->htmlAttributList[self::$htmlAttributValue]) === true) {
                
                unset($this->htmlAttributList[self::$htmlAttributValue]);
            }
        }
        $this->htmlAttributList[self::$htmlAttributClass][self::$htmlAttributClassLabelName]  = $this->htmlLlabelName;
        $this->htmlAttributList[self::$htmlAttributClass][self::$htmlAttributClassNodeName]   = $this->htmlNodeName;
        $this->htmlAttributList[self::$htmlAttributClass][self::$htmlAttributClassAccessMode] = $this->htmlAccessMode;
        $this->htmlAttributList[self::$htmlAttributClass][self::$htmlAttributClassShow]       = $this->htmlShowState;
        $this->htmlAttributList[self::$htmlAttributClass][self::$htmlAttributClassAvantage]   = $this->htmlAvantage;
        
        if(in_array($this->type, self::$htmlClassGetList) === false) {
                
            $this->htmlAttributList[self::$htmlAttributClass] = array();
        }
        if(in_array($this->type, self::$htmlIdGetList) === false) {
                
            unset($this->htmlAttributList[self::$htmlAttributId]);
        }
        if(in_array($this->type, self::$htmlNameGetList) === false) {
                
            unset($this->htmlAttributList[self::$htmlAttributNamed]);
        }
        $build = '<'.$this->htmlType;

        if(count($this->htmlAttributList)) {
            
            foreach($this->htmlAttributList as $key => $value) {
                
                if(is_array($value) === true) {
                    
                    $value = implode(' ', $value);
                }
                if($value === false) continue;
                
                $build.= ' '.$key.'="'.$value.'"';
            }
        }
        if(in_array($this->type, self::$htmlSelfCloserList) === false) {
            
            $build.= '>'.$this->htmlText.'</'.$this->htmlType.'>';
        }
        else {
            
            $build.= ' >';
        }
        foreach($this->htmlAttributList[self::$htmlAttributClass] as $className){
            
            if(isset(UxComponent::$cssContent['.'.$className]) === false) {
           
                UxComponent::$cssContent['.'.$className] = '
            
.'.$className.' {
                
}
';
           }
        }
        if(isset($this->htmlAttributList[self::$htmlAttributName]) === true) {

            if(isset(UxComponent::$cssContent['#'.$this->htmlAttributList[self::$htmlAttributName]]) === false) {
                
                UxComponent::$cssContent['#'.$this->htmlAttributList[self::$htmlAttributName]]= '
#'.$this->htmlAttributList[self::$htmlAttributName].' {

}
';
            }
        }
        if(isset(UxComponent::$cssContent[$this->type]) === false) {
            
            UxComponent::$cssContent[$this->type]= '
            
'.$this->type.' {

}
';
        }
        return $build;
    }

    public function htmlOutput() {
        
        echo $this->htmlBuild();
    }
    
    public function HtmlField($conf) {
        
        $this->htmlFromConf($conf);        
        $this->htmlElement(self::$htmlFieldContener, self::$htmlFieldNamePrefix);
        $this->htmlElementClassAdd(self::$htmlFieldClassPrefix);
        
        $build = $this->htmlBuild();
    
        return $build;
    }
    
    public function htmlMenuItem($conf) {
                
        $this->htmlFromConf($conf);
        $this->htmlElement(self::$htmlMenuItemContener, self::$htmlMenuItemNamePrefix);
        $this->htmlElementClassAdd(self::$htmlMenuItemClassPrefix);
        
        $build = $this->htmlBuild();
    
        return $build;
    }
    
    public function htmlMenu($conf, $inner = '') {
        
        $this->htmlFromConf($conf);        
        $this->htmlElement(self::$htmlMenuContener, self::$htmlMenuNamePrefix);
        $this->htmlSet('role', 'navigation');        
        $this->htmlElementClassAdd(self::$htmlMenuClassPrefix);
        
        $uxComponentList = new UxComponent();         
        $uxComponentList->htmlFromConf($conf);
        $uxComponentList->htmlElement(self::$htmlMenuListContener, self::$htmlMenuListNamePrefix);
        $uxComponentList->htmlElementClassAdd(self::$htmlMenuListClassPrefix);
        
        foreach($conf->menuItemList as $menuItemConf){
            
            $uxComponent = new UxComponent();            
            $build       =  $uxComponent->htmlMenuItem($menuItemConf);

            $uxComponentList->htmlContentSet($inner);
        }
        $uxComponentListBuild = $this->htmlBuild();
        
        $this->htmlContentSet($uxComponentListBuild);
        
        $build = $this->htmlBuild();
        
        return $build;
    }
}

class UxComponent {
    
    use TraitHtml;
    
    public static $dataIntegration  = array();
    public static $domain           = array();
    public static $siteName         = array();
    public static $descriptionLong  = array();
    public static $descriptionShort = array();
    public static $keyWordList      = array();    
    public static $cssContent       = '';
}

?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
<meta charset="UTF-8">
<title>{name}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/knacss.css" media="all">
<link rel="stylesheet" href="css/styles.css" media="all">
<link rel="stylesheet" href="css/default.css" media="all">
</head>
<body>

	<header id="header" role="banner" class="line pam"><img id="logo" > {title}</header>
	<div class="flex-container">
		<aside class="w20 mrs pam aside">
			<nav id="navigation" role="navigation">
				<ul class="pam unstyled">
					{menuList}
				</ul>
			</nav>
		</aside>
		<div id="main" role="main" class="flex-item-fluid pam">
			<div class="list profil my">
				<div class="item profil my">
					{profilList::deconnectedItem}
         		</div>
				<div class="item profil my">
					{profilList::connectedItem}
					<div class="detail profil my">
						<p class="field avatar my edit">Avatar</p>
						<p class="field name my edit">Nom</p>
						<p class="field surname my edit">Prénom</p>
						<p class="field email my edit">Email</p>
						<p class="field telMobile my edit">Tel mobile</p>
						<p class="field title my edit">Titre du profil</p>
						<p class="field avantage my edit">Avantage Particulier</p>
						<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
						<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

						
						<div
							class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
							vous sur de vouloir dérecommander le profil?</div>
						</p>
						<p class="field contactAddActionButton my edit hidden">AJOUTER
							AUX CONTACTS</p>
						<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
							DES CONTACTS
						<div
							class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
							vous sur de vouloir supprimer le profil?</div>
						</p>

						<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field recommandation my hidden">Nombre de
							recommdation à recevoir</p>
						<nav id="navigation" role="navigation">
							<ul class="pam unstyled">
								<li class="pam button listButton avantage">Recevez des
									recommandations</li>
								<li class="pam button listButton portfolio my hidden">Portfolio</li>
								<div class="list portfolio my hidden">
									<div class="item portfolio my hidden">
										<p class="field image my edit hidden">
											<img src="urlImage" title="Title">
										</p>
										<p class="field title edit hidden">title</p>
										<p class="field description edit hidden">description</p>
									</div>
									<div class="item portfolio my edit hidden">
										<p class="field image my edit hidden">
											<img src="urlImage" title="Title">
										</p>
										<p class="field title edit hidden">title</p>
										<p class="field description edit hidden">description</p>
									</div>
								</div>
								<li class="pam button listButton notification">Notifications</li>
								<div class="list notification">
									<div class="item notification my">
										<p class="field type recommandationNew my">Nouvelle
											recommandation</p>
										<p class="field avatar my">Avatar</p>
										<p class="field name">Nom</p>
										<p class="field surname my">Prénom</p>
										<p class="field title my">Titre du profil</p>
										<p class="field notificationContent my">Demande de
											recommandation</p>
										<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
										<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

										
										<div
											class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
											vous sur de vouloir dérecommander le profil?</div>
										</p>
										<p class="field contactAddActionButton my edit hidden">AJOUTER
											AUX CONTACTS</p>
										<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
											DES CONTACTS
										<div
											class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
											vous sur de vouloir supprimer le profil?</div>
										</p>

										<p class="field recommandationAcceptActionButton my edit">ACCEPTER</p>
										<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
										<div class="detail profil"></div>
									</div>
								</div>
								<div class="item notification hidden">
									<p class="field type recommandationAccepted my hidden">Recommandation
										acceptée</p>
									<p class="field avatar my hidden">Avatar</p>
									<p class="field name hidden">Nom</p>
									<p class="field surname my hidden">Prénom</p>
									<p class="field title my hidden">Titre du profil</p>
									<p class="field notificationContent my hidden">Recommandation
										acceptée</p>
									<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
									<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

									
									<div
										class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
										vous sur de vouloir dérecommander le profil?</div>
									</p>
									<p class="field contactAddActionButton my edit hidden">AJOUTER
										AUX CONTACTS</p>
									<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
										DES CONTACTS
									<div
										class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
										vous sur de vouloir supprimer le profil?</div>
									</p>

									<p
										class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
									<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
									<div class="detail profil"></div>
								</div>
					</div>
					<div class="item notification">
						<p class="field type contactAsk my">Demande de contact</p>
						<p class="field avatar my">Avatar</p>
						<p class="field name">Nom</p>
						<p class="field surname my">Prénom</p>
						<p class="field title my">Titre du profil</p>
						<p class="field notificationContent my">Demande de contact</p>
						<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
						<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

						
						<div
							class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
							vous sur de vouloir dérecommander le profil?</div>
						</p>
						<p class="field contactAddActionButton my edit">AJOUTER AUX
							CONTACTS</p>
						<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
							DES CONTACTS
						<div
							class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
							vous sur de vouloir supprimer le profil?</div>
						</p>

						<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
						<div class="detail profil"></div>
					</div>
					<div class="item notification">
						<p class="field type contactAskAccepted my">Demande de contact
							acceptée</p>
						<p class="field avatar my">Avatar</p>
						<p class="field name">Nom</p>
						<p class="field surname my">Prénom</p>
						<p class="field title my">Titre du profil</p>
						<p class="field notificationContent my">Demande de contact
							acceptée</p>
						<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
						<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

						
						<div
							class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
							vous sur de vouloir dérecommander le profil?</div>
						</p>
						<p class="field contactAddActionButton my edit">AJOUTER AUX
							CONTACTS</p>
						<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
							DES CONTACTS
						<div
							class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
							vous sur de vouloir supprimer le profil?</div>
						</p>

						<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
						<div class="detail profil"></div>
					</div>
				</div>

				<li class="pam button listButton profil hidden">Personnes qui
					me recommandent
					<div class="list profil"></div>
				</li>
				<li class="pam button listButton recommandation my">Mes
					recommandations
					<div class="list profil"></div>
				</li>
				<li class="pam button listButton param">paramètres
					<div class="list param">
						<div class="item param">
							<p
								class="field notification emailing recommandationNewContact edit">Revevoir
								les alertes mail sur les nouvelles recommandations de mes
								contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing recommandationNew edit">Revevoir
								les alertes mail sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p
								class="field notification emailing recommandationAccepted edit">Revevoir
								les alertes mail sur les acceptations de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification emailing recommandationRenew edit">Etre
								relacné par mail sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p
								class="field notification emailing contactAskAcceptedContact edit">Revevoir
								les alertes mail sur les nouveaux contacts de mes contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing contactAsk edit">Revevoir
								les alertes mail sur les demandes de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing contactAskAccepted edit">Revevoir
								les alertes mail sur les acceptations de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing contactAskRenew edit">Etre
								relancé par mail sur les demandes de contacts</p>
						</div>

						<div class="item param">
							<p class="field notification sms recommandationNewContact edit">Revevoir
								les alertes sms sur les nouvelles recommandations de mes
								contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms recommandationNew edit">Revevoir
								les alertes sms sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification sms recommandationAccepted edit">Revevoir
								les alertes sms sur les acceptations de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification sms recommandationRenew edit">Etre
								relancé par sms sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAskAcceptedContact edit">Revevoir
								les alertes sms sur les nouveaux contacts de mes contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAsk edit">Revevoir
								les alertes sms sur les demandes de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAskAccepted edit">Revevoir
								les alertes sms sur les acceptations de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAskRenew edit">Etre
								relancé par sms sur les demandes de contacts</p>
						</div>

						<div class="item param">
							<p
								class="field notification device recommandationNewContact edit">Revevoir
								les alertes device sur les nouvelles recommandations de mes
								contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device recommandationNew edit">Revevoir
								les alertes device sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification device recommandationAccepted edit">Revevoir
								les alertes device sur les acceptations de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification device recommandationRenew edit">Etre
								relancé par device sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p
								class="field notification device contactAskAcceptedContact edit">Revevoir
								les alertes device sur les nouveaux contacts de mes contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device contactAsk edit">Revevoir
								les alertes device sur les demandes de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device contactAskAccepted edit">Revevoir
								les alertes device sur les acceptations de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device contactAskRenew edit">Etre
								relancé par device sur les demandes de contacts</p>
						</div>

						<div class="item param">
							<p class="field profil gscAcceptActionButton edit">Accepter
								les conditions générales</p>
						</div>
						<div class="item param">
							<p class="field profil profilDeleteActionButton edit">Supprimer
								le profil
							<div
								class="field confirmation profilDeleteActionButtonConfirm hidden">Etes
								vous sur de vouloir surprimer le profil?</div>
							</p>
						</div>
					</div>


				</li>

				</ul>
				</nav>
				<p class="field description my edit">Description du profil</p>
			</div>
		</div>
		<div class="item profil my">
			<p class="field avatar my">Avatar</p>
			<p class="field name">Nom</p>
			<p class="field surname my">Prénom</p>
			<p class="field title my">Titre du profil</p>
			<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
			<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

			
			<div
				class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
				vous sur de vouloir dérecommander le profil?</div>
			</p>
			<p class="field contactAddActionButton my edit hidden">AJOUTER
				AUX CONTACTS</p>
			<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
				DES CONTACTS
			<div
				class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
				vous sur de vouloir supprimer le profil?</div>
			</p>

			<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
			<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
			<div class="detail profil my">
				<p class="field avatar my edit">Avatar</p>
				<p class="field name my edit">Nom</p>
				<p class="field surname my edit">Prénom</p>
				<p class="field email my edit">Email</p>
				<p class="field telMobile my edit">Tel mobile</p>
				<p class="field title" my edit>Titre du profil</p>
				<p class="field avantage my edit">Avantage Professionnel</p>
				<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
				<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

				
				<div
					class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
					vous sur de vouloir dérecommander le profil?</div>
				</p>
				<p class="field contactAddActionButton my edit hidden">AJOUTER
					AUX CONTACTS</p>
				<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
					DES CONTACTS
				<div
					class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
					vous sur de vouloir supprimer le profil?</div>
				</p>

				<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field recommandationNumber my">Nombre de recommdation
					à recevoir</p>
				<nav id="navigation" role="navigation">
					<ul class="pam unstyled">
						<li class="pam button listButton avantage">Recevez des
							recommandations</li>
						<li class="pam button listButton portfolio my">Portfolio</li>
						<div class="list portfolio my">
							<div class="item portfolio my hidden">
								<p class="field image my edit hidden">
									<img src="urlImage" title="Title">
								</p>
								<p class="field title edit hidden">title</p>
								<p class="field description edit hidden">description</p>
							</div>
							<div class="item portfolio my edit hidden">
								<p class="field image my edit hidden">
									<img src="urlImage" title="Title">
								</p>
								<p class="field title edit hidden">title</p>
								<p class="field description edit hidden">description</p>
							</div>
						</div>
						<li class="pam button listButton notification">Notifications</li>
						<div class="list notification">
							<div class="item notification my">
								<p class="field type recommandationNew my">Nouvelle
									recommandation</p>
								<p class="field avatar my">Avatar</p>
								<p class="field name">Nom</p>
								<p class="field surname my">Prénom</p>
								<p class="field title my">Titre du profil</p>
								<p class="field notificationContent my">Demande de
									recommandation</p>
								<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
								<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

								
								<div
									class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
									vous sur de vouloir dérecommander le profil?</div>
								</p>
								<p class="field contactAddActionButton my edit hidden">AJOUTER
									AUX CONTACTS</p>
								<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
									DES CONTACTS
								<div
									class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
									vous sur de vouloir supprimer le profil?</div>
								</p>

								<p class="field recommandationAcceptActionButton my edit">ACCEPTER</p>
								<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
								<div class="detail profil"></div>
							</div>
						</div>
						<div class="item notification hidden">
							<p class="field type recommandationAccepted my hidden">Recommandation
								acceptée</p>
							<p class="field avatar my hidden">Avatar</p>
							<p class="field name hidden">Nom</p>
							<p class="field surname my hidden">Prénom</p>
							<p class="field title my hidden">Titre du profil</p>
							<p class="field notificationContent my hidden">Recommandation
								acceptée</p>
							<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
							<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

							
							<div
								class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
								vous sur de vouloir dérecommander le profil?</div>
							</p>
							<p class="field contactAddActionButton my edit hidden">AJOUTER
								AUX CONTACTS</p>
							<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
								DES CONTACTS
							<div
								class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
								vous sur de vouloir supprimer le profil?</div>
							</p>

							<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
							<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
							<div class="detail profil"></div>
						</div>
			</div>
			<div class="item notification">
				<p class="field type contactAsk my">Demande de contact</p>
				<p class="field avatar my">Avatar</p>
				<p class="field name">Nom</p>
				<p class="field surname my">Prénom</p>
				<p class="field title my">Titre du profil</p>
				<p class="field notificationContent my">Demande de contact</p>
				<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
				<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

				
				<div
					class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
					vous sur de vouloir dérecommander le profil?</div>
				</p>
				<p class="field contactAddActionButton my edit">AJOUTER AUX
					CONTACTS</p>
				<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
					DES CONTACTS
				<div
					class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
					vous sur de vouloir supprimer le profil?</div>
				</p>

				<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
			</div>
			<div class="item notification">
				<p class="field type contactAskAccepted my">Demande de contact
					acceptée</p>
				<p class="field avatar my">Avatar</p>
				<p class="field name">Nom</p>
				<p class="field surname my">Prénom</p>
				<p class="field title my">Titre du profil</p>
				<p class="field notificationContent my">Demande de contact
					acceptée</p>
				<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
				<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

				
				<div
					class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
					vous sur de vouloir dérecommander le profil?</div>
				</p>
				<p class="field contactAddActionButton my edit">AJOUTER AUX
					CONTACTS</p>
				<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
					DES CONTACTS
				<div
					class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
					vous sur de vouloir supprimer le profil?</div>
				</p>
				<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
				<div class="detail profil"></div>
			</div>
		</div>

		<li class="pam button listButton profil hidden">Personnes qui me
			recommandent
			<div class="list profil"></div>
		</li>
		<li class="pam button listButton recommandation my">Mes
			recommandations
			<div class="list profil"></div>
		</li>
		<li class="pam button listButton param">paramètres</li>
		</ul>
		</nav>
		<p class="field description my edit">Description du profil</p>
	</div>
	</div>
	<div class="item profil my facebook">
		<p class="button social socialConnected facebook my">Compte
			Facebook - Connecté</p>
		<p class="button social socialDisconnectButton facebook my">Dissocier</p>
	</div>
	<div class="item profil my google">
		<p class="button social socialToConnectButton google my">SE
			CONNECTER AVEC SON COMPTE GOOGLE+</p>
	</div>
	</div>
	<div class="list contact my">
		<div class="item contact my">
			<div class="item profil"></div>
		</div>
		<div class="item contact my">
			<div class="item profil"></div>
		</div>
	</div>

	<div class="list portfolio my">
		<div class="item portfolio my hidden">
			<p class="field image my edit hidden">
				<img src="urlImage" title="Title">
			</p>
			<p class="field title edit hidden">title</p>
			<p class="field description edit hidden">description</p>
		</div>
		<div class="item portfolio my edit hidden">
			<p class="field image my edit hidden">
				<img src="urlImage" title="Title">
			</p>
			<p class="field title edit hidden">title</p>
			<p class="field description edit hidden">description</p>
		</div>
	</div>
	<div class="list notification">
		<div class="item notification my">
			<p class="field type recommandationNew my">Nouvelle
				recommandation</p>
			<p class="field avatar my">Avatar</p>
			<p class="field name">Nom</p>
			<p class="field surname my">Prénom</p>
			<p class="field title my">Titre du profil</p>
			<p class="field notificationContent my">Demande de recommandation</p>
			<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER

			
			<div
				class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
				vous sur de vouloir dérecommander le profil?</div>
			</p>
			<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER</p>
			<p class="field contactAddActionButton my edit hidden">AJOUTER
				AUX CONTACTS</p>
			<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
				DES CONTACTS</p>
			<p class="field recommandationAcceptActionButton my edit">ACCEPTER</p>
			<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
			<div class="detail profil"></div>
		</div>
	</div>
	<div class="item notification hidden">
		<p class="field type recommandationAccepted my hidden">Recommandation
			acceptée</p>
		<p class="field avatar my hidden">Avatar</p>
		<p class="field name hidden">Nom</p>
		<p class="field surname my hidden">Prénom</p>
		<p class="field title my hidden">Titre du profil</p>
		<p class="field notificationContent my hidden">Recommandation
			acceptée</p>
		<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
		<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

		
		<div
			class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
			vous sur de vouloir dérecommander le profil?</div>
		</p>
		<p class="field contactAddActionButton my edit hidden">AJOUTER AUX
			CONTACTS</p>
		<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
			DES CONTACTS</p>
		<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
		<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
		<div class="detail profil"></div>
	</div>
	</div>
	<div class="item notification">
		<p class="field type contactAsk my">Demande de contact</p>
		<p class="field avatar my">Avatar</p>
		<p class="field name">Nom</p>
		<p class="field surname my">Prénom</p>
		<p class="field title my">Titre du profil</p>
		<p class="field notificationContent my">Demande de contact</p>
		<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
		<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

		
		<div
			class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
			vous sur de vouloir dérecommander le profil?</div>
		</p>
		<p class="field contactAddActionButton my edit">AJOUTER AUX
			CONTACTS</p>
		<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
			DES CONTACTS</p>
		<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
		<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
	</div>
	<div class="item notification">
		<p class="field type contactAskAccepted my">Demande de contact
			acceptée</p>
		<p class="field avatar my">Avatar</p>
		<p class="field name">Nom</p>
		<p class="field surname my">Prénom</p>
		<p class="field title my">Titre du profil</p>
		<p class="field notificationContent my">Demande de contact
			acceptée</p>
		<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
		<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

		
		<div
			class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
			vous sur de vouloir dérecommander le profil?</div>
		</p>
		<p class="field contactAddActionButton my edit">AJOUTER AUX
			CONTACTS</p>
		<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
			DES CONTACTS</p>
		<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
		<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
		<div class="detail profil"></div>
	</div>
	</div>
	<div class="add contact">
		<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
			apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît. Voss
			? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit un
			picon !</p>
	</div>
	<div class="add contact">
		<p class="">Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ?
			Yeuh non, merci vielmols mais che dois partir à la Coopé de
			Truchtersheim acheter des mänele et des rossbolla pour les gamins.
			Hopla tchao bissame ! Consectetur adipiscing elit</p>
	</div>
	<div class="list recommandation">
		<div class="item recommandation">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item recommandation">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>
	<div class="list recommandation my">
		<div class="item recommandation my">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item recommandation my">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>
	<div class="list category">
		<div class="item category">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item category">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>
	<div class="list avantage">
		<div class="item avantage">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item avantage">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>

	</div>
	</div>
	<footer id="footer" role="contentinfo" class="line pam txtcenter">
		<div class="notificationLive"><?php echo $notificationLive ?></div>
		<div class="detail gsc">
			<p class="">Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ?
				Yeuh non, merci vielmols mais che dois partir à la Coopé de
				Truchtersheim acheter des mänele et des rossbolla pour les gamins.
				Hopla tchao bissame ! Consectetur adipiscing elit</p>
		</div>
		<div class="detail legal">
			<p class="">Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ?
				Yeuh non, merci vielmols mais che dois partir à la Coopé de
				Truchtersheim acheter des mänele et des rossbolla pour les gamins.
				Hopla tchao bissame ! Consectetur adipiscing elit</p>
		</div>
		<div class="list social">
			<div class="item social facebook">
				<p class="button social socialConnected facebook">Compte
					Facebook</p>
			</div>
			<div class="item social google">
				<p class="button social socialConnected google">Compte Google</p>
			</div>
		</div>
	</footer>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-76275111-3', 'XXXXXXXXXXX.TLD');
		ga('send', 'pageview');

		</script>
</body>
</html>