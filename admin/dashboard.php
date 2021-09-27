<?php
    session_start();
    $admin_name = $_SESSION["admin_name"];

    if ($admin_name == NULL) {
        header("location: ../admin/");
    }
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="dashboard.php" class="simple-text">
                            Dashboard
                        </a>
                    </div>
                    <ul class="nav">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="pe-7s-graph"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="../index.php" target="_blank">
                                <i class="pe-7s-airplay"></i>
                                <p>View Website</p>
                            </a>
                        </li>
                        <li>
                            <a href="admin_manager.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Admin Manager</p>
                            </a>
                        </li>
                        <li>
                            <a href="menu_manager.php">
                                <i class="pe-7s-photo"></i>
                                <p>Menu Manager</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Rajlaxmi Restaurant</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="dashboard.php">
                                        <i>Welcome! </i> <?php echo $_SESSION["admin_name"] ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="../function/logout.php">
                                        Logout
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content"></div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="add_admin.php">
                                        Add New Admin
                                    </a>
                                </li>
                                <li>
                                    <a href="add_menu.php">
                                        Add New Menu
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
    </body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>