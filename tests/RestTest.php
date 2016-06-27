<?php

/**
 * Class RestTest
 */
class RestTest extends PHPUnit_Framework_TestCase {

    public function testConstruct() {

        /// Rest
        $rest = new \alphayax\rest\Rest( 'https://api.github.com/users/alphayax/repos');
        $this->assertAttributeInstanceOf( \alphayax\rest\Config::class, 'config', $rest);

        /// Config (Default values)
        $config = $rest->getConfig();
        $this->assertAttributeEquals( true, 'isRequestToJsonEncode', $config);
        $this->assertAttributeEquals( true, 'isReturnToJsonDecode', $config);
        $this->assertAttributeEquals( false, 'isReturnObject', $config);
    }

    public function testHeader() {
        $rest = new \alphayax\rest\Rest( 'https://api.github.com/users/alphayax/repos');
        $this->assertAttributeEmpty( 'httpHeaders', $rest);
        $rest->addHeader( 'User-Agent', 'alphayax-php_utils');
        $this->assertAttributeNotEmpty( 'httpHeaders', $rest);
        $this->assertAttributeEquals( ['User-Agent'=> 'alphayax-php_utils'], 'httpHeaders', $rest);
        $this->assertAttributeCount(1, 'httpHeaders', $rest);
        $rest->setContentType_MultipartFormData();
        $this->assertAttributeCount(2, 'httpHeaders', $rest);
        $rest->setContentType_XFormURLEncoded();
        $this->assertAttributeCount(2, 'httpHeaders', $rest);
    }

    public function testGET() {
        $rest = new \alphayax\rest\Rest( 'http://jsonplaceholder.typicode.com/posts/1');
        $rest->addHeader( 'User-Agent', 'alphayax-php_utils');
        $this->assertAttributeEmpty( 'curlResponse', $rest);
        $rest->GET();
        $this->assertAttributeNotEmpty( 'curlResponse', $rest);
        $result = $rest->getCurlResponse();
        $this->assertAttributeEquals( $result, 'curlResponse', $rest);
    }

    public function testPOST() {
        $rest = new \alphayax\rest\Rest( 'http://jsonplaceholder.typicode.com/posts');
        $rest->addHeader( 'User-Agent', 'alphayax-php_utils');
        $this->assertAttributeEmpty( 'curlResponse', $rest);
        $rest->POST([
            'userId' => 1,
            'title'  => 'fooBar',
            'body'  => 'toto',
        ]);
        $this->assertAttributeNotEmpty( 'curlResponse', $rest);
    }

    public function testPUT() {
        $rest = new \alphayax\rest\Rest( 'http://jsonplaceholder.typicode.com/posts/1');
        $rest->addHeader( 'User-Agent', 'alphayax-php_utils');
        $this->assertAttributeEmpty( 'curlResponse', $rest);
        $rest->PUT([
            'id' => 1,
            'title' => 'toto',
        ]);
        $this->assertAttributeNotEmpty( 'curlResponse', $rest);
    }

    public function testDELETE() {
        $rest = new \alphayax\rest\Rest( 'http://jsonplaceholder.typicode.com/posts/1');
        $rest->DELETE();
    }

}
