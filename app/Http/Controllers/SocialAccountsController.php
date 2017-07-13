<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class SocialAccountsController extends Controller
{
  protected $uid;

  private $accountProviders = [
    'FacebookProvider' => 'Facebook',
    'TwitterProvider' => 'Twitter',
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
        $users[] = [
          'provider' => $this->accountProviders[$account->provider],
          'user_name' => \Auth::user()->name,
        ];
      }
      return view('accounts.index', compact('users'));
    }
}
