<?php


namespace App\OauthProviders;


use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;
use \Laravel\Socialite\Two\AbstractProvider;
use \Laravel\Socialite\Two\ProviderInterface;
class ZenDeskProvider extends AbstractProvider implements ProviderInterface
{
    protected $scopeSeparator = ' ';
    /*
     * Scopes requested
     */



    protected $scopes=['read'];

    public $url = '';


    protected function getAuthUrl($state)
    {
        // TODO: Implement getAuthUrl() method.
        $this->url  = $this->buildAuthUrlFromBase('https://techesthete.zendesk.com/oauth/authorizations/new', $state);
        $this->url = (str_replace('redirect_uri','return_uri',$this->url));
        return $this->url;
    }
    protected function getTokenUrl()
    {
        return 'https://techesthete.zendesk.com/oauth/tokens';
    }

    public function getAccessToken($code)
    {

        $client = new Client();
        $response = $client->request('POST',$this->getTokenUrl(),[
            'headers'=>[
                'Content-Type'=>'application/x-www-form-urlencoded'
            ],
            'form_params'    => ($this->getTokenFields($code)),
        ]);
//        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
//
//            'form_params'    => ($this->getTokenFields($code)),
//        ]);


        return $this->parseAccessToken($response->getBody());
    }

    protected function getTokenFields($code)
    {
        $base_args = parent::getTokenFields($code);
        //$base_args['grant_type'] = 'authorization_code';
        return $base_args;
    }

    protected function getUserByToken($token)
    {
        $url = 'https://techesthete.zendesk.com/api/v2/users/me.json';
        $response = $this->getHttpClient()->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-type'=>'application/json',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user){
        $user = $user['user'];
        return (new \Laravel\Socialite\Two\User())->setRaw($user)->map([
            'id'            => $user['id'],
            'email'         => $user['email'],
            'name'          => $user['name'],
            'phone'         => $user['phone'],
            'avatar'         => $user['photo'],
            'role'          => $user['role'],
            'authenticity_token'=>$user['authenticity_token'],
            'default_group_id'  =>$user['default_group_id']

        ]);
    }
}
