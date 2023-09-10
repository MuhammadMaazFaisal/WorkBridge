<?php
if ($_POST['function'] == 'add-task') {
    AddTask();
} elseif ($_POST['function'] == 'login') {
    Login();
} elseif ($_POST['function'] == 'register') {
    Register();
} elseif ($_POST['function'] == 'GetTasks') {
    GetTasks();
} elseif ($_POST['function'] == 'GetProjectDetails') {
    GetProjectDetails();
} elseif ($_POST['function'] == 'TaskStatusChange') {
    TaskStatusChange();
} elseif ($_POST['function'] == 'GetActiveTasks') {
    GetActiveTasks();
} elseif ($_POST['function'] == 'GetTaskDetails') {
    GetTaskDetails();
} elseif ($_POST['function'] == 'UpdateTask') {
    UpdateTask();
} elseif ($_POST['function'] == 'GetUserDetails') {
    GetUserDetails();
} elseif ($_POST['function'] == 'GetAdminDetails') {
    GetAdminDetails();
} elseif ($_POST['function'] == 'UpdateProfile') {
    UpdateProfile();
} elseif ($_POST['function'] == 'UpdateUserProfile') {
    UpdateUserProfile();
} elseif ($_POST['function'] == 'Logout') {
    Logout();
} elseif ($_POST['function'] == 'GetAllSkills') {
    GetAllSkills();
} elseif ($_POST['function'] == 'GetAllBids') {
    GetAllBids();
} elseif ($_POST['function'] == 'GetAllTasks') {
    GetAllTasks();
} elseif ($_POST['function'] == 'PlaceBid') {
    PlaceBid();
} elseif ($_POST['function'] == 'FilterTasks') {
    FilterTasks();
} elseif ($_POST['function'] == 'SendEmail') {
    SendEmail();
} elseif ($_POST['function'] == 'GetTotal') {
    GetTotal();
} elseif ($_POST['function'] == 'SendCode') {
    SendCode();
} elseif ($_POST['function'] == 'ResetPassword') {
    ResetPassword();
} elseif ($_POST['function'] == 'CheckCode') {
    CheckCode();
}

function SendCode(){
    include 'connection.php';
    $verificationCode = mt_rand(100000, 999999);
    $sql3 = "SELECT * FROM users WHERE type='admin'";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
    $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    $from = $result3['email'];
    $to = $_POST['email'];
    $link = "https://example.com/task.php?id=" . $p_id;
    $subject = "Extra Hour Verification Code";
    $message = "Dear User,\n\nYour verification code is ".$verificationCode;
    $headers = "From:" . $from;
    if (mail($to, $subject, $message, $headers)) {
        $array['status'] = 'success';
        $array['message'] = "Email sent successfully.";
        $sql1 = "UPDATE `users` SET `v_code`=:code WHERE email=:email";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(':code', $verificationCode);
        $stmt1->bindParam(':email', $to);
        $result1 = $stmt1->execute();
    } else {
        $array['status'] = 'error';
        $array['message'] = "Email sending failed, Please try again.";
    }
    echo json_encode($array);
    
}

function CheckCode(){
    include 'connection.php';
    $sql1 = "SELECT * FROM users WHERE email=:email";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':email', $_POST['email']);
    $stmt1->execute();
    $result3 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $v_code = $result3['v_code'];
    if ($v_code==$_POST['verification_code']){
         $array['status'] = 'success';
    }else{
        $array['status'] = 'Verification Code Invalid';
        $array['message'] = "Please try again.";
    }
    echo json_encode($array);
}

function ResetPassword(){
    include 'connection.php';
    $email = $_POST['email'];
    
    // Check if the email exists in the database
    $sql_check_email = "SELECT * FROM users WHERE email=:email";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->bindParam(':email', $email);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->fetch(PDO::FETCH_ASSOC);
    
    if ($result_check_email) {
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Rehash the password
        $sql1 = "UPDATE `users` SET `password`=:password WHERE email=:email";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(':password', $password);
        $stmt1->bindParam(':email', $email);
        $result1 = $stmt1->execute();
        if ($result1){
         $array['status'] = 'success';
        }else{
            $array['status'] = 'Error';
            $array['message'] = "Please try again.";
        }
        
    } else {
        // Email does not exist, handle accordingly
        $array['status'] = 'Error';
        $array['message'] = 'Email not found';
    }
    echo json_encode($array);
}


function GetTotal(){
    include 'connection.php';
    $array = array();
    $sql = "SELECT COUNT(*) FROM projects";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    $sql1 = "SELECT COUNT(*) FROM bids";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $result1 = $stmt1->fetchColumn();
    $array['total_tasks'] = $result;
    $array['total_bids'] = $result1;
    echo json_encode($array);
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
    $stmt = $conn->prepare("INSERT INTO projects (name, category, budget, description, upload, deadline, status) VALUES (:name, :category, :budget, :description, :upload, :date, 'Open')");
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
            $stmt2 = $conn->prepare("SELECT * FROM skills WHERE name=:name");
            $stmt2->bindParam(':name', $skill);
            $stmt2->execute();
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            $stmt1 = $conn->prepare("INSERT INTO project_skills (p_id, s_id) VALUES (:p_id, :s_id)");
            $stmt1->bindParam(':p_id', $p_id);
            $stmt1->bindParam(':s_id', $result['id']);

            if ($stmt1->execute()) {
                $array['status'] = 'success';
                $array['message'] = "Task submitted successfully.";
                $array['p_id'] = $p_id;
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

function SendEmail()
{
    include 'connection.php';
    $array = array();
    $p_id = $_POST['p_id'];
    $sql = "SELECT * FROM project_skills WHERE p_id=:p_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':p_id', $p_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $skills = array();
    foreach ($result as $row) {
        $skills[] = $row['s_id'];
    }
    $sql1 = "SELECT * FROM user_skills WHERE s_id IN (" . implode(',', $skills) . ")";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $users = array();
    foreach ($result1 as $row1) {
        $users[] = $row1['u_id'];
    }
    $sql2 = "SELECT * FROM users WHERE id IN (" . implode(',', $users) . ")";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $emails = array();
    foreach ($result2 as $row2) {
        $emails[] = $row2['email'];
        $whatsappNumbers[] = $row2['phone']; // Assuming 'phone' is the field that contains WhatsApp numbers.
    }
    $sql3 = "SELECT * FROM users WHERE type='admin'";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
    $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    $from = $result3['email'];
    $to = implode(',', $emails);
    $link = "https://example.com/task.php?id=" . $p_id;
    $subject = "New Task Notification";
    $message = "Dear User,\n\nWe hope this message finds you well. We have exciting news for you!\n\nA new task has been added, and your skills match the requirements for this task perfectly. We believe you are the ideal candidate to take on this challenge and contribute your expertise to the project.\n\nPlease click on the following link to view the task details and accept the task:\n" . $link . "\n\nIf you have any questions or concerns, feel free to reach out to us. We look forward to your valuable contribution to the project!";
    $headers = "From:" . $from;
    if (mail($to, $subject, $message, $headers)) {
        $array['status'] = 'success';
        $array['message'] = "Email sent successfully.";
    } else {
        $array['status'] = 'error';
        $array['message'] = "Email sending failed, please try again.";
    }

    $accessToken = "EAAOJZCYnZCTRQBO0bZA7hykEFHGqZBDsbwDSvEXcteLkETZBXGgQxnFKbUwMnMjNoalluZCKqt7XUx8h3sZBBxwnXicFMIZCI9zaB3k60GyEF44hKyez4JF7xbUHKDdlAvHpSrzbBfllAQ6ZBdbH9ZBJm5y59PxI9NwQTm20NtTfDSZAAxeL36VBdKHSRhq6ILsqerd7w7kfTsELmluqtwZD";
    $url = "https://graph.facebook.com/v17.0/106033692541042/messages";

    $templateName = "gig_availability_notification";
    $linkParameter = "https://example.com/task.php?id=". $p_id; // Replace with the actual link

    // Loop through each WhatsApp number and send the message
    foreach ($whatsappNumbers as $whatsappNumber) {
        $recipientId = $whatsappNumber;

        $data = array(
            "messaging_product" => "whatsapp",
            "to" => $recipientId,
            "type" => "template",
            "template" => array(
                "name" => $templateName,
                "language" => array(
                    "code" => "en"
                ),
                "components" => array(
                    array(
                        "type" => "BODY",
                        "parameters" => array(
                            "1" => array(
                                "type" => "TEXT",
                                "text" => $linkParameter
                            )
                        )
                    )
                )
            )
        );

        $headers = array(
            "Authorization: Bearer " . $accessToken,
            "Content-Type: application/json"
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode == 200) {
            $array['w_status'] = 'success';
        } else {
            $array['w_status'] = 'error';
        }
    }
    echo json_encode($array);
}

function Login()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // If the user is found, check the password
        if (password_verify($_POST['password'], $result['password'])) {
            $sql1 = "SELECT * FROM user_skills JOIN skills ON user_skills.s_id = skills.id WHERE u_id=:u_id";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(':u_id', $result['id']);
            $stmt1->execute();
            $skill = "User has no skills";
            if ($stmt1->rowCount() > 0) {
                $skill = "User has skills";
            }
            $array['status'] = 'success';
            $array['message'] = 'Login Success';
            $array['user_type'] = $result['type'];
            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_name'] = $result['name'];
            $_SESSION['user_email'] = $result['email'];
            $_SESSION['user_type'] = $result['type'];
            $_SESSION['user_skill'] = $skill;
            $_SESSION['status'] = 'logged_in';
            $array['session'] = $_SESSION;
        } else {
            // Password is incorrect
            $array['status'] = 'error';
            $array['message'] = 'Invalid Password';
        }
    } else {
        // If the user is not found, return an error message
        $array['status'] = 'error';
        $array['message'] = 'Invalid Email';
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
        $sql = "INSERT INTO users (name, email, phone, description, password, type, status) VALUES (:name, :email, :phone,'', :password, 'user', 'active')";
        $stmt = $conn->prepare($sql);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $password);
        $result = $stmt->execute();
        if ($result) {
            $array['status'] = 'success';
            $array['message'] = 'Registration Success';
            
            $sql3 = "SELECT * FROM users WHERE type='admin'";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();
            $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
            $from = $result3['email'];
            $to = $_POST['email'];
            $subject = "Welcome to Extra Hour - Get Started and Maximize Your Potential!";
            $message = "Dear User,\n\nWe are thrilled to welcome you to Extra Hour, where opportunities await you!\n\nBut before you dive in, here are some important instructions:\n\n1. After you log in, complete all your information in your profile section.\n\n2. Add your skills in the profile section to receive notifications whenever there is a new task related to your skills.\n\nIf you have any questions or concerns, feel free to reach out to us. We look forward to your valuable contribution to the project!";
            $headers = "From:" . $from;
            if (mail($to, $subject, $message, $headers)) {
                $array['status'] = 'success';
                $array['message'] = "Email sent successfully.";
            } else {
                $array['status'] = 'error';
                $array['message'] = "Email sending failed, please try again.";
            }

            $accessToken = "EAAOJZCYnZCTRQBO0bZA7hykEFHGqZBDsbwDSvEXcteLkETZBXGgQxnFKbUwMnMjNoalluZCKqt7XUx8h3sZBBxwnXicFMIZCI9zaB3k60GyEF44hKyez4JF7xbUHKDdlAvHpSrzbBfllAQ6ZBdbH9ZBJm5y59PxI9NwQTm20NtTfDSZAAxeL36VBdKHSRhq6ILsqerd7w7kfTsELmluqtwZD";
            $url = "https://graph.facebook.com/v17.0/106033692541042/messages";
            $templateName = "welcome_message";
            $recipientId = $_POST['phone']; // Replace with recipient's ID
            $linkParameter = "https://example.com/"; // Replace with the actual link
            $linkParameter2 = "https://example.com/tasks";
            $data = array(
                "messaging_product" => "whatsapp",
                "to" => $recipientId,
                "type" => "template",
                "template" => array(
                    "name" => $templateName,
                    "language" => array(
                        "code" => "en"
                    ),
                    "components" => array(
                        array(
                            "type" => "BODY",
                            "parameters" => array(
                                "1" => array(
                                    "type" => "TEXT",
                                    "text" => $linkParameter
                                ),
                                "2" => array(
                                    "type" => "TEXT",
                                    "text" => $linkParameter2
                                )
                            )
                        )
                    )
                )
            );

            $headers = array(
                "Authorization: Bearer " . $accessToken,
                "Content-Type: application/json"
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);
        } else {
            $array['status'] = 'error';
            $array['message'] = 'Registration Failed';
        }
    }
    echo json_encode($array);
}

function GetTasks()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT *, (SELECT COUNT(*) FROM bids WHERE p_id = projects.id and bids.status='Interested') as bids FROM projects ORDER BY date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Get Tasks Success';
        $array['data'] = $result;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Get Tasks Failed';
    }
    echo json_encode($array);
}

function GetActiveTasks()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT *, (SELECT COUNT(*) FROM bids WHERE p_id = projects.id and bids.status='Interested') as bids FROM projects where status='Open' ORDER BY date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Get Tasks Success';
        $array['data'] = $result;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Get Tasks Failed';
    }
    echo json_encode($array);
}

function GetProjectDetails()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT u.id, u.email, u.name, u.phone, u.password, u.type, u.status 
    FROM users u 
    JOIN bids b ON u.id = b.u_id 
    WHERE b.p_id = :id AND b.status = 'Interested'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql1 = "SELECT COUNT(*) FROM bids WHERE p_id = :p_id AND status = 'Interested'";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':p_id', $_POST['id']);
    $stmt1->execute();
    $result1 = $stmt1->fetchColumn();
    $sql2 = "SELECT name FROM projects WHERE id = :id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':id', $_POST['id']);
    $stmt2->execute();
    $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Get Project Details Success';
        $array['data'] = $result;
        $array['count'] = $result1;
        $array['name'] = $result2;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Get Project Details Failed';
        $array['name'] = $result2;
    }
    echo json_encode($array);
}

function TaskStatusChange()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT status FROM projects WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql1 = "UPDATE projects SET status=:status WHERE id=:id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':id', $_POST['id']);
    if ($result['status'] == 'Open') {
        $status = 'Closed';
    } else {
        $status = 'Open';
    }
    $stmt1->bindParam(':status', $status);
    $result1 = $stmt1->execute();
    if ($result1) {
        $array['status'] = 'success';
        $array['message'] = 'Task Status Changed to ' . $status;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Task Status could not be changed';
    }



    echo json_encode($array);
}

function GetTaskDetails()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM projects WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql1 = "SELECT * FROM project_skills join skills on project_skills.s_id = skills.id WHERE project_skills.p_id=:id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':id', $_POST['id']);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Task Details Fetched Successfully';
        $array['data'] = $result;
        $array['skills'] = $result1;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Task Details could not be Fetched';
    }
    echo json_encode($array);
}

function UpdateTask()
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
    $id = $_POST['id'];

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

   if (isset($upload_path)) {
        $stmt = $conn->prepare("UPDATE projects SET name=:name, category=:category, budget=:budget, description=:description, deadline=:date, upload=:upload, status='Open' WHERE id=:id");
        $stmt->bindParam(':upload', $upload_path);
    } else {
        // File not uploaded, so don't update the "upload" column
        $stmt = $conn->prepare("UPDATE projects SET name=:name, category=:category, budget=:budget, description=:description, deadline=:date, status='Open' WHERE id=:id");
    }
    
    $stmt->bindParam(':name', $p_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':budget', $budget);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $p_id = $_POST['id'];
        // Insert project skills into database
        $sql = "DELETE FROM project_skills WHERE p_id=:p_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':p_id', $p_id);
        $stmt->execute();
        foreach ($skills as $skill) {
            $stmt2 = $conn->prepare("SELECT * FROM skills WHERE name=:name");
            $stmt2->bindParam(':name', $skill);
            $stmt2->execute();
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            $stmt1 = $conn->prepare("INSERT INTO project_skills (p_id, s_id) VALUES (:p_id, :s_id)");
            $stmt1->bindParam(':p_id', $p_id);
            $stmt1->bindParam(':s_id', $result['id']);

            if ($stmt1->execute()) {
                $array['status'] = 'success';
                $array['message'] = "Task Updated successfully.";
                $array['upload'] =$upload_path;
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

function GetAdminDetails()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql1 = "SELECT * FROM skills where status='active'";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'User Details Fetched Successfully';
        $array['data'] = $result;
        $array['skills'] = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $array['status'] = 'error';
        $array['message'] = 'User Details could not be Fetched';
    }
    echo json_encode($array);
}

function GetUserDetails()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'User Details Fetched Successfully';
        $array['data'] = $result;

        // Fetch skills of the user from the user_skills table
        $sql1 = "SELECT skills.* FROM skills
             INNER JOIN user_skills ON skills.id = user_skills.s_id
             WHERE user_skills.u_id = :u_id AND skills.status='active'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(':u_id', $_POST['id']);
        $stmt1->execute();
        $userSkills = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $array['skills'] = $userSkills;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'User Details could not be Fetched';
    }

    echo json_encode($array);
}

function UpdateUserProfile()
{
    include 'connection.php';
    $array = array();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    $password = $_POST['old-password'];
    $newpassword = $_POST['new-password'];
    $cpassword = $_POST['r-new-password'];
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (count($result) > 0 && $cpassword != "") {
        if (password_verify($password, $result['password'])) {
            if ($newpassword == $cpassword) {
                $password = password_hash($newpassword, PASSWORD_DEFAULT);
            } else {
                $array['status'] = 'error';
                $array['message'] = "Password does not match";
                echo json_encode($array);
                die();
            }
        } else {
            $array['status'] = 'error';
            $array['message'] = "Old Password is incorrect";
            echo json_encode($array);
            die();
        }
    }

    $sql1 = "UPDATE users SET name=:name, email=:email, phone=:phone, description=:description";
    if ($password != "") {
        $sql1 .= ", password=:password WHERE id=:id";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':password', $password);
    } else {
        $sql1 .= " WHERE id=:id";
        $stmt = $conn->prepare($sql1);
    }

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        #get all s_id which have name in skills
        $sql2 = "SELECT id FROM skills WHERE name IN (" . implode(",", array_map(function ($value) {
            return "'" . $value . "'";
        }, $skills)) . ")";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $s_ids = array();
        foreach ($result2 as $row) {
            array_push($s_ids, $row['id']);
        }
        #delete all user_skills with u_id
        $sql3 = "DELETE FROM user_skills WHERE u_id=:u_id";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bindParam(':u_id', $id);
        $stmt3->execute();
        #insert all user_skills with u_id and s_id
        $sql4 = "INSERT INTO user_skills (u_id, s_id) VALUES ";
        $sql4 .= implode(",", array_map(function ($value) use ($id) {
            return "('" . $id . "','" . $value . "')";
        }, $s_ids));
        $stmt4 = $conn->prepare($sql4);
        $stmt4->execute();
        $array['status'] = 'success';
        $array['message'] = "Profile Updated Successfully";
    } else {
        $array['status'] = 'error';
        $array['message'] = "Profile could not be Updated";
    }
    echo json_encode($array);
}

function UpdateProfile()
{
    include 'connection.php';
    $array = array();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    $password = $_POST['old-password'];
    $newpassword = $_POST['new-password'];
    $cpassword = $_POST['r-new-password'];
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (count($result) > 0 && $cpassword != "") {
        if (password_verify($password, $result['password'])) {
            if ($newpassword == $cpassword) {
                $password = password_hash($newpassword, PASSWORD_DEFAULT);
            } else {
                $array['status'] = 'error';
                $array['message'] = "Password does not match";
                echo json_encode($array);
                die();
            }
        } else {
            $array['status'] = 'error';
            $array['message'] = "Old Password is incorrect";
            echo json_encode($array);
            die();
        }
    }

    $sql1 = "UPDATE users SET name=:name, email=:email, phone=:phone, description=:description";
    if ($password != "") {
        $sql1 .= ", password=:password WHERE id=:id";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':password', $password);
    } else {
        $sql1 .= " WHERE id=:id";
        $stmt = $conn->prepare($sql1);
    }

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        // Assume $skills is an array containing the skills you want to update in the database.

        // First, get the existing skills from the database
        $stmt01 = $conn->prepare("SELECT `id`, `name` FROM `skills`");
        if ($stmt01->execute()) {
            $existingSkills = $stmt01->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $array['status'] = 'error';
            $array['message'] = "Failed to fetch existing skills. Please try again.";
            echo json_encode($array);
            die();
        }

        // Convert all skill names to lowercase for case-insensitive comparison
        $skills = array_map('strtolower', $skills);

        // Create an associative array to store the existing skills for quick lookup
        $existingSkillNames = array_column($existingSkills, 'id', 'name');

        // Prepare statements for adding and updating skills
        $stmtAdd = $conn->prepare("INSERT INTO skills (name, status) VALUES (:name, 'active')");
        $stmtUpdateStatus = $conn->prepare("UPDATE skills SET status = 'active' WHERE id = :id");

        // Iterate through the skills and update the database accordingly
        foreach ($skills as $skill) {
            $skillExists = array_key_exists($skill, $existingSkillNames);
            if (!$skillExists) {
                // If the skill doesn't exist, add it to the database
                $stmtAdd->bindParam(':name', $skill);
                if ($stmtAdd->execute()) {
                    $array['status'] = 'success';
                    $array['message'] = "Profile Updated Successfully";
                } else {
                    $array['status'] = 'error';
                    $array['message'] = "Profile could not be updated, please try again.";
                    echo json_encode($array);
                    die();
                }
            } else {
                // If the skill exists, update its status to 'active'
                $skillId = $existingSkillNames[$skill];
                $stmtUpdateStatus->bindParam(':id', $skillId);
                if (!$stmtUpdateStatus->execute()) {
                    $array['status'] = 'error';
                    $array['message'] = "Profile could not be updated, please try again.";
                    echo json_encode($array);
                    die();
                }
            }
        }

        // Update status to 'inactive' for skills that were not provided in the $skills array
        $inactiveSkills = array_diff(array_map('strtolower', array_column($existingSkills, 'name')), $skills);
        if (!empty($inactiveSkills)) {
            // Prepare the SQL statement with separate named placeholders for each skill
            $placeholders = implode(', ', array_map(function ($skill) {
                return ':name_' . $skill;
            }, $inactiveSkills));
            $sql = "UPDATE skills SET status = 'inactive' WHERE name IN ($placeholders)";

            // Prepare the statement
            $stmtUpdateStatus = $conn->prepare($sql);

            // Bind parameters using separate named placeholders for each skill
            foreach ($inactiveSkills as $skill) {
                $paramName = ':name_' . $skill;
                $stmtUpdateStatus->bindValue($paramName, $skill);
            }

            if (!$stmtUpdateStatus->execute()) {
                $array['status'] = 'error';
                $array['message'] = "Profile could not be updated, please try again.";
                echo json_encode($array);
                die();
            }
        }

        // All operations were successful
        $array['status'] = 'success';
        $array['message'] = "Profile Updated Successfully";
        echo json_encode($array);
    } else {
        $array['status'] = 'error';
        $array['message'] = "Profile could not be updated, please try again.";
        echo json_encode($array);
        die();
    }
}


function Logout()
{
    session_start();
    session_destroy();
}

function GetAllSkills()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM skills WHERE status='active'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Skills Fetched Successfully';
        $array['data'] = $result;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Skills could not be Fetched';
    }
    echo json_encode($array);
}

function GetAllBids()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM bids Join projects on bids.p_id=projects.id Join users on bids.u_id=users.id where bids.status='Interested' AND projects.status='Open'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "SELECT count(*) FROM bids Join projects on bids.p_id=projects.id where bids.status='Interested' AND projects.status='Open'";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Bids Fetched Successfully';
        $array['data'] = $result;
        $array['count'] = $stmt2->fetch(PDO::FETCH_ASSOC);
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Bids could not be Fetched';
    }
    echo json_encode($array);
}

function GetAllTasks()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM projects where status='Open' ORDER BY date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM project_skills JOIN skills ON project_skills.s_id=skills.id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Tasks Fetched Successfully';
        $array['data'] = $result;
        $array['skills'] = $result2;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Tasks could not be Fetched';
    }
    echo json_encode($array);
}

function PlaceBid()
{
    include 'connection.php';
    $array = array();
    $sql0 = "SELECT * FROM bids WHERE p_id=:p_id AND u_id=:u_id";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->bindParam(':p_id', $_POST['p_id']);
    $stmt0->bindParam(':u_id', $_POST['u_id']);
    $stmt0->execute();
    $result0 = $stmt0->fetch(PDO::FETCH_ASSOC);
    if ($result0) {
        if ($result0['status'] == 'Interested') {
            $sql = "UPDATE bids SET status='Not Interested' WHERE p_id=:p_id AND u_id=:u_id";
        } else {
            $sql = "UPDATE bids SET status='Interested' WHERE p_id=:p_id AND u_id=:u_id";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':p_id', $_POST['p_id']);
        $stmt->bindParam(':u_id', $_POST['u_id']);
        if ($stmt->execute()) {
            $array['status'] = 'success';
            $array['message'] = "Bid Status Changed from " . $result0['status'] . " to " . ($result0['status'] == 'Interested' ? 'Not Interested' : 'Interested');
        } else {
            $array['status'] = 'error';
            $array['message'] = "Bid could not be placed, please try again.";
        }
    } else {
        $sql = "INSERT INTO bids (p_id, u_id, status) VALUES (:p_id, :u_id, 'Interested')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':p_id', $_POST['p_id']);
        $stmt->bindParam(':u_id', $_POST['u_id']);
        if ($stmt->execute()) {
            $array['status'] = 'success';
            $array['message'] = "Bid Placed Successfully";
        } else {
            $array['status'] = 'error';
            $array['message'] = "Bid could not be placed, please try again.";
        }
    }
    echo json_encode($array);
}

function FilterTasks()
{
    include 'connection.php';
    $keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : array();
    $categories = isset($_POST['category']) ? $_POST['category'] : array();

    // Construct SQL query
    $sql0 = "Select id from skills where name in ('" . implode("','", $skills) . "')";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->execute();
    $result0 = $stmt0->fetchAll(PDO::FETCH_ASSOC);
    $skills = array();
    foreach ($result0 as $row) {
        array_push($skills, $row['id']);
    }
    $sql = 'SELECT id, name, category, budget, description, deadline, upload, status, date FROM projects WHERE 1';

    if (!empty($keywords)) {
        $sql .= ' AND (name LIKE "%' . $keywords . '%" OR description LIKE "%' . $keywords . '%")';
    }

    if (!empty($skills)) {
        $sql .= ' AND id IN (SELECT p_id FROM project_skills WHERE s_id IN (' . implode(',', $skills) . '))';
    }

    if (!empty($categories)) {
        $sql .= ' AND category IN ("' . implode('","', $categories) . '")';
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM project_skills JOIN skills ON project_skills.s_id=skills.id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $array['status'] = 'success';
        $array['message'] = 'Tasks Fetched Successfully';
        $array['data'] = $result;
        $array['skills'] = $result2;
    } else {
        $array['status'] = 'error';
        $array['message'] = 'Tasks could not be Fetched';
    }
    echo json_encode($array);
}
