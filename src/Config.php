<?php
namespace alphayax\rest;

class Config {

    /** @var bool Send post data in Json or not */
    protected $isRequestToJsonEncode = true;

    /** @var bool Indicate if the return is in JSON format */
    protected $isReturnToJsonDecode = true;

    /** @var bool Return assoc array instead of \stdClass */
    protected $isReturnObject = false;

    /**
     * If true, perform a json_encode before sending the request
     * @return boolean
     */
    public function isRequestToJsonEncode() {
        return $this->isRequestToJsonEncode;
    }

    /**
     * Perform a json_encode before sending the request
     * @param boolean $isRequestToJsonEncode
     */
    public function setIsRequestToJsonEncode( $isRequestToJsonEncode = true) {
        $this->isRequestToJsonEncode = $isRequestToJsonEncode;
    }

    /**
     * If true, perform a json_decode on the result
     * @return boolean
     */
    public function isReturnToJsonDecode() {
        return $this->isReturnToJsonDecode;
    }

    /**
     * Perform a json_decode on the result
     * @param boolean $isReturnToJsonDecode
     */
    public function setIsReturnToJsonDecode( $isReturnToJsonDecode = true) {
        $this->isReturnToJsonDecode = $isReturnToJsonDecode;
    }

    /**
     * If isReturnToJsonDecode is set to TRUE AND if isReturnObject is set to TRUE, result will be a stdClass
     * @return boolean
     */
    public function isReturnObject() {
        return $this->isReturnObject;
    }

    /**
     * If isReturnToJsonDecode, Result will be a stdClass. Associative array otherwise
     * @param boolean $isReturnObject
     */
    public function setIsReturnObject( $isReturnObject = true) {
        $this->isReturnObject = $isReturnObject;
    }

}
