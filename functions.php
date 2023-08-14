<?php
include('connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function dd($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";

}

if (isset($_POST["action"]) && $_POST["action"] === "deleteUser") {
    $userId = $_POST["userId"];
    echo deleteUser($db, $userId); // Echo the response
}

function deleteUser($db, $userId) {
    $query = "UPDATE users SET status = 2 WHERE id = $userId";
    $result = mysqli_query($db, $query);

    if ($result) {
        $userCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as userCount FROM users WHERE status = 1 AND role = 'user'"))['userCount'];
        if($userCount > 0){
            return "success";

        }else{
            return "no-user";
        }
    } else {
        return "failure";
    }
}

function storeUser($db, $postData, $imagePath = NULL) {

    $name = $postData["name"];
    $email = $postData["email"];
    $password = $postData["password"];
    $id = $postData["id"];
    $hashedPassword = "";
    if (!empty($password)) {
        $hashedPassword = " password = '" . password_hash($password, PASSWORD_DEFAULT) . "'";
    }

    $result = false;
    if (!empty($id)) {
        if (!empty($imagePath)) {
            $query = "UPDATE users SET name = '$name', email = '$email' ,$hashedPassword, userImage = '$imagePath' WHERE id = $id";
        } else {
            $query = "UPDATE users SET name = '$name', email = '$email' , $hashedPassword WHERE id = $id";
        }
    }
    else { 
        if (!empty($imagePath)) {
            $query = "INSERT INTO users (name, email, password, userImage) VALUES ('$name', '$email', '$hashedPassword', '$imagePath')";
        } else {
            $query = "INSERT INTO users (name, email, password, userImage) VALUES ('$name', '$email', '$hashedPassword', '$imagePath')";
        }
    }

    $result = mysqli_query($db, $query);

    if (!$result) {
        echo "Query failed: " . mysqli_error($db);
    }

    return $result;
}




function getAllUsers() {
    global $db; // Assuming you have your database connection in $db

    $query = "SELECT * FROM users WHERE status = 1 AND role ='user' ORDER By id DESC";
    $result = mysqli_query($db, $query);

    $users = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    return $users;
}

function getOneUsers() {
    global $db; // Assuming you have your database connection in $db

    $query = "SELECT * FROM users WHERE status = 1 AND role ='user' ORDER By id DESC";
    $result = mysqli_query($db, $query);

    $users = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    return $users;
}

?>

