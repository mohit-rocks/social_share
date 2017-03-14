<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;
use Auth;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
      if ($provider == 'FacebookProvider') {
        return Socialite::driver('facebook')->scopes(['publish_actions'])->redirect();
      }
      else {
        return Socialite::driver($provider)->scopes(['publish_actions'])->redirect();
      }
    }

    public function callback(SocialAccountService $service, $provider)
    {
      $user = $service->createOrGetUser(Socialite::driver($provider));
      \Auth::login($user, true);
      return redirect()->to('/');
    }
}
