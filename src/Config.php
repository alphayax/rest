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
     * @return boolean
     */
    public function isRequestToJsonEncode() {
        return $this->isRequestToJsonEncode;
    }

    /**
     * @param boolean $isRequestToJsonEncode
     */
    public function setIsRequestToJsonEncode( $isRequestToJsonEncode = true) {
        $this->isRequestToJsonEncode = $isRequestToJsonEncode;
    }

    /**
     * @return boolean
     */
    public function isReturnToJsonDecode() {
        return $this->isReturnToJsonDecode;
    }

    /**
     * @param boolean $isReturnToJsonDecode
     */
    public function setIsReturnToJsonDecode( $isReturnToJsonDecode = true) {
        $this->isReturnToJsonDecode = $isReturnToJsonDecode;
    }

    /**
     * @return boolean
     */
    public function isReturnObject() {
        return $this->isReturnObject;
    }

    /**
     * @param boolean $isReturnObject
     */
    public function setIsReturnObject( $isReturnObject = true) {
        $this->isReturnObject = $isReturnObject;
    }

}
