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

    CONST VERSION_LOAD = 'v0.0';

    CONST CONF_FILE = 'conf/page.json';

    protected $confFile = self::CONF_FILE;

    public function __construct($setUp = false, $confFile = false) {

        parent::__construct(true, Conf::CONF_FILE);
        parent::__construct(true, self::CONF_FILE);
    }

    public function build() {

        foreach ( $this->requireList as $require ) {
        }
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

    private function require($libName) {

        $file = 'lib/' . self::VERSION_LOAD . '/' . $libName . '.php';
        
        if (is_file($file) === true) {
            
            return false;
        }
        require_once $file;
        
        return true;
    }
}

?>