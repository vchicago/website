<?php

namespace App\Http\Controllers;

use App\User;
use App\Providers\ZAUProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $provider;

    public function __construct()
    {
        $this->provider = new ZAUProvider;
    }

    public function login(Request $request) {
        if (!$request->has("code") || !$request->has("state")) {
            $authorizationUrl = $this->provider->getAuthorizationUrl();
            $request->session()->put("oauthstate", $this->provider->getState());
            return redirect()->away($authorizationUrl);
        }
        
        if ($request->input("state") !== session()->pull("oauthstate")) {
            throw new \Exception("Invalid OAuth2 State", 500);
        }

        try {
            $token = $this->provider->getAccessToken('authorization_code', [
                'code' => $request->input("code"),
            ]);
        } catch (IdentityProviderException $e) {
            Log::error("Error from identity provider");
            throw new \Exception("Error from identity provider", 500, $e);
        }

        $resourceOwner = json_decode(json_encode($this->provider->getResourceOwner($token)->toArray()))->user;
        if (!isset($resourceOwner->cid)) {
            throw new \Exception("Invalid response", 500);
        }

        $user = User::find($resourceOwner->cid);
        if (!$user) {
            return redirect('/')->with('error', 'You have not been found on the roster. If you have recently joined, please allow up to an hour for the roster to update.');
        }

        Auth::loginUsingId($resourceOwner->cid, true);
        return redirect("/dashboard")->with("success", "You have logged in successfully.");
    }

    public function logout() {
        if (!Auth::check()) {
            return redirect('/');
        } else {
            Auth::logout();
            return redirect('/')->with('success', 'You have been logged out.');
        }
    }
}
