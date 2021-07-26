<?php

return [
    'baseUrl' => env("OAUTH2_BASE_URL", "https://auth.chicagoartcc.org"),
    'authorizationEndpoint' => env("OAUTH2_AUTHORIZATION_ENDPOINT", "/oauth/authorize"),
    'tokenEndpoint' => env("OAUTH2_TOKEN_ENDPOINT", "/oauth/token"),
    'userEndpoint' => env("OAUTH2_USER_ENDPOINT", "/v1/info"),
    'redirectUrl' => env("OAUTH2_REDIRECT_URL", ""),
    'clientId' => env("OAUTH2_CLIENT_ID", ""),
    'clientSecret' => env("OAUTH2_CLIENT_SECRET", ""),
    'scopes' => explode(",", env("OAUTH2_SCOPES", "all"))
];