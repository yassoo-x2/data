<?php
ob_start();
session_start();
if (isset($_SESSION['adm'])) {
    header('location: admin/home.php');  //if user name rigester befor go to adminHome.php
    exit();
} elseif (isset($_SESSION['data'])) {
    header('location: home.php');  //if user name rigester befor go to adminHome.php
    exit();
} elseif (isset($_SESSION['pharm'])) {
    header('location: pharm/home.php');  //if user name rigester befor go to adminHome.php
    exit();
}
$pageTitle = 'log in';
$nonavbar = '';
include 'init.php';





//regster post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['loginForm'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if username exists in the database
        $stmt = $con->prepare("SELECT password, groupID FROM login WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $storedPassword = $row['password'];
            $groupid = $row['groupID'];

            if ($hashedPassword = $storedPassword) {
                // Save login information as a cookie for 1 year
                $loginData = [
                    'username' => $_POST['user'],
                    'password' => $_POST['pass']
                ];
                $cookieValue = json_encode($loginData);
                $expirationTime = time() + (86400 * 365); // 1 year
                setcookie('login_info', $cookieValue, $expirationTime, '/');
                if ($groupid == 0) {
                    $_SESSION['data'] = $username;
                    header('location: home.php');
                    exit();
                } elseif ($groupid == 1) {
                    $_SESSION['adm'] = $username;
                    header('location: admin/home.php');
                    exit();
                } 
            }
        } else {
            echo 'dont fund';
        }
    }
}
?>
<div class='container container-form mt-5 pb-5' id='login_div'>
    <form class='form-horizontal ' action='' method='POST'>
        <h3 class='login-text title'>Login</h3>
        <div class=' form-group col'>
            <div class=' input-box '>
                <input type='text' id='login_input text' placeholder=' ' name='user' class='text-input form-control login_input' required>
                <span>اسم المستخدم</span>
            </div>
        </div>
        <div class=' form-group col'>
            <div class=' input-box '>
                <input type='password' placeholder=' ' id='login_pass' name='pass' class=' form-control text-input' required>
                <span>كلمة المرور</span>
            </div>
        </div>
        <div class='form-group'>
            <button type='submit' name='loginForm' id='login_butt' class='btn btn-primary float-right login_butt '>login</button>
        </div>
    </form>
</div>






<?php include  $tplad . 'footer.php';

ob_end_flush()
?>