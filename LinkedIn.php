<?php

namespace dnshouse\Yii2AuthclientExtensions;

use yii\authclient\OAuth2;
use yii\web\HttpException;
use Yii;

class LinkedIn extends OAuth2 {

    public $authUrl = 'https://www.linkedin.com/uas/oauth2/authorization';
    public $tokenUrl = 'https://www.linkedin.com/uas/oauth2/accessToken';
    public $apiBaseUrl = 'https://api.linkedin.com/v1';
    public $attributeNames = [
        'id',
        'email-address',
        'first-name',
        'last-name',
        'public-profile-url',
    ];

    public function init() {
        parent::init();
        if ($this->scope === null) {
            $this->scope = implode(' ', [
                'r_basicprofile',
                'r_emailaddress',
            ]);
        }
    }

    protected function defaultNormalizeUserAttributeMap() {
        return [
            'name' => function ($attributes) {
                return $attributes['first-name'] . ' ' . $attributes['last-name'];
            },
            'email' => 'email-address',
        ];
    }
    
    protected function initUserAttributes() {
        return $this->api('people/~:(' . implode(',', $this->attributeNames) . ')', 'GET');
    }

    public function buildAuthUrl(array $params = []) {
        $authState = $this->generateAuthState();
        $this->setState('authState', $authState);
        $params['state'] = $authState;

        return parent::buildAuthUrl($params);
    }

    public function fetchAccessToken($authCode, array $params = []) {
        $authState = $this->getState('authState');
        if (!isset($_REQUEST['state']) || empty($authState) || strcmp($_REQUEST['state'], $authState) !== 0) {
            throw new HttpException(400, 'Invalid auth state parameter.');
        } else {
            $this->removeState('authState');
        }

        return parent::fetchAccessToken($authCode, $params);
    }

    protected function apiInternal($accessToken, $url, $method, array $params, array $headers) {
        $params['oauth2_access_token'] = $accessToken->getToken();

        return $this->sendRequest($method, $url, $params, $headers);
    }

    protected function defaultReturnUrl() {
        $params = $_GET;
        unset($params['code']);
        unset($params['state']);
        $params[0] = Yii::$app->controller->getRoute();

        return Yii::$app->getUrlManager()->createAbsoluteUrl($params);
    }

    protected function generateAuthState() {
        return sha1(uniqid(get_class($this), true));
    }

    protected function defaultName() {
        return 'linkedin';
    }

    protected function defaultTitle() {
        return 'LinkedIn';
    }

}
