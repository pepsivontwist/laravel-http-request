<?php

namespace Overburn\Tests\HttpRequest;

use Overburn\HttpRequest\HttpRequest;

class HttpRequestTest extends \PHPUnit_Framework_TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        $url = "httpbin.org/get";
        $this->commonBodyTest($url, "get");
    }

    public function testPost() {
        $url = "httpbin.org/post";
        $this->commonBodyTest($url, "post");        
    }

    public function testPut() {
        $url = "httpbin.org/put";
        $this->commonBodyTest($url, "put");
    }

    public function testPatch() {
        $url = "httpbin.org/patch";
        $this->commonBodyTest($url, "patch");
    }

    public function testDelete() {
        $url = "httpbin.org/delete";
        $this->commonBodyTest($url, "delete");
        
    }

    public function commonBodyTest($url, $method) {

        $parameters = ["test"=>"yes", "one"=>"two"];
        $body = ["body"=>"yes", "three"=>"four"];
        $files = ["file" => "LICENSE.md"];

        $options = [
            "method" => $method,
            "url" => $url,
            "params" => ["test"=>"yes", "one"=>"two"]
        ];

        if($method != "get") {
            $options["data"] = ["body"=>"yes", "three"=>"four"];
            $options["files"] = ["file" => "LICENSE.md"];
        }



        $jsonResult = HttpRequest::request($options);

        $result = json_decode($jsonResult["response"]);     

        $this->assertNotNull($result);

        $this->assertObjectHasAttribute("args", $result);
        $this->assertObjectHasAttribute("one", $result->args);
        $this->assertTrue($result->args->one == "two");

        if($method != "get") {
            $this->assertObjectHasAttribute("form", $result);
            $this->assertObjectHasAttribute("three", $result->form);
            $this->assertTrue($result->form->three == "four");

            $this->assertObjectHasAttribute("files", $result);
            $this->assertObjectHasAttribute("file", $result->files);

            $this->assertTrue($result->files->file == file_get_contents("LICENSE.md"));
        }
    }
}
