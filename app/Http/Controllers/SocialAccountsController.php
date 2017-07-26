<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class SocialAccountsController extends Controller
{
  protected $uid;

  private $accountProviders = [
    'FacebookProvider' => [
      'name' => 'Facebook',
      'machine_name' => 'facebook',
    ],
    'TwitterProvider' => [
      'name' => 'Twitter',
      'machine_name' => 'twitter', // Machine name is used in generating redirect url.
    ],
  ];

  public function __construct()
  {
    $this->middleware('auth');

    if(\Auth::check()) {
      $this->uid = \Auth::user()->id;
    }
    else {
      new AccessDeniedException('Access Denied');
    }
  }
    public function index() {
      if(\Auth::check()) {
        $this->uid = \Auth::user()->id;
      }
      $connectedAccounts = SocialAccount::whereUserId($this->uid)->get();
      $users = [];
      foreach ($connectedAccounts as $account) {
        $users['connected'][] = [
          'provider' => $this->accountProviders[$account->provider],
          'user_name' => \Auth::user()->name,
        ];
      }
      $users['not_connected_providers'] = $this->getDisconnectedAccounts($connectedAccounts);
      return view('accounts.index', compact('users'));
    }

  /**
   * Retrieve service providers which are not synced yet.
   *
   * @param $connectedAccounts
   *   Connected accounts to current user.
   * @return array
   */
    public function getDisconnectedAccounts($connectedAccounts) {
      $providers = $this->accountProviders;
      foreach ($connectedAccounts as $account) {
        unset($providers[$account->provider]);
      }
      return $providers;
    }
}
