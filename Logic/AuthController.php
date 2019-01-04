<?php /** @noinspection PhpUndefinedMethodInspection */
/** @noinspection ALL */

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

    function getLoginForm($request, $response, $args) {
        return $this->container['view']->render($response, 'sign_in.html', $this->context);
    }

    function getForgetPass($request, $response, $args) {
        return $this->container['view']->render($response, 'forget_password.html', $this->context);
    }

    function getMd5EmailCrypt($email){
        return md5($email);
    }

    function handlerForgetPass($request, $response, $args) {
        $email = $_POST['email'];

        $manager = new Manager();
        $sql = "select email from users where email = '$email'";
        if (!$manager -> getAssocResult($sql))
        {
            return $this->container['view']->render($response, 'forget_password.html', [
                'error' => 'Пользователь с таким email не зарегистрирован.'
            ]);
        }
        $md5email = $this->getMd5EmailCrypt($email);
        $sql = "insert into forget_password(email,md5email) values ('$email','$md5email')";
        $manager ->getResult($sql);

        $forget_password_email = new Email();
        $forget_password_email ->SendLinkForgetPass($email,$md5email);
        return $this->container['view']->render($response, 'sign_in.html', [
            'success' => 'На вашу почту было выслано сообщение. Зайдите на вашу почту и следуйте инструкции.'
        ]);
    }

    function getNewPassForm($request, $response, $args) {
        $md5email_real = $args['md5email'];
        $sql = "select email, TTL from forget_password where md5email = '$md5email_real'";
        $manager = new Manager();
        $forget_password = $manager ->getAssocResult($sql);
        if(!$forget_password)
        {
            return $this->container['view']->render($response, 'error.html', [
                'error' => 'Страница не найдена.'
            ]);
        }
        $ttl = $forget_password ['TTL'];
        $ttl =  strtotime($ttl);
        $real_time = strtotime(date("Y-m-d H:i:s"));
        if($ttl - $real_time > 24 * 3600)
        {
            return $this->container['view']->render($response, 'error.html', [
                'error' => 'Страница не найдена.'
            ]);
        }
        return $this->container['view']->render($response, 'new_password.html', [
            'email' => $forget_password['email']
        ]);
    }

    function CreateNewPass($request, $response, $args) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $repeat_password = $_POST['repeat_password'];
        if($new_password != $repeat_password)
        {
            return $this->container['view']->render($response, 'new_password.html', [
                'error' => 'Пароли не совпадают.'
            ]);
        }
        $sql = "update users set password = '$new_password' where email = '$email'";
        $manager = new Manager();
        $manager ->getResult($sql);

        $sql = "DELETE FROM forget_password WHERE email = '$email';";
        $manager ->getResult($sql);

        return $this->container['view']->render($response, 'sign_in.html', [
            'success' => 'Выш пароль успешно изменен.'
        ]);
    }

    function signIn($request, $response, $args) {
        $auth = AuthenticateUser::getInstance($_POST);
        $user = $auth->authenticate();
        if ($user) {
            $auth->login();
            return $this->container['view']->render($response, 'profile.html');
        }
        //TODO redirect to /profile/
        return $this->container['view']->render($response, 'sign_in.html', [
            'error' => 'Неверный логин / пароль',
        ]);
    }

    function logout($request, $response, $args) {
        $this->user->logout();
        return $response->withStatus(302)->withHeader('Location', '/');
    }
}