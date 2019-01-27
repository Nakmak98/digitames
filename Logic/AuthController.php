<?php

/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:20
 */

namespace Logic;
require_once 'Auth.php';
require_once 'Manager.php';
require_once 'Email.php';
require_once 'PasswordRecovery.php';

class AuthController extends Controller {
    protected $login;
    protected $password;

    public function getLoginForm($request, $response, $args) {
        return $this->container['view']->render($response, 'sign_in.html', $this->context);
    }

    public function getForgetPasswordForm($request, $response, $args) {
        return $this->container['view']->render($response, 'forget_password.html', $this->context);
    }

    public function forgetPasswordHandler($request, $response, $args) {
        $email = $_POST['email'];
        $recover = new PasswordRecovery();
        if ($recover->isEmailExist($email)) {
            $recover->createEncryptedKey();
            $recover->sendEmail();
            $this->context['success'] = 'На вашу почту было выслано сообщение. Зайдите на вашу почту и следуйте инструкции.';
            return $this->container['view']->render($response, 'sign_in.html', $this->context);
        } else {
            $this->context['error'] = 'Пользователь с таким email не зарегистрирован.';
            return $this->container['view']->render($response, 'forget_password.html', $this->context);
        }

    }

    public function getNewPasswordForm($request, $response, $args) {
        $recover = new PasswordRecovery();
        try {
            $recover->checkForgetPasswordToken($args['md5email']);
        } catch (\Exception $e) {
            $this->context['error'] = 'Страница не найдена';
            return $this->container['view']->render($response, 'error.html', $this->context);
        }
        $this->context['email'] = $recover->recoveryToken['email'];
        return $this->container['view']->render($response, 'new_password.html', $this->context);
    }

    public function changePassword($request, $response, $args) {
        if ($_POST['new_password'] != $_POST['repeat_password']) {
            $this->context['error'] = 'Пароли не совпадают';
            return $this->container['view']->render($response, 'new_password.html', $this->context);
        }
        $recover = new PasswordRecovery();
        $recover->changePassword($_POST['email'], $_POST['new_password']);
        $this->context['success'] = 'Выш пароль успешно изменен.';
        return $this->container['view']->render($response, 'sign_in.html', $this->context);
    }

    public function signIn($request, $response, $args) {
        $auth = Auth::getInstance($_POST);
        $user = $auth->authenticate();
        if ($user) {
            $auth->login();
            $url = '/profile/';
            return $response->withRedirect($url);
        }
        $this->context['error'] = 'Произошла ошибка аутентификации. Пожалуйста, убедитесь, что вы ввели верные данные';
        return $this->container['view']->render($response, 'sign_in.html', $this->context);
    }

    public function logout($request, $response, $args) {
        $this->user->logout();
        return $response->withStatus(302)->withHeader('Location', '/');
    }




}