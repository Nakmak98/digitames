<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Подробно о Cookies</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style = "background: #5c656f">
    <!--Navbar-->
    <?php
    if(isset($_COOKIE['user_id'])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php";
    }
    else {
        include $_SERVER['DOCUMENT_ROOT'] . "/templates/header_default.php";
    }
    ?>
    <!--Navbar-->
    <div class = "about_cookies">
        <div class = "head_cookies">Подробнее об использованиии <br>файлов cookie на сайте</div>
        <div class = "text_cookies">
            <ul>
                <li>
                    Cookie — это небольшие текстовые файлы, которые отправляются на ваш компьютер, когда вы посещаете веб-сайт.
                </li>
                <li>
                    Файлы cookie на веб-сайтах выполняют много различных функций, например, позволяют вам быстро и рационально
                    перемещаться между страницами, сохраняют ваши предпочтения и в целом делают использование вами веб-сайта более комфортным.
                </li>
                <li>
                    В соответствии с применимым законодательством Российской Федерации, мы можем сохранять файлы cookie на вашем компьютере,
                    если они необходимы для работы этого сайта. При этом сохранение других файлов cookie требует вашего разрешения.
                </li>
                <li>
                    На сайте могут использоваться некоторые файлы cookie, от которых не зависит работа сайта.
                </li>
                <li>
                    Мы делаем это не для того, чтобы отслеживать действия отдельных пользователей или идентифицировать их,
                    а с целью получить полезные сведения о том, как используют сайты. Это поможет нам совершенствовать их работу
                    для пользователей.
                </li>
            </ul>
        </div>
    </div>
    <!-- Footer -->
    <?php include "templates/footer.php"; ?>
    <!-- Footer -->
</body>
</html>
