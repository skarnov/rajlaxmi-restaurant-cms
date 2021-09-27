<?php
    error_reporting(0);
    session_start();
    $admin_name = $_SESSION["admin_name"];

    if ($admin_name == NULL) {
        header("location: login.php");
    }
    require '../function/db_connect.php';

    $menu_name = filter_input(INPUT_POST, 'menu_name');
    $menu_price = filter_input(INPUT_POST, 'menu_price');
    $menu_summary = filter_input(INPUT_POST, 'menu_summary');

    $target_dir = "upload/menu_image/";
    $target_file = $target_dir . basename($_FILES["menu_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["menu_image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
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
                        <li>
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
                        <li class="active">
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
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <ol class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                                        <li><a href="menu_manager.php"><i class="fa fa-globe"></i> Manage Menus</a></li>
                                        <li class="active">Add Menu</li>
                                    </ol>
                                    <div class="header">
                                        <h4 class="title">Add Menu</h4>
                                    </div>
                                    <div class="content">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <?php
                                                if (!empty($menu_name)) {
                                                    if (file_exists($target_file)) {
                                                        echo "Sorry, file already exists.";
                                                        $uploadOk = 0;
                                                    }
                                                    if ($_FILES["menu_image"]["size"] > 500000) {
                                                        echo "Sorry, your file is too large.";
                                                        $uploadOk = 0;
                                                    }
                                                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                        $uploadOk = 0;
                                                    }
                                                    if ($uploadOk == 0) {
                                                        echo "Sorry, your file was not uploaded.";
                                                    } else {
                                                        if (move_uploaded_file($_FILES["menu_image"]["tmp_name"], $target_file)) {
                                                            echo "The file " . basename($_FILES["menu_image"]["name"]) . " has been uploaded.";
                                                            $sql = "INSERT INTO tbl_menu (menu_name, menu_price, menu_image, menu_summary)
                                                                    VALUES ('$menu_name', '$menu_price', '$target_file', '$menu_summary')";
                                                        } else {
                                                            echo "Sorry, there was an error uploading your file.";
                                                        }
                                                    }
                                                    if (mysqli_query($conn, $sql)) {
                                                        echo "New record created successfully";
                                                    } else {
                                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                    }
                                                }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="alert alert-danger">
                                                        Image Size 500x310
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Menu Name</label>
                                                        <input type="text" name="menu_name" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="text" name="menu_price" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" name="menu_image" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="menu_summary" class="form-control"></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill">Save Menu</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
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