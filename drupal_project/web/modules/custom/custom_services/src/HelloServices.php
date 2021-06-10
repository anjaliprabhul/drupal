<?php

/**
* @file providing the service that say hello world and hello 'given name'.
*
*/

namespace  Drupal\custom_services;

use GuzzleHttp\Client;

class HelloServices {

		protected $httpClient;

		public function __construct(Client $http_client)
		{
     $this->httpClient = $http_client;
		}
		public function initiate()
		{
      $response = $this->httpClient->request('post', 'https://api.badgr.io/o/token',
       [
          'form_params' => ['username'=>'anjalinair4046@gmail.com',
                            'password'=>'Theertha'],
       ]);
        $status_code = $response->getStatusCode();
        if ($status_code == '200')
            {
              //get body and get both tokens
              $body = $response->getBody()->getContents();
            }
      	$accesstoken = json_decode($body)->access_token;
      	$refreshtoken = json_decode($body)->refresh_token;
      	$token = array('accesstoken' => $accesstoken, 'refreshtoken' => $refreshtoken );
      return $token;
		}
		public function refresh($refreshtoken)
		{
			$refresh_token = $this->httpClient->request('post', 'https://api.badgr.io/o/token',
			 [
          'form_params' => ['grant_type'=>'refresh_token',
                            'refresh_token'=>'$refreshtoken'],
      	])->getBody()->getContents();

			return $refresh_token;
		}
		public function authenticate($accessToken) 
		{
    	$response = $this->httpClient->request(
          'get', 'https://api.badgr.io/v2/users/self', [
            'headers' => ['Authorization' => 'Bearer ' . $accessToken],
          ]
      );
    	$body = $response->getBody()->getContents();
    	return $body;
  	}
  	public function badgrIssuer($accessToken)
    {
      $response = \Drupal::httpClient()->post('https://api.badgr.io/v2/issuers', [
                'form_params' => [
                                  'name'=> 'anjali',
                                  'email'=> 'anjalinair4046@gmail.com',
                                  'description'=> 'Test2',
                                  'url'=>'https://www.powercms.in/',
                                  ],
                 'headers' => [
                           'Authorization'=> 'Bearer '.$accessToken
                          ],
            ])->getBody()->getContents();
      return $response;
    }
    public function getissuer($accessToken) 
    {
    	$response = $this->httpClient->request(
          'get', 'https://api.badgr.io/v2/users/self', [
            'headers' => ['Authorization' => 'Bearer ' . $accessToken],
          ]
      );
    	$body = $response->getBody()->getContents();
    	return $body;
  	}
  	public function badgrupdateissuer($accessToken, array $update_issure, string $entityId) {
    $response = $this->httpClient->request(
          'put', 'https://api.badgr.io/v2/issuers/' . $entityId, [
            'form_params' => $update_issure,
            'headers' => ['Authorization' => 'Bearer ' . $accessToken],
          ]
      )->getBody()->getContents();
    return $response;
  }

    public function deleteissuer($accessToken, string $entityId) {
    $response = $this->httpClient->request(
          'delete', 'https://api.badgr.io/v2/issuers/' . $entityId,
          [
​
            'headers' => ['Authorization' => 'Bearer ' . $accessToken],
​
          ],
      )->getBody()->getContents();
​
    return $response;
​
  }
  public function createissuerbadges($accessToken, array $create_badge, string $entityId) {
    $response = $this->httpClient->request(
          'post',
          'https://api.badgr.io/v2/issuers/' . $entityId . '/badgeclasses',
          [
            'form_params' => $create_badge,
            'headers' => ['Authorization' => 'Bearer ' . $accessToken],
          ]
      )->getBody()->getContents();
​
    return $response;
​
  }

 //  protected $say_something;

 //  public function __construct() {
 //   $this->say_something = 'Hello World!';
 //  }

 // public function  sayHello($name = ''){
 //   if (empty($name)) {
 //     return $this->say_something;
 //   }
 //   else {
 //     return "Hello " . $name . "!";
 //   }
	}