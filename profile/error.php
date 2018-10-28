<div class="messages content text-center  text-white" style="height: 90vh;">
    <br><br>
    <h1>ERROR.</h1>
    <h2>
        <?php
        session_start();
        if(!empty($_SESSION['message_db'])){
            echo $_SESSION['message_db'];
        }
        if(!empty($_SESSION['message'])){
            echo $_SESSION['message'];
        }
        ?>
    </h2>
    <br><br><br>
    <a href="index.php" class="text-white">
        <button class="btn btn-primary" id="sup">Go back to home page</button>
    </a>
</div>