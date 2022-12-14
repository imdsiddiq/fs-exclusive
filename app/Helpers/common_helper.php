<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

if (! function_exists("getSettings")) {
    function getSettings($key = "") {
        $db      = \Config\Database::connect();
        $result = $db->table("settings")->where("key", $key)->get()->getRow()->value;

        return $result;
    }
}

if (! function_exists("getCurrency")) {
    function getCurrency($id = "") {
        $db      = \Config\Database::connect();
        $result = $db->table("country")->where("id", $id)->get()->getRow()->currency;

        return $result;
    }
}

// Google Login url
function googleLoginURL() {
    $googleClientID      = "561934716888-tm501ggj1m5alcf5o25nbmnb7qo1s1it.apps.googleusercontent.com";
    $googleClientSecret  = "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";

    if (($googleClientID == NULL) || ($googleClientID == 'google_client_id')) {
        return "javascript:;";
    }

    require_once APPPATH.'/vendor/autoload.php';

    // Make object of Google API Client for call Google API
    $googleClient = new Google_Client();

    // Set the OAuth 2.0 Client ID
    $googleClient->setClientId($googleClientID);

    // Set the OAuth 2.0 Client Secret key
    $googleClient->setClientSecret($googleClientSecret);

    // Set the OAuth 2.0 Redirect URI
    $googleClient->setRedirectUri(site_url("login/google"));

    $googleClient->addScope('email');
    $googleClient->addScope('profile');
    $googleClient->addScope('openid');

    return $googleClient->createAuthUrl();
}

// Facebook Login url
function facebookLoginURL() {
    $facebookAppID      = getSettings('facebook_app_id');
    $facebookAppSecret  = getSettings('facebook_secret');

    if (($facebookAppID == NULL) || ($facebookAppID == 'facebook_app_id') || ($_SESSION['logged_in'] == true)) {
        return "javascript:;";
    }

    require_once dirname(dirname(__dir__)).'/vendor/autoload.php';

    $facebook = new \Facebook\Facebook([
          'app_id'      => getSettings('facebook_app_id'),
          'app_secret'     => getSettings('facebook_secret'),
          'default_graph_version'  => 'v2.10'
        ]);

    $facebookOutput = '';

    $facebookHelper = $facebook->getRedirectLoginHelper();

    $facebookPermissions = ['email']; // Optional permissions
    $facebookLoginURL = $facebookHelper->getLoginUrl(getSettings('facebook_redirect_uri'), $facebookPermissions);
    
    // Render Facebook login button
    return $facebookLoginURL;
}

// ------------------------------------------------------------------------
/* End of file common_helper.php */
/* Location: ./system/helpers/common.php */
