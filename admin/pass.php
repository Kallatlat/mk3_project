<?php
session_start();
require '../conn.php';

if (!isset($_SESSION['idpengguna'])) {
    header('location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Check if the new password and confirm new password match
    if ($newPassword === $confirmNewPassword) {
        // Hash and update the new password in the database
        $idpengguna = $_SESSION['idpengguna'];
        if($_SESSION["idpengguna"] == 'pelajar')
        $idpelajar = $_SESSION['idpelajar'];
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateSql = "UPDATE SET katalaluan = '$newPasswordHash' WHERE idpelajar = $idpengguna";
        $conn->query($updateSql);

        // Redirect to a success page or display a success message
        header('location: password_change_success.php');
        exit();
    } else {
        $error = 'New password and confirm new password do not match.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_new_password">Confirm New Password:</label>
        <input type="password" id="confirm_new_password" name="confirm_new_password" required><br>

        <button type="submit">Change Password</button>
    </form>
</body>
</html>

