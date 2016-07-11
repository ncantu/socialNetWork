<?php
class Trace {

    CONST CONF_DIR = 'conf/';

    CONST CONF_FILE = 'trace.json';

    CONST CONF_VERSION = 'v0.0';

    CONST VOID = '<<VOID>>';

    CONST ALL = 'ALL';

    CONST VOID_FUNC = 'Void';

    CONST FILE_SEPARATPOR = '-';

    CONST FILE_EXT = '.log';

    CONST FILE_WRITE_MODE = 'a+';

    CONST FILE_FUNC = 'File';

    CONST FILE_DATE_FORMAT = 'YmdH';

    CONST DIR = 'log/';

    CONST ERR_VERBOSE_SHORT = 'short';

    CONST ERR_VERBOSE_FULL = 'full';

    CONST SEP = "\n";

    CONST SEP_REPLACE = '{{\n}}';

    CONST LINE_TAG = '__LINE__';

    CONST METHOD_TAG = '__METHOD__';

    CONST CLASS_TAG = '__CLASS__';

    CONST DATE_FORMAT = 'Y-m-d H:i:s';

    CONST EXIT_FUNC = 'Exit';

    CONST STDOUT_FUNC = 'Stdout';

    CONST ERR_VERBOSE_SHORT_SUFFIX = 'short';

    CONST ERR_VERBOSE_FULL_SUFFIX = 'full';

    CONST CODE_SEPARATPOR = '-';

    CONST SEC_F = 'secT05052016';

    private static $errorCodeList = array();

    private static $envList = array();

    private static $errorLevelList = array();

    private static $envSequence = 0;

    private static $envName;

    private static $typeSet;

    private static $typeGet;

    private $debugAll = true;

    private $errorLevel;

    private $httpCode;

    private $funcReturnState = false;

    private $exitState = false;

    private $fileState = false;

    private $stdoutState = false;

    private $logFullState = false;

    private $securityLevel;

    private $majorCode;

    private $majorShortMsg = '';

    private $majorFullMsg = '';

    private $secondaryCode;

    private $secondaryShortMsg = '';

    private $secondaryFullMsg = '';

    private $sentence = self::VOID;

    private $log = self::VOID;

    private $t_n_state = self::VOID;

    private $t_n_dateStart = self::VOID;

    private $t_n_dateEnd = self::VOID;

    private $t_n_step_created = self::VOID;

    private $t_n_visibility = self::VOID;

    private $t_n_note = self::VOID;

    private $t_n_value = self::VOID;

    private $t_r_state = self::VOID;

    private $t_r_dateStart = self::VOID;

    private $t_r_dateEnd = self::VOID;

    private $t_r_step_created = self::VOID;

    private $t_r_visibility = self::VOID;

    private $t_r_note = self::VOID;

    private $t_r_value = self::VOID;

    private $returnValue;

    private $errorInfo;

    private $exitFunc = self::VOID_FUNC;

    private $stdoutFunc = self::VOID_FUNC;

    private $errVerbose = self::VOID_FUNC;

    private $fileFunc = self::VOID_FUNC;

    private $t_time;

    private $t_date;

    private $t_u;

    private $t_c;

    private $t_e;

    private $t_i;

    private $t_O;

    private $t_SERVER_REQUEST_TIME;

    private $tdy_z;

    private $tY_Y;

    private $tmon_m;

    private $tdm_d;

    private $tH_H;

    private $tmin_i;

    private $ts_s;

    private $codeCode;

    private $tr_back_json;

    private $req_SERVER_SCRIPT_NAME;

    private $req_SERVER_REQUEST_URI;

    private $req_SERVER_QUERY_STRING;

    private $req_SERVER_REQUEST_METHOD;

    private $req_SERVER_SERVER_PROTOCOL;

    private $req_SERVER_GATEWAY_INTERFACE;

    private $req_SERVER_REQUEST_SCHEME;

    private $req_SERVER_SCRIPT_FILENAME;

    private $req_SERVER_SERVER_PORT;

    private $req_SERVER_SERVER_ADDR;

    private $req_SERVER_HTTP_ACCEPT_ENCODING;

    private $req_SERVER_HTTP_UPGRADE_INSECURE_REQUESTS;

    private $req_SERVER_HTTP_ACCEPT;

    private $req_SERVER_HTTP_CONNECTION;

    private $req_SERVER_HTTP_HOST;

    private $req_SERVER_FCGI_ROLE;

    private $req_SERVER_PHP_SELF;

    private $tr_REQUEST_JSON;

    private $tr_cpu;

    private $tr_memory;

    private $tr_diskSpace;

    private $tr_pid;

    private $tr_SERVER_REQUEST_TIME_FLOAT;

    private $tr_sequence;

    private $i_name;

    private $c_name;

    private $m_name;

    private $bt_name;

    private $l_number;

    private $var_json;

    private $hApp_SERVER_PATH;

    private $hApp_SERVER_SYSTEMROOT;

    private $hApp_SERVER_COMSPEC;

    private $hApp_SERVER_PATHEXT;

    private $hApp_SERVER_WINDIR;

    private $hApp_SERVER_SYSTEMDRIVE;

    private $hApp_SERVER_TEMP;

    private $hApp_SERVER_TMP;

    private $hApp_SERVER_QT_PLUGIN_PATH;

    private $hApp_SERVER_PHPRC;

    private $hApp_SERVER_PHP_FCGI_MAX_REQUESTS;

    private $hApp_SERVER__FCGI_SHUTDOWN_EVENT_;

    private $hApp_SERVER_DOCUMENT_ROOT;

    private $hApp_SERVER_SERVER_NAME;

    private $hApp_SERVER_CONTEXT_PREFIX;

    private $hApp_SERVER_SERVER_SOFTWARE;

    private $hApp_SERVER_SERVER_SIGNATURE;

    private $hApp_SERVER_CONTEXT_DOCUMENT_ROOT;

    private $hApp_SERVER_SystemRoot;

    private $hApp_json;

    private $env_name;

    private $envSeq;

    private $env_SERVER_SERVER_ADMIN;

    private $cf_json;

    private $u_securityLevel;

    private $u_idCryptedT;

    private $u_idCryptedS;

    private $u_id;

    private $u_name;

    private $u_json;

    private $uh_name;

    private $hClient_SERVER_REMOTE_PORT;

    private $hClient_SERVER_REMOTE_ADDR;

    private $hClient_SERVER_HTTP_USER_AGENT;

    private $ss_SERVER_HTTP_COOKIE;

    private $ss_SESSION_JSON;

    private $mock_userIdCryptedS;

    private $mock_appIdCryptedS;

    private $mock_json;

    private static $mockState = false;

    private static $mockName;

    private static $userPublicId;

    private static $appPublicId;

    public function __construct($configure = false) {

        if ($configure === true) {
            
            self::configure();
        }
    }

    public static function configure() {

        $file = self::CONF_DIR . self::CONF_VERSION . '/' . self::CONF_FILE;
        
        if (is_file($file) === false) {
            
            exit('ERR CONF');
        }
        $conf = file_get_contents(self::CONF_DIR . self::CONF_VERSION . '/' . self::CONF_FILE);
        
        if ($conf === false) {
            
            exit('ERR CONF');
        }
        $conf = json_decode($conf);
        
        date_default_timezone_set($conf->timeZone);
        self::$envName = $conf->envName;
        $envName = self::$envName;
        self::$errorCodeList = $conf->errorCodeList;
        self::$envList = $conf->envList->$envName;
        self::$typeSet = $conf->typeSet;
        self::$typeGet = $conf->typeGet;
        
        return true;
    }

    public static function __callstatic($name, $argumentList) {

        foreach ( self::$errorCodeList as $codeDetailList ) {
            
            if ($name === $codeDetailList->errorLevel) {
                
                var_export($argumentList);
                echo '<br />';
                
                $line = null;
                $method = null;
                $class = null;
                $var = null;
                
                if (isset($argumentList[0]) === true) {
                    $line = $argumentList[0];
                }
                if (isset($argumentList[1]) === true) {
                    $method = $argumentList[1];
                }
                if (isset($argumentList[2]) === true) {
                    $class = $argumentList[2];
                }
                if (isset($argumentList[3]) === true) {
                    $var = $argumentList[3];
                }
                $trace = new Trace();
                
                return $trace->t($codeDetailList, self::$envList->errorTypeList->$name, $line, $method, $class, $var);
            }
        }
        return false;
    }

    private function void($opt = true) {

        return;
    }

    private function stdout($eol = '<br />') {

        echo $this->sentence . $eol;
        
        return true;
    }

    private function exit() {

        exit();
    }

    private function secureVar($var) {

        if (is_string($var) === false && is_null($var) === false && is_numeric($var) === false && is_bool($var) === false) {
            
            $var = json_encode($var);
        }
        return $var;
    }

    private function sysVar($sysVar) {

        return $sysVar;
    }

    private function sysVarItem($sysVar, $itemName) {

        if (isset($sysVar[$itemName]) === false)
            return self::VOID;
        
        return $sysVar[$itemName];
    }

    private function classExport($className) {

        return get_class_vars($className);
    }

    private function codeSet() {

        $this->codeCode = $this->majorCode . '-' . $this->secondaryCode;
        
        return true;
    }

    private function sentence($line, $method, $class, $lineTag = self::LINE_TAG, $methodTag = self::METHOD_TAG, $classTag = self::CLASS_TAG, $sep = self::SEP) {

        $this->codeSet();
        
        if ($this->logFullState === true) {
            
            $this->majorShortMsg .= ' ' . $this->majorFullMsg;
            $this->secondaryShortMsg .= ' ' . $this->secondaryFullMsg;
        }
        $this->sentence = '';
        $this->sentence .= ucfirst(strtolower($this->errorLevel)) . ' ' . $this->codeCode . ': ' . $this->majorShortMsg;
        $this->sentence .= ' ' . $this->secondaryShortMsg;
        $this->sentence = str_replace($lineTag, $line, $this->sentence);
        $this->sentence = str_replace($methodTag, $method, $this->sentence);
        $this->sentence = str_replace($classTag, $class, $this->sentence);
        $this->sentence .= $sep;
        
        return true;
    }

    private function code($class, $method, $line, $var, $codeSep = self::CODE_SEPARATPOR) {

        $this->codeSet();
        $this->c_name = $class;
        $this->m_name = $method;
        $this->l_number = $line;
        $this->var_json = $this->SysVar($var);
        $this->envSeq = self::$envSequence;
        
        return true;
    }

    private function time() {

        $this->t_time = time();
        $this->t_date = date(self::DATE_FORMAT, $this->t_time);
        $this->t_u = date('u', $this->t_time);
        $this->t_c = date('c', $this->t_time);
        $this->t_e = date('e', $this->t_time);
        $this->t_i = date('I', $this->t_time);
        $this->t_O = date('O', $this->t_time);
        $this->t_SERVER_REQUEST_TIME = $this->SysVarItem($_SERVER, 'REQUEST_TIME');
        $this->tdy_z = date('z', $this->t_time);
        $this->tY_Y = date('Y', $this->t_time);
        $this->tmon_m = date('m', $this->t_time);
        $this->tdm_d = date('d', $this->t_time);
        $this->tH_H = date('H', $this->t_time);
        $this->tmin_i = date('i', $this->t_time);
        $this->ts_s = date('s', $this->t_time);
        
        return true;
    }

    public function request() {

        $this->req_SERVER_SCRIPT_NAME = $this->SysVarItem($_SERVER, 'SCRIPT_NAME');
        $this->req_SERVER_REQUEST_URI = $this->SysVarItem($_SERVER, 'REQUEST_URI');
        $this->req_SERVER_QUERY_STRING = $this->SysVarItem($_SERVER, 'QUERY_STRING');
        $this->req_SERVER_REQUEST_METHOD = $this->SysVarItem($_SERVER, 'REQUEST_METHOD');
        $this->req_SERVER_SERVER_PROTOCOL = $this->SysVarItem($_SERVER, 'SERVER_PROTOCOL');
        $this->req_SERVER_GATEWAY_INTERFACE = $this->SysVarItem($_SERVER, 'GATEWAY_INTERFACE');
        $this->req_SERVER_REQUEST_SCHEME = $this->SysVarItem($_SERVER, 'REQUEST_SCHEME');
        $this->req_SERVER_SCRIPT_FILENAME = $this->SysVarItem($_SERVER, 'SCRIPT_FILENAME');
        $this->req_SERVER_SERVER_PORT = $this->SysVarItem($_SERVER, 'SERVER_PORT');
        $this->req_SERVER_SERVER_ADDR = $this->SysVarItem($_SERVER, 'SERVER_ADDR');
        $this->req_SERVER_HTTP_ACCEPT_ENCODING = $this->SysVarItem($_SERVER, 'HTTP_ACCEPT_ENCODING');
        $this->req_SERVER_HTTP_UPGRADE_INSECURE_REQUESTS = $this->SysVarItem($_SERVER, 'HTTP_UPGRADE_INSECURE_REQUESTS');
        $this->req_SERVER_HTTP_ACCEPT = $this->SysVarItem($_SERVER, 'HTTP_ACCEPT');
        $this->req_SERVER_HTTP_CONNECTION = $this->SysVarItem($_SERVER, 'HTTP_CONNECTION');
        $this->req_SERVER_HTTP_HOST = $this->SysVarItem($_SERVER, 'HTTP_HOST');
        $this->req_SERVER_FCGI_ROLE = $this->SysVarItem($_SERVER, 'FCGI_ROLE');
        $this->req_SERVER_PHP_SELF = $this->SysVarItem($_SERVER, 'PHP_SELF');
        
        return true;
    }

    private function app() {

        $this->tr_REQUEST_JSON = $this->SysVar($_REQUEST);
        $this->tr_cpu = self::VOID;
        
        if (function_exists('sys_getloadavg') === true)
            $this->tr_cpu = sys_getloadavg()[0];
        
        $this->tr_memory = memory_get_usage(true);
        $this->tr_diskSpace = disk_free_space('.');
        $this->tr_pid = getmypid();
        $this->tr_SERVER_REQUEST_TIME_FLOAT = $this->SysVarItem($_SERVER, 'REQUEST_TIME_FLOAT');
        $this->tr_back_json = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10);
        $this->tr_sequence = self::$envSequence;
        $this->bt_name = self::ALL;
        $this->token = Token::$context;
        
        return true;
    }

    private function hostApp() {

        $this->hApp_SERVER_PATH = $this->SysVarItem($_SERVER, 'PATH');
        $this->hApp_SERVER_SYSTEMROOT = $this->SysVarItem($_SERVER, 'SYSTEMROOT');
        $this->hApp_SERVER_COMSPEC = $this->SysVarItem($_SERVER, 'COMSPEC');
        $this->hApp_SERVER_PATHEXT = $this->SysVarItem($_SERVER, 'PATHEXT');
        $this->hApp_SERVER_WINDIR = $this->SysVarItem($_SERVER, 'WINDIR');
        $this->hApp_SERVER_SYSTEMDRIVE = $this->SysVarItem($_SERVER, 'SYSTEMDRIVE');
        $this->hApp_SERVER_TEMP = $this->SysVarItem($_SERVER, 'TEMP');
        $this->hApp_SERVER_TMP = $this->SysVarItem($_SERVER, 'TMP');
        $this->hApp_SERVER_QT_PLUGIN_PATH = $this->SysVarItem($_SERVER, 'QT_PLUGIN_PATH');
        $this->hApp_SERVER_PHPRC = $this->SysVarItem($_SERVER, 'PHPRC');
        $this->hApp_SERVER_PHP_FCGI_MAX_REQUESTS = $this->SysVarItem($_SERVER, 'PHP_FCGI_MAX_REQUESTS');
        $this->hApp_SERVER__FCGI_SHUTDOWN_EVENT_ = $this->SysVarItem($_SERVER, '_FCGI_SHUTDOWN_EVENT_');
        $this->hApp_SERVER_DOCUMENT_ROOT = $this->SysVarItem($_SERVER, 'DOCUMENT_ROOT');
        $this->hApp_SERVER_SERVER_NAME = $this->SysVarItem($_SERVER, 'SERVER_NAME');
        $this->hApp_SERVER_CONTEXT_PREFIX = $this->SysVarItem($_SERVER, 'CONTEXT_PREFIX');
        $this->hApp_SERVER_SERVER_SOFTWARE = $this->SysVarItem($_SERVER, 'SERVER_SOFTWARE');
        $this->hApp_SERVER_SERVER_SIGNATURE = $this->SysVarItem($_SERVER, 'SERVER_SIGNATURE');
        $this->hApp_SERVER_CONTEXT_DOCUMENT_ROOT = $this->SysVarItem($_SERVER, 'CONTEXT_DOCUMENT_ROOT');
        $this->hApp_SERVER_SystemRoot = $this->SysVarItem($_SERVER, 'SystemRoot');
        $this->hApp_json = $this->SysVar($_SERVER);
        
        return true;
    }

    private function env() {

        $this->env_name = self::$envName;
        $this->env_SERVER_SERVER_ADMIN = $this->SysVarItem($_SERVER, 'SERVER_ADMIN');
        
        return true;
    }

    private function conf() {

        $this->cf_json = $this->ClassExport('Conf');
        
        return true;
    }

    private function user() {

        $this->totken = Token::$profil;
        
        return true;
    }

    private function hostClient() {

        $this->hClient_SERVER_REMOTE_PORT = $this->SysVarItem($_SERVER, 'REMOTE_PORT');
        $this->hClient_SERVER_REMOTE_ADDR = $this->SysVarItem($_SERVER, 'REMOTE_ADDR');
        $this->hClient_SERVER_HTTP_USER_AGENT = $this->SysVarItem($_SERVER, 'HTTP_USER_AGENT');
        
        return true;
    }

    private function session() {

        $this->token = Token::$profil;
        $this->ss_SERVER_HTTP_COOKIE = $this->SysVarItem($_SERVER, 'HTTP_COOKIE');
        
        if (isset($_SESSION) === true) {
            $this->ss_SESSION_JSON = $this->SysVar($_SESSION);
        }
        $this->ss_json = $this->ClassExport('Session');
        
        return true;
    }

    private function mock() {

        $this->mock_userIdCryptedS = self::$userPublicId;
        $this->mock_appIdCryptedS = self::$appPublicId;
        
        return true;
    }

    private function short() {

        $this->var_json = self::VOID;
        $this->app_json = self::VOID;
        $this->req_REQUEST_JSON = self::VOID;
        $this->u_json = self::VOID;
        $this->ss_json = self::VOID;
        $this->ss_SESSION_JSON = self::VOID;
        $this->cf_json = self::VOID;
        $this->hApp_json = self::VOID;
        $this->mock_json = self::VOID;
        $this->tr_back_json = self::VOID;
        $this->req_SERVER_SCRIPT_NAME = self::VOID;
        $this->req_SERVER_QUERY_STRING = self::VOID;
        $this->req_SERVER_REQUEST_METHOD = self::VOID;
        $this->req_SERVER_SERVER_PROTOCOL = self::VOID;
        $this->req_SERVER_GATEWAY_INTERFACE = self::VOID;
        $this->req_SERVER_REQUEST_SCHEME = self::VOID;
        $this->req_SERVER_SCRIPT_FILENAME = self::VOID;
        $this->req_SERVER_SERVER_PORT = self::VOID;
        $this->req_SERVER_HTTP_ACCEPT_ENCODING = self::VOID;
        $this->req_SERVER_HTTP_UPGRADE_INSECURE_REQUESTS = self::VOID;
        $this->req_SERVER_HTTP_ACCEPT = self::VOID;
        $this->req_SERVER_HTTP_CONNECTION = self::VOID;
        $this->req_SERVER_FCGI_ROLE = self::VOID;
        $this->hApp_SERVER_PATH = self::VOID;
        $this->hApp_SERVER_SYSTEMROOT = self::VOID;
        $this->hApp_SERVER_COMSPEC = self::VOID;
        $this->hApp_SERVER_PATHEXT = self::VOID;
        $this->hApp_SERVER_WINDIR = self::VOID;
        $this->hApp_SERVER_SYSTEMDRIVE = self::VOID;
        $this->hApp_SERVER_TEMP = self::VOID;
        $this->hApp_SERVER_TMP = self::VOID;
        $this->hApp_SERVER_QT_PLUGIN_PATH = self::VOID;
        $this->hApp_SERVER_PHPRC = self::VOID;
        $this->hApp_SERVER_PHP_FCGI_MAX_REQUESTS = self::VOID;
        $this->hApp_SERVER__FCGI_SHUTDOWN_EVENT_ = self::VOID;
        $this->hApp_SERVER_DOCUMENT_ROOT = self::VOID;
        $this->hApp_SERVER_CONTEXT_PREFIX = self::VOID;
        $this->hApp_SERVER_SERVER_SOFTWARE = self::VOID;
        $this->hApp_SERVER_SERVER_SIGNATURE = self::VOID;
        $this->hApp_SERVER_SystemRoot = self::VOID;
        
        return true;
    }

    private function logOptimize() {

        if ($this->logFullState === true) {
            
            switch ($this->errorLevel) {
                case 'notice' :
                    $this->line = self::VOID;
                    $this->method = self::VOID;
                    $this->class = self::VOID;
                    $this->instance = self::VOID;
                    $this->varJson = self::VOID;
                    $this->app_json = self::VOID;
                    $this->req_REQUEST_JSON = self::VOID;
                    $this->u_json = self::VOID;
                    $this->ss_json = self::VOID;
                    $this->ss_SESSION_JSON = self::VOID;
                    $this->cf_json = self::VOID;
                    $this->tr_back_json = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 3);
                    break;
                case 'warning' :
                    $this->app_json = self::VOID;
                    $this->req_REQUEST_JSON = self::VOID;
                    $this->u_json = self::VOID;
                    $this->ss_json = self::VOID;
                    $this->ss_SESSION_JSON = self::VOID;
                    $this->tr_back_json = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 5);
                    break;
                case 'fatal' :
                    $this->l_back_json = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 0);
                    break;
                default :
                    $this->short();
                    break;
            }
        }
        else {
            
            $this->short();
        }
        $toTrace = new stdClass();
        
        foreach ( $this as $k => $v ) {
            
            $v = $this->secureVar($v);
            $toTrace->$k = $v;
        }
        unset($toTrace->log);
        unset($toTrace->errorLevelInfo);
        
        return $toTrace;
    }

    private function logFileContent($toTrace, $sep = self::SEP, $sepReplace = self::SEP_REPLACE) {

        $this->log = json_encode($toTrace);
        $this->log = str_replace($sep, $sepReplace, $this->log);
        $this->log .= $sep;
        
        return true;
    }

    private function prepare($line, $method, $class, $var) {

        $this->sentence($line, $method, $class);
        $this->code($class, $method, $line, $var);
        $this->time();
        $this->request();
        $this->app();
        $this->hostApp();
        $this->env();
        $this->conf();
        $this->user();
        $this->hostClient();
        $this->session();
        $this->mock();
        
        $toTrace = $this->logOptimize();
        
        return $toTrace;
    }

    private function file($fileSeparator = self::FILE_SEPARATPOR, $fileExt = self::FILE_EXT, $fileWriteMode = self::FILE_WRITE_MODE) {

        if (is_dir(self::DIR) === false) {
            
            mkdir(self::DIR, 0777);
        }
        
        switch (self::$mockState) {
            case false :
                $prefix = '';
                break;
            default :
                $prefix = self::$mockName . $fileSeparator;
                break;
        }
        $userId = filter_var(self::$userPublicId, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $userId = str_replace('/', 'I', $userId);
        $userId = str_replace('\\', 'I', $userId);
        $userId = str_replace("'", 'I', $userId);
        $filename = self::DIR . $prefix . date(self::FILE_DATE_FORMAT, time()) . $fileSeparator . $userId . $fileExt;
        $fp = fopen($filename, $fileWriteMode);
        
        if ($fp === false)
            return false;
        
        fwrite($fp, $this->log);
        
        return fclose($fp);
    }

    private function securityLevelUpdate($errorLevel) {
        
        // @todo
        return $errorLevel;
    }

    private function t($codeDetailList, $errorTypeList, $line, $method, $class, $var = self::VOID, $res = self::VOID) {

        self::$envSequence++;
        
        $this->funcReturnState = $errorTypeList->funcReturn;
        $this->exitState = $errorTypeList->exit;
        $this->stdoutState = $errorTypeList->traceStdout;
        $this->fileState = $errorTypeList->traceFile;
        $this->logFullState = $errorTypeList->logFull;
        $this->funcReturnState = $errorTypeList->funcReturn;
        
        if ($this->exitState === true) {
            
            $this->exitFunc = self::EXIT_FUNC;
        }
        if ($this->stdoutState === true) {
            
            $this->stdoutFunc = self::STDOUT_FUNC;
        }
        if ($this->fileState === true) {
            
            $this->fileFunc = self::FILE_FUNC;
        }
        $this->errorLevel = $codeDetailList->errorLevel;
        $this->httpCode = $errorTypeList->httpCode;
        $this->securityLevel = $codeDetailList->securityLevel;
        $this->majorCode = $codeDetailList->majorCode;
        $this->majorShortMsg = $codeDetailList->majorShortMsg;
        $this->majorFullMsg = $codeDetailList->majorFullMsg;
        $this->secondaryCode = $codeDetailList->secondaryCode;
        $this->secondaryShortMsg = $codeDetailList->secondaryShortMsg;
        $this->secondaryFullMsg = $codeDetailList->secondaryFullMsg;
        
        $toTrace = $this->prepare($line, $method, $class, $var);
        
        $this->logFileContent($toTrace);
        
        $func = $this->fileFunc;
        
        if ($this->debugAll === true) {
            
            $func = 'stdout';
        }
        
        $this->$func();
        
        http_response_code($this->httpCode);
        
        $func = $this->stdoutFunc;
        $this->$func();
        
        $func = $this->exitFunc;
        $this->$func();
        
        return $this->returnValue;
    }
}

?>