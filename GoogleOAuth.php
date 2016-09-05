<?php

namespace dnshouse\Yii2AuthclientExtensions;

use yii\authclient\OAuth2;

class GoogleOAuth extends OAuth2 {

    public $authUrl = 'https://accounts.google.com/o/oauth2/auth';
    public $tokenUrl = 'https://accounts.google.com/o/oauth2/token';
    public $apiBaseUrl = 'https://www.googleapis.com/plus/v1';

    public function init() {
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(' ', ['profile','email','https://www.googleapis.com/auth/contacts.readonly']);
        }
    }
    
    protected function defaultNormalizeUserAttributeMap() {
        return [
            'name' => 'displayName',
            'email' => ['emails', 0, 'value'],
        ];
    }

    protected function initUserAttributes() {
        return $this->api('people/me', 'GET');
    }

    protected function defaultName() {
        return 'google';
    }

    protected function defaultTitle() {
        return 'Google';
    }

}
