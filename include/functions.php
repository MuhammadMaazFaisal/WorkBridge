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
    $array = array();

    // Get form data
    $p_name = $_POST['p_name'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $budget = $_POST['budget'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    
    // Check if file is uploaded
    if (isset($_FILES['upload']) && !empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];
        $file_type = $_FILES['upload']['type'];
        $file_name = rand(1000, 1000000) . "-" . $file_name;

        $upload_path = "../images/upload/" . $file_name;

        // Move uploaded file to server
        if (move_uploaded_file($file_tmp, $upload_path)) {
            // File uploaded successfully
        } else {
            $array['status'] = 'error';
            $array['message'] = "File upload failed, please try again.";
            echo json_encode($array);
            die();
        }
    }

    // Insert project data into database
    $stmt = $conn->prepare("INSERT INTO projects (name, category, budget, description, upload, date) VALUES (:name, :category, :budget, :description, :upload, :date)");
    $stmt->bindParam(':name', $p_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':budget', $budget);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);

    if (isset($upload_path)) {
        $stmt->bindParam(':upload', $upload_path);
    } else {
        $stmt->bindValue(':upload', null, PDO::PARAM_NULL);
    }

    if ($stmt->execute()) {
        $p_id = $conn->lastInsertId();
        // Insert project skills into database
        foreach ($skills as $skill) {
            $stmt1 = $conn->prepare("INSERT INTO skills (p_id, name) VALUES (:p_id, :name)");
            $stmt1->bindParam(':p_id', $p_id);
            $stmt1->bindParam(':name', $skill);
            if ($stmt1->execute()) {
                $array['status'] = 'success';
                $array['message'] = "Task submitted successfully.";
            } else {
                $array['status'] = 'error';
                $array['message'] = "Task submission failed, please try again.";
                echo json_encode($array);
                die();
            }
        }
    } else {
        $array['status'] = 'error';
        $array['message'] = "Task submission failed, please try again.";
        echo json_encode($array);
        die();
    }


    echo json_encode($array);
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
    $sql1 = "SELECT * FROM skills WHERE user_id=:user_id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':user_id', $result['id']);
    $stmt1->execute();
    $skill = "User has no skills";
    if ($stmt1->rowCount() > 0) {
        $skill = "User has skills";
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
