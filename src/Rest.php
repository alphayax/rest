<?php
namespace alphayax\rest;

/**
 * Class Rest
 * @package alphayax\utils
 * @author <alphayax@gmail.com>
 */
class Rest {

    /** @var resource */
    protected $curlHandler;

    /** @var array */
    protected $curlResponse;

    /** @var array */
    protected $curlGetInfo;

    /** @var array of HTTP Headers */
    protected $httpHeaders = [];

    /** @var \alphayax\rest\Config */
    protected $config;

    /**
     * Rest constructor.
     * @param string $url
     */
    public function __construct( $url){
        $this->config        = new Config();
        $this->curlHandler   = curl_init( $url);
    }

    /**
     * Perform a GET request
     * @param $curlPostData
     */
    public function GET( $curlPostData = null){
        curl_setopt( $this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        $this->addPostFields( $curlPostData);
        $this->exec();
    }

    /**
     * Perform a POST request
     * @param $curlPostData
     */
    public function POST( $curlPostData = null){
        curl_setopt( $this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $this->curlHandler, CURLOPT_POST, true);
        $this->addPostFields( $curlPostData);
        $this->exec();
    }

    /**
     * Perform a PUT request
     * @param $curlPostData
     */
    public function PUT( $curlPostData = null){
        curl_setopt( $this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $this->curlHandler, CURLOPT_CUSTOMREQUEST, 'PUT');
        $this->addPostFields( $curlPostData);
        $this->exec();
    }

    /**
     * Perform a DELETE request
     * @param $curlPostData
     */
    public function DELETE( $curlPostData = null){
        curl_setopt( $this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $this->curlHandler, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $this->addPostFields( $curlPostData);
        $this->exec();
    }

    /**
     * Add the Post Fields (if not null)
     * @param $curlPostData
     */
    protected function addPostFields( $curlPostData){
        if( ! is_null( $curlPostData)){
            $data = $this->config->isRequestToJsonEncode() ? json_encode( $curlPostData) : $curlPostData;
            curl_setopt( $this->curlHandler, CURLOPT_POSTFIELDS, $data);
        }
    }

    /**
     * Add a specific Header
     * @param string $headerName
     * @param string $headerContent
     */
    public function addHeader( $headerName, $headerContent) {
        $this->httpHeaders[ $headerName] = $headerContent;
    }

    /**
     * Define the content type as "application/x-www-form-urlencoded"
     */
    public function setContentType_XFormURLEncoded(){
        $this->addHeader( 'Content-Type', 'application/x-www-form-urlencoded');
        $this->config->setIsRequestToJsonEncode( false);
    }

    /**
     * Define the content type as "multipart/form-data"
     */
    public function setContentType_MultipartFormData(){
        $this->addHeader( 'Content-Type', 'multipart/form-data');
        $this->config->setIsRequestToJsonEncode( false);
    }

    /**
     * Return the HTTP Code
     * @return int
     */
    public function getHttpCode() {
        return $this->curlGetInfo[ 'http_code'];
    }

    /**
     * Define HTTP Headers in the REST call
     */
    protected function processHeaders(){
        if( empty( $this->httpHeaders)){
            return;
        }
        $HttpHeaders = [];
        foreach( $this->httpHeaders as $httpHeaderName => $httpHeaderValue){
            $HttpHeaders[] = "$httpHeaderName: $httpHeaderValue";
        }
        curl_setopt( $this->curlHandler, CURLOPT_HTTPHEADER, $HttpHeaders);
    }

    /**
     * Force curl verbosity
     */
    protected function addDebugInfos(){
        curl_setopt( $this->curlHandler, CURLINFO_HEADER_OUT, true);
        curl_setopt( $this->curlHandler, CURLOPT_VERBOSE, true);
    }

    /**
     * Execute the HTTP request
     * @throws \Exception
     */
    private function exec(){
        $this->processHeaders();
        $this->addDebugInfos();
        $this->curlResponse = curl_exec( $this->curlHandler);
        $this->curlGetInfo  = curl_getinfo( $this->curlHandler);
        if( $this->curlResponse === false) {
            curl_close( $this->curlHandler);
            throw new \Exception( 'Error occurred during curl exec. Additional info: ' . var_export( $this->curlGetInfo, true));
        }
        curl_close( $this->curlHandler);

        // Decode JSON if we need to
        if( $this->config->isReturnToJsonDecode()){
            $this->curlResponse = json_decode( $this->curlResponse, ! $this->config->isReturnObject());
        }
        $this->curlResponse;
    }

    /**
     * Return the response of the request
     * Will be empty until a call at exec (via GET, POST, DELETE or PUT)
     * @return mixed
     */
    public function getCurlResponse(){
        return $this->curlResponse;
    }

    /**
     * Force return as assoc array instead of \stdClass
     * @param boolean $returnAsArray
     * @deprecated use config instead
     */
    public function setReturnAsArray( $returnAsArray = true) {
        $this->config->setIsReturnObject( ! $returnAsArray);
    }

    /**
     * Perform a json_decode on the request result
     * @param boolean $isJson
     * @deprecated use config instead
     */
    public function setIsJson( $isJson = true) {
        $this->config->setIsRequestToJsonEncode( $isJson);
    }

    /**
     * Return the config object to specify preferences about sending and receiving
     * @return \alphayax\rest\Config
     */
    public function getConfig() {
        return $this->config;
    }

}
