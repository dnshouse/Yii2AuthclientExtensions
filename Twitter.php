<?php

namespace dnshouse\Yii2AuthclientExtensions;

use yii\authclient\OAuth1;

class Twitter extends OAuth1 {

    public $authUrl = 'https://api.twitter.com/oauth/authenticate';
    public $requestTokenUrl = 'https://api.twitter.com/oauth/request_token';
    public $requestTokenMethod = 'POST';
    public $accessTokenUrl = 'https://api.twitter.com/oauth/access_token';
    public $accessTokenMethod = 'POST';
    public $apiBaseUrl = 'https://api.twitter.com/1.1';
    public $attributeParams = ['include_email' => 'true'];

    protected function initUserAttributes() {
        return $this->api('account/verify_credentials.json', 'GET', $this->attributeParams);
    }

    protected function defaultName() {
        return 'twitter';
    }

    protected function defaultTitle() {
        return 'Twitter';
    }

}
