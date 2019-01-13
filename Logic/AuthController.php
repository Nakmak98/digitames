<?php

/**
 * Created by PhpStorm.
 * User: Nakmak
 * Date: 01.12.2018
 * Time: 23:20
 */

namespace Logic;
require_once 'AuthenticateUser.php';
require_once 'Manager.php';
require_once 'Email.php';

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
        $manager = new Manager();
        if ($this->isEmailExist($manager, $email)) {
            $md5email = $this->saveEncryptedKey($email, $manager);
            $forget_password_email = new Email();
            $forget_password_email->SendForgetPasswordEmail($email, $md5email);
            $this->context['success'] = 'На вашу почту было выслано сообщение. Зайдите на вашу почту и следуйте инструкции.';
            return $this->container['view']->render($response, 'sign_in.html', $this->context);
        } else {
            $this->context['error'] = 'Пользователь с таким email не зарегистрирован.';
            return $this->container['view']->render($response, 'forget_password.html', $this->context);
        }

    }

    public function getNewPasswordForm($request, $response, $args) {
        $user_md5email = $args['md5email'];
        $manager = new Manager();
        try {
            $forget_password_token = $this->getForgetPasswordToken($user_md5email, $manager);
            $this->checkForgetPasswordToken($forget_password_token);
        } catch (\Exception $e) {
            $this->context['error'] = 'Страница не найдена';
            return $this->container['view']->render($response, 'error.html', $this->context);
        }
        $this->context['email'] = $forget_password_token['email'];
        return $this->container['view']->render($response, 'new_password.html', $this->context);
    }

    public function CreateNewPassword($request, $response, $args) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $repeat_password = $_POST['repeat_password'];
        if ($new_password != $repeat_password) {
            $this->context['error'] = 'Пароли не совпадают';
            return $this->container['view']->render($response, 'new_password.html', $this->context);
        }
        $manager = new Manager();
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $manager->getResult("update users set password = '$new_password' where email = '$email'");
        $manager->getResult("DELETE FROM forget_password WHERE email = '$email';");
        $this->context['success'] = 'Выш пароль успешно изменен.';
        return $this->container['view']->render($response, 'sign_in.html', $this->context);
    }

    public function signIn($request, $response, $args) {
        $auth = AuthenticateUser::getInstance($_POST);
        $user = $auth->authenticate();
        if ($user) {
            $auth->login();
            return $this->container['view']->render($response, 'profile.html', $this->context);
        }
        //TODO redirect to /profile/
        $this->context['error'] = 'Произошла ошибка аутентификации. Пожалуйста, убедитесь, что вы ввели верные данные';
        return $this->container['view']->render($response, 'sign_in.html', $this->context);
    }

    public function logout($request, $response, $args) {
        $this->user->logout();
        return $response->withStatus(302)->withHeader('Location', '/');
    }


    protected function isEmailExist($manager, $email) {
        $sql = "select email from users where email = '$email'";
        return $manager->getAssocResult($sql);
    }

    /**
     * @param $email
     * @param Manager $manager
     * @return string
     */
    protected function saveEncryptedKey($email, Manager $manager): string {
        $md5email = md5($email); // encrypted email is a unique user key
        $ttl = date("Y-m-d H:i:s");
        $sql = "insert into forget_password(email,md5email, TTL) values ('$email','$md5email', '$ttl')";
        $manager->getResult($sql);
        return $md5email;
    }

    /**
     * @param $user_md5email
     * @param Manager $manager
     * @return array|null
     */
    protected function getForgetPasswordToken($user_md5email, Manager $manager) {
        $sql = "select email, TTL from forget_password where md5email = '$user_md5email'";
        $forget_password = $manager->getAssocResult($sql);
        return $forget_password;
    }

    /**
     * @param $forget_password_token
     * @throws Exception is ttl has expired
     */
    protected function checkForgetPasswordToken($forget_password_token) {
        $ttl = strtotime($forget_password_token['TTL']);
        $real_time = strtotime(date("Y-m-d H:i:s"));
        if ($ttl - $real_time > 24 * 3600) {
            throw new \Exception('ttl of forget password token has expired');
        }
    }
}