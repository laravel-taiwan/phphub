<?php

use Phphub\Listeners\GithubAuthenticatorListener;
use Phphub\Listeners\UserCreatorListener;

class AuthController extends BaseController implements GithubAuthenticatorListener, UserCreatorListener
{
    /**
     * Authenticate with github
     */
    public function login()
    {
        // Redirect from Github
        if (Input::has('code'))
        {
            return App::make('Phphub\Github\GithubAuthenticator')->authByCode($this, Input::get('code'));
        }

        if (!Session::has('url.intended'))
        {
            Session::put('url.intended', URL::previous());
        }
        // redirect to the github authentication url
        return Redirect::to((string) OAuth::consumer('GitHub')->getAuthorizationUri());
    }

    public function logout()
    {
        Auth::logout();
        Flash::success(lang('Operation succeeded.'));
        return Redirect::route('home');
    }

    public function loginRequired()
    {
        return View::make('auth.loginrequired');
    }

    public function adminRequired()
    {
        return View::make('auth.adminrequired');
    }

    /**
     * Shows a user what their new account will look like.
     */
    public function create()
    {
        if ( ! Session::has('userGithubData'))
        {
            return Redirect::route('login');
        }
        $githubUser = array_merge(Session::get('userGithubData'), Session::get('_old_input', []));
        return View::make('auth.signupconfirm', compact('githubUser'));
    }

    /**
     * Actually creates the new user account
     */
    public function store()
    {
        if ( ! Session::has('userGithubData'))
        {
            return Redirect::route('login');
        }
        $githubUser = array_merge(Session::get('userGithubData'), Input::only('name', 'github_name'));
        return App::make('Phphub\Creators\UserCreator')->create($this, $githubUser);
    }

    public function userBanned()
    {
        if (Auth::check() && !Auth::user()->is_banned)
        {
            return Redirect::route('home');
        }
        return View::make('auth.userbanned');
    }

    /**
     * ----------------------------------------
     * UserCreatorListener Delegate
     * ----------------------------------------
     */

    public function userValidationError($errors)
    {
        return Redirect::to('/');
    }

    public function userCreated($user)
    {
        Auth::login($user, true);
        Session::forget('userGithubData');

        Flash::success(lang('Congratulations and Welcome!'));

        return Redirect::intended();
    }

    /**
     * ----------------------------------------
     * GithubAuthenticatorListener Delegate
     * ----------------------------------------
     */

    // 資料庫找不到使用者, 執行新使用者註冊
    public function userNotFound($githubData)
    {
        Session::put('userGithubData', $githubData);
        return Redirect::route('signup');
    }

    // 資料庫有使用者資訊, 登入使用者
    public function userFound($user)
    {
        Auth::login($user, true);
        Session::forget('userGithubData');

        Flash::success(lang('Operation succeeded.'));

        return Redirect::intended();
    }

    // 使用者封鎖
    public function userIsBanned($user)
    {
        return Redirect::route('user-banned');
    }
}
