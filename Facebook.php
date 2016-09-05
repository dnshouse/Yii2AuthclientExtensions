<?php

namespace dnshouse\Yii2AuthclientExtensions;

use yii\authclient\OAuth2;

class Facebook extends OAuth2 {

    public $authUrl = 'https://www.facebook.com/dialog/oauth';
    public $tokenUrl = 'https://graph.facebook.com/oauth/access_token';
    public $apiBaseUrl = 'https://graph.facebook.com';
    public $scope = 'public_profile, user_friends, email';
    public $attributeNames = [
        'name',
        'email',
    ];

    protected function initUserAttributes() {
        return $this->api('me', 'GET', ['fields' => implode(',', $this->attributeNames)]);
    }

    protected function defaultName() {
        return 'facebook';
    }

    protected function defaultTitle() {
        return 'Facebook';
    }

    protected function defaultViewOptions() {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
        ];
    }

}
