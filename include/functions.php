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
} elseif ($_POST['function'] == 'UpdateProfile') {
    UpdateProfile();
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

    // Insert project data into database
    $stmt = $conn->prepare("UPDATE projects SET name=:name, category=:category, budget=:budget, description=:description, deadline=:date, upload=:upload, status='Open' WHERE id=:id");
    $stmt->bindParam(':name', $p_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':budget', $budget);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':id', $id);

    if (isset($upload_path)) {
        $stmt->bindParam(':upload', $upload_path);
    } else {
        $stmt->bindValue(':upload', null, PDO::PARAM_NULL);
    }

    if ($stmt->execute()) {
        $p_id = $_POST['id'];
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
                $array['message'] = "Task Updated successfully.";
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

function GetUserDetails()
{
    include 'connection.php';
    $array = array();
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql1 = "SELECT * FROM skills";
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
        $stmt1 = $conn->prepare("DELETE FROM skills");
        $stmt1->execute();
        foreach ($skills as $skill) {
            $stmt1 = $conn->prepare("INSERT INTO skills ( name) VALUES ( :name)");
            $stmt1->bindParam(':name', $skill);
            if ($stmt1->execute()) {
                $array['status'] = 'success';
                $array['message'] = "Profile Updated Successfully";
            } else {
                $array['status'] = 'error';
                $array['message'] = "Profile could not be updated, please try again.";
                echo json_encode($array);
                die();
            }
        }
    } else {
        $array['status'] = 'error';
        $array['message'] = "Profile could not be updated, please try again.";
        echo json_encode($array);
        die();
    }



    echo json_encode($array);
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
    $sql = "SELECT * FROM skills";
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
    $sql = "SELECT * FROM projects";
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
    $sql0="Select id from skills where name in ('".implode("','",$skills)."')";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->execute();
    $result0 = $stmt0->fetchAll(PDO::FETCH_ASSOC);
    $skills=array();
    foreach($result0 as $row){
        array_push($skills,$row['id']);
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
