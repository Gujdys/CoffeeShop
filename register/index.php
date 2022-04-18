<?php 
require_once 'controllers/authController.php'; 

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}


if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                
            <?php if (isset($_SESSION['massage'])): ?>
            <div class="alert <?php $_SESSION["alert-class"]; ?>" >
                    <?php 
                    echo $_SESSION['massage']; 
                    unset($_SESSION['massage']);
                    unset($_SESSION['alert-class']);
                    ?>
                </div>
                <?php endif; ?>
                <h3>welcome,<?php echo $_SESSION['username']; ?></h3>


                <a href="index.php?logout=1" class="logout">logout</a>
                <?php if (!$_SESSION['verified']): ?>
                <div class="alert alert warning">
                    you need to verify your accout.
                    <strong><?php echo $_SESSION['email']; ?></strong>
                </div>
                <?php endif; ?>
                <?php if ($_SESSION['verified']): ?>
                <button class="btn btnblock btn-lg btn-primary">im verifed!</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>