<?php
class Request {

    static function requestVal($tag) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $tag);
        
        if (isset($_REQUEST[$tag]) === true && empty($_REQUEST[$tag]) === false && $_REQUEST[$tag] !== false) {
            
            $val = $_REQUEST[$tag];
            $val = filter_var($val, FILTER_UNSAFE_RAW, FILTER_FLAG_ENCODE_HIGH);
            
            return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $val);
        }
        return Trace::fatal(__LINE__, __METHOD__, __CLASS__);
    }
}

?>