<?php defined('BASEPATH') OR exit('No direct script access allowed');



use Google\Client;
use Google\Service\Analytics;


require_once FCPATH . 'vendor/autoload.php';

// require_once __DIR__ . '/vendor/autoload.php';



class Google_client {
    protected $client;

    

    public function __construct() {
 
       
        $this->client = new Client();
   
        $this->client->setApplicationName('Career Development Center');

        // echo "hello";
        // exit();

        $this->client->setClientId('117162768991068672313');
        $this->client->setClientSecret('1714fa10aa6a8786df4bea6fa2bcc869da74cdd7');
        $this->client->setRedirectUri('https://app.cdc-azamgarh.com/analytics/oauth_callback');
        $this->client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
    }

    public function getAuthUrl() {
        return $this->client->createAuthUrl();
    }

    public function authenticate($code) {
        $this->client->fetchAccessTokenWithAuthCode($code);
    }

    public function getClient() {
        return $this->client;
    }
}
