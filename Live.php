<?php

namespace dnshouse\Yii2AuthclientExtensions;

use yii\authclient\OAuth2;

class Live extends OAuth2 {

    public $authUrl = 'https://login.live.com/oauth20_authorize.srf';
    public $tokenUrl = 'https://login.live.com/oauth20_token.srf';
    public $apiBaseUrl = 'https://apis.live.net/v5.0';

    public function init() {
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(',', ['wl.signin','wl.basic','wl.emails','wl.contacts_emails']);
        }
    }
    
    protected function defaultNormalizeUserAttributeMap() {
        return [
            'email' => ['emails', 'account'],
        ];
    }

    protected function initUserAttributes() {
        return $this->api('me', 'GET');
    }

    protected function defaultName() {
        return 'live';
    }

    protected function defaultTitle() {
        return 'Live';
    }

}
