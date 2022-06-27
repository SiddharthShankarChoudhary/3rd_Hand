<?php
include("includes/header.php"); // To include header.php file

$page_active = 'index';


if (isset($_POST['post'])) { // Creates instance of Post class when post button is triggered
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
}


?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>3rd Hand</title>

    <meta name="description" content="" />

    <?php include 'header.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'menu.php' ?>
            <?php include 'post.php' ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'navbar.php' ?>

                <!-- / Navbar -->



                <?php include 'footer.php' ?>

</body>

</html>