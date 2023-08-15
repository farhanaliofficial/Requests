<?php

namespace Farhan\Requests;

class Response{
	public $status_code;
	public $headers;
	public $content;

	public function __construct($status_code, $headers, $content){
		$this->status_code = $status_code;
		$this->headers = $headers;
		$this->content = $content;
	}
	public function getCode(){
		return $this->status_code;
	}
	public function getHeaders(){
		return $this->headers;
	}
	public function getBody(){
		return $this->content;
	}
}
