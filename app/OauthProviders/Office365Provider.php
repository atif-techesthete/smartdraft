<?php

namespace App\OauthProviders;


use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class Office365Provider extends AbstractProvider implements ProviderInterface {

    protected $scopeSeparator = ' ';
    /*
     * Scopes requested
     */


    protected $scopes=['offline_access','user.read','mail.read'];


    protected function getAuthUrl($state)
    {
        // TODO: Implement getAuthUrl() method.
        return $this->buildAuthUrlFromBase('https://login.microsoftonline.com/common/oauth2/v2.0/authorize', $state);
    }
    protected function getTokenUrl()
    {
        return 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
    }

    public function getAccessToken($code)
    {

        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            'headers' =>
                [
                    'Content-type'=>'application/x-www-form-urlencoded',
                ],
            'form_params'    => $this->getTokenFields($code),
        ]);

        return $this->parseAccessToken($response->getBody());
    }

    protected function getTokenFields($code)
    {
        $base_args = parent::getTokenFields($code);
        $base_args['grant_type'] = 'authorization_code';
        return $base_args;
    }

    protected function getUserByToken($token)
    {
        $url = 'https://graph.microsoft.com/v1.0/me';
        $response = $this->getHttpClient()->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-type'=>'application/json',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user){
        return (new User())->setRaw($user)->map([
            'email'         => $user['userPrincipalName'],
            'name'          => $user['displayName'],
            'firstName'     => $user['givenName'],
            'lastName'      => $user['surname'],

        ]);
    }
}
