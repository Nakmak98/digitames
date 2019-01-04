<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 04.01.2019
 * Time: 15:41
 */
namespace Logic;
/*
Задачи контроллера:
#############---------FORGET_PASSWORD_START------------###############
1)Из шаблона forget_password достать mail пользователя
2)Проверить есть ли пользователь с такой почтой в бд
3)Создать ссылку со сроком жизни 24 часа
4)Выполнить скрипт mail.php с заданной почтой
прикрепленной к сообщению ссылкой
5)
#############---------FORGET_PASSWORD_END------------#################
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
//require '../vendor/autoload.php';

class Email
{
    protected $mail;
    function __construct()
    {
        try{
            $this->mail = new PHPMailer(true);
            $this->mail->SMTPDebug = 3;                                 // Enable verbose debug output
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = 'smtp.mail.ru';                         // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->Username = 'digitames@mail.ru';                // SMTP username
            $this->mail->Password = 'gameportal2018';                   // SMTP password
            $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 587;                                    // TCP port to connect to
            $this->mail->CharSet = "UTF-8";
            $this->mail->setFrom('digitames@mail.ru', 'Digitames');
            $this->mail->isHTML(true);                                  // Set email format to HTML
        }
        catch(Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }

    function SendLinkForgetPass($email, $link)
    {
        try{
            $this->mail->addAddress($email, 'Dear Guest');
            $this->mail->Subject = 'Password recovering message';
            $this->mail->Body    = 'Для восстановления пароля перейди по ссылке: http://digitames.com/request/'.$link;
            $this->mail->send();
        }
        catch(Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }
}