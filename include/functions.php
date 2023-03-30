<?php
if ($_POST['function'] == 'add-task') {
    AddTask();
} elseif ($_POST['function'] == 'login') {
    Login();
} elseif ($_POST['function'] == 'register') {
    Register();
}

function AddTask()
{
    include 'connection.php';
}

function Login()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql1="SELECT * FROM skills WHERE user_id=:user_id";
    $stmt1=$conn->prepare($sql1);
    $stmt1->bindParam(':user_id',$result['id']);
    $stmt1->execute();
    $skill="User has no skills";
    if ($stmt1->rowCount() > 0) {
        $skill="User has skills";
    }


    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Login Success';
        $array['user_type'] = $result['type'];
        session_start();
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['user_email'] = $result['email'];
        $_SESSION['user_type'] = $result['type'];
        $_SESSION['user_skill'] = $skill;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Login Failed';
    }
    echo json_encode($array);
}

function Register()
{
    include 'connection.php';
    $array = array();
    $sql0 = "SELECT * FROM users WHERE email=:email";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->bindParam(':email', $_POST['email']);
    $stmt0->execute();
    $result0 = $stmt0->fetch(PDO::FETCH_ASSOC);
    if ($result0) {
        $array['status'] = 'error';
        $array['message'] = 'Email already exists';
    } else {
        $sql = "INSERT INTO users (name, email, password, type, status) VALUES (:name, :email, :password, 'user', 'active')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);
        $result = $stmt->execute();
        if ($result) {
            $array['status'] = 'success';
            $array['message'] = 'Register Success';
        } else {
            $array['status'] = 'error';
            $array['message'] = 'Register Failed';
        }
    }
    echo json_encode($array);
}
