<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="../home.php"><i class="fab fa-pied-piper-alt fa-lg"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <!--<li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="#">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
                <!--<a class="nav-link disabled" href="#">About</a>-->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
            </li>
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
        <ul class="nav navbar-nav navbar-right">
            <!--<li class="nav-item">
                <a class="nav-link" href="#"><span class="glyphicon glyphicon-user"><i class="fas fa-user-circle text-white"> Login</i></span></a>
            </li>-->
            <!--<li class="nav-item">
                <a class="nav-link" href="#"><span class="glyphicon glyphicon-user"><i class="fas fa-shopping-cart text-white"></i></span></a>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle text-white fa-lg"></i> Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="position: absolute;">
                    <a class="dropdown-item" href="../account/login.php" method="get">Login</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../account/registration.php">Sign up</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline" action="?search" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                </form>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="#"><span class="glyphicon glyphicon-log-in"></span> </a></li>-->
        </ul>
    </div>
</nav>