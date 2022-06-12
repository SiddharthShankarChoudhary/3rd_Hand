<?php
include("./includes/header.php");
include("./includes/form_handlers/settings_handler.php");

$page_active = 'settings';

?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account Settings | 3rd Hand</title>

    <meta name="description" content="" />

    <?php include 'header.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'menu.php' ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'navbar.php' ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                                    </li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <?php
                                            echo "<img src='" . $user['profile_pic'] . "' alt='user-avatar' class='d-block rounded' height='100' width='100' id='uploadedAvatar' />";
                                            ?>
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload new photo</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>

                                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800Kb</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Modify the values and click 'Save Changes'</p>
                                        <?php
                                        $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
                                        $row = mysqli_fetch_array($user_data_query);

                                        $first_name = $row['first_name'];
                                        $last_name = $row['last_name'];
                                        $email = $row['email'];
                                        ?>
                                        <form id="formAccountSettings" action="settings.php" method="POST">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="john.doe@example.com" />
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <input type="submit" class="btn btn-primary me-2" name="update_details" id="save_details" value="Save Changes">
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button><br><br>
                                                <?php echo $message; ?>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>

                                <div class="card mb-5">
                                    <h5 class="card-header">Change Password</h5>
                                    <div class="card-body">
                                        <form id="formAccountDeactivation" action="settings.php" method="POST">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="oldPass" class="form-label">Old Password</label>
                                                    <input class="form-control" type="password" name="old_password" id="settings_input"><br>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="newPass" class="form-label">New Password</label>
                                                    <input class="form-control" type="password" name="new_password_1" id="settings_input"><br>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="CnewPass" class="form-label">Confirm New Password</label>
                                                    <input class="form-control" type="password" name="new_password_2" id="settings_input">
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-danger deactivate-account" name="update_password" id="save_details" value="Update Password" class="info settings_submit"><br>
                                            <?php echo $password_message; ?>
                                        </form>
                                    </div>
                                </div>

                                <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                                                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                                            </div>
                                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include 'footer.php' ?>
                    <!-- / Footer -->

</body>

</html>