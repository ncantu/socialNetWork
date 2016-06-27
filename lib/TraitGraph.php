<?php 

Trait TraitGraph {

    private $graphRequestTagToken                  = '{token}';
    private $graphRequestTagAvantageMax            = '{avantageMax}';
    private $graphRequestTagUserLoginPublic        = '{userLoginPublic}';
    private $graphRequestTagShowValueDefault       = '{showValueDefault}';
    private $graphRequestTagAccessModeValueDefault = '{accessModeValueDefault}';
    private $graphRequestTagThemeValueDefault      = '{themeValueDefault}';
    private $graphRequestTagSemanticValueDefault   = '{semanticValueDefault}';
    private $graphRequestTagDomainValueDefault     = '{domainValueDefault}';
    private $graphRequestTagLangValueDefault       = '{langValueDefaul}';
    private $graphRequestTagNodeName               = '{nodeName}';
    private $graphRequestTagAttributName           = '{attributName}';
    private $graphRequestTagAvantageMaxFilter      = '{avantageMaxFilter}';
    private $graphRequestTagUserLoginPublicFilter  = '{userLoginPublicFilter}';
    private $graphRequestTagSemanticListFiltere    = '{qemanticListFiltere}';
    private $graphRequestTagThemeListFilter        = '{themeListFilter}';
    private $graphRequestTagDomainListFilter       = '{domainListFilter}';
    private $graphRequestTagLangListFilter         = '{langListFilter}';
    private $graphRequestTagAccessModeListFilter   = '{accessModeListFilter}';
     
    private function graphRequestTemplace($request, $filter) {

        $request = str_replace($this->graphRequestTagToken, Token::$token, $request);
        $request = str_replace($this->graphRequestTagAvantageMax, Token::$avantageMax, $request);
        $request = str_replace($this->graphRequestTagUserLoginPublic, Token::$userLoginPublic, $request);
        $request = str_replace($this->graphRequestTagShowValueDefault, Token::$showValueDefault, $request);
        $request = str_replace($this->graphRequestTagAccessModeValueDefault, Token::$accessModeValueDefault, $request);
        $request = str_replace($this->graphRequestTagThemeValueDefault, Token::$themeValueDefault, $request);
        $request = str_replace($this->graphRequestTagSemanticValueDefault, Token::$semanticValueDefault, $request);
        $request = str_replace($this->graphRequestTagDomainValueDefault, Token::$domainValueDefault, $request);
        $request = str_replace($this->graphRequestTagLangValueDefault, Token::$langValueDefault, $request);
        $request = str_replace($this->graphRequestTagAvantageMaxFilter, $filter->avantageMaxFilter, $request);
        $request = str_replace($this->graphRequestTagUserLoginPublicFilter, $filter->userLoginPublicFilter, $request);
        $request = str_replace($this->graphRequestTagSemanticListFiltere, $filter->semanticListFilter, $request);
        $request = str_replace($this->graphRequestTagThemeListFilter, $filter->themeListFilter, $request);
        $request = str_replace($this->graphRequestTagDomainListFilter, $filter->domainListFilter, $request);
        $request = str_replace($this->graphRequestTagLangListFilter, $filter->langListFilter, $request);
        $request = str_replace($this->graphRequestTagAccessModeListFilter, $filter->accessModeListFilter, $request);

        return $request;
    }
    public function graphRequest($filter) {

        $request = $this->graphRequestTemplace($this->request, $filter);
        $res     = $request;      // @todo

        if($res === false) {

            return false;
        }
        $res  = $this->setUp($res);

        if($res === false) {

            return false;
        }
        return $res;
    }
}

?>