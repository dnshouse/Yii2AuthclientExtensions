# yii2-authclient-extended

This extension adds Yahoo OAuth2 supporting for [yii2-authclient](https://github.com/yiisoft/yii2-authclient).

[![Latest Stable Version](https://poser.pugx.org/dnshouse/yii2-authclient-extended/v/stable)](https://packagist.org/packages/dnshouse/yii2-authclient-extended)
[![Total Downloads](https://poser.pugx.org/dnshouse/yii2-authclient-extended/downloads)](https://packagist.org/packages/dnshouse/yii2-authclient-extended)
[![Monthly Downloads](https://poser.pugx.org/dnshouse/yii2-authclient-extended/d/monthly)](https://packagist.org/packages/dnshouse/yii2-authclient-extended)
[![Latest Unstable Version](https://poser.pugx.org/dnshouse/yii2-authclient-extended/v/unstable)](https://packagist.org/packages/dnshouse/yii2-authclient-extended)
[![License](https://poser.pugx.org/dnshouse/yii2-authclient-extended/license)](https://packagist.org/packages/dnshouse/yii2-authclient-extended)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dnshouse/yii2-authclient-extended "*"
```

or add

```json
"dnshouse/yii2-authclient-extended": "*"
```

to the `require` section of your composer.json.

## Usage

You must read the yii2-authclient [docs](https://github.com/yiisoft/yii2/blob/master/docs/guide/security-auth-clients.md)


```php
'components' => [
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'google' => [
                'class' => 'dnshouse\Yii2AuthclientExtensions\GoogleOAuth',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'yahoo' => [
                'class' => 'dnshouse\Yii2AuthclientExtensions\Yahoo',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'live' => [
                'class' => 'dnshouse\Yii2AuthclientExtensions\Live',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'facebook' => [
                'class' => 'dnshouse\Yii2AuthclientExtensions\Facebook',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'linkedin' => [
                'class' => 'dnshouse\Yii2AuthclientExtensions\LinkedIn',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'twitter' => [
                'class' => 'dnshouse\Yii2AuthclientExtensions\Twitter',
                'consumerKey' => '',
                'consumerSecret' => '',
            ],
        ],
    ],
 ]
 ```
