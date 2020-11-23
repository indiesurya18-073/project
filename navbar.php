<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<title>Camshotku</title>
<!-- navbarnya -->

<body>


    <div class="navbar-wrapper">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <h4>Camshot</h4>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ml-auto px-2">
                        <form class="form-inline" action="#" method="get">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search..." name="keyword">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <a href="shop.php" class="nav-item nav-link px-2">Shop</a>

                        <?php if (isset($_SESSION['user'])) : ?>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Keranjang</a>
                                    <a class="dropdown-item" href="logout.php">Log out</a>

                                </div>
                            </div>

                        <?php else : ?>

                            <a href="register.php" class="nav-item nav-link px-2">Sign up</a>
                            <li class="nav-item pl-2 mb-2 mb-md-0">
                                <a href="login.php" type="button" class="btn btn-outline-info btn-md btn-rounded  waves-effect px-2">Login</a>
                            </li>
                        <?php endif ?>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>