<?php

namespace App\Providers;

use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\GenericProvider;

class ZAUProvider extends GenericProvider
{
    private $provider;

    public function __construct()
    {
        return parent::__construct([
            "clientId" => config("oauth2.clientId"),
            "clientSecret" => config("oauth2.clientSecret"),
            "redirectUri" => route("login"),
            "urlAuthorize" => config("oauth2.urlAuthorize"),
            "urlAccessToken" => config("oauth2.tokenEndpoint"),
            "urlResourceOwnerDetails" => config("oauth2.userEndpoint"),
            "scopes" => config("oauth2.scopes"),
            "scopeSeperator" => " ",
        ]);
    }

    // Not yet implemented
    public static function updateToken($token)
    {
        return null;
    }

    public function redirect(Request $request)
    {
        $url = $this->getauthorizationUrl();
        $request->session()->put("oauthstate", $this->getState());
        return redirect()->away($url);
    }
}
