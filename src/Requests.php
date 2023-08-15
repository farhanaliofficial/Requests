<?php

namespace FarhanAliOfficial\Requests;

class Requests{
	public function request($method, $url, $data=[], $headers=[], $options=[]) {
		$allowRedirects = isset($options['allow_redirects']) ? $options['allow_redirects'] : true;
		$sslVerify = isset($options['ssl_verification']) ? $options['ssl_verification'] : true;
		
		$c = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if($method === "POST"){
			curl_setopt($c, CURLOPT_POST, true);
			curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($data));
		}

		if($allowRedirects){
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		}

		if($sslVerify){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		}else{
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		}

		curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($c);
		$status_code = curl_getinfo($c, CURLINFO_HTTP_CODE);
		$headers = curl_getinfo($c);

		curl_close($c);

		return new Response($status_code, $headers, $response);
	}

	public function get($url, $headers=[], $options=[]) {
		return $this->request("GET", $url, [], $headers, $options);
	}

	public function post($url, $data=[], $headers=[], $options=[]) {
		return $this->request("POST", $url, $data, $headers, $options);
	}
}
