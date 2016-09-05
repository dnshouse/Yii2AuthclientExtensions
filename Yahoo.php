<?php

namespace dnshouse\Yii2AuthclientExtensions;

use yii\authclient\OAuth2;

class Yahoo extends OAuth2 {

    public $authUrl = 'https://api.login.yahoo.com/oauth2/request_auth';
    public $tokenUrl = 'https://api.login.yahoo.com/oauth2/get_token';
    public $apiBaseUrl = 'https://social.yahooapis.com/v1';

    protected function defaultNormalizeUserAttributeMap() {
        return [
            'id' => 'guid',
            'name' => function ($attributes) {
                return $attributes['givenName'] . ' ' . $attributes['familyName'];
            },
            'email' => ['emails', 0, 'handle'],
        ];
    }

    protected function initUserAttributes() {
        $guid = $this->api('me/guid?format=json', 'GET');
        $profile = $this->api('user/'. $guid['guid']['value'] .'/profile?format=json', 'GET');
        return $profile['profile'];
    }

    protected function defaultName() {
        return 'yahoo';
    }

    protected function defaultTitle() {
        return 'Yahoo';
    }

}
