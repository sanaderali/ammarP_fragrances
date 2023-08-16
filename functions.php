<?php
include('connection.php');
function dd($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";

}

if (isset($_POST["action"]) && $_POST["action"] === "deleteUser") {
    $userId = $_POST["userId"];
    echo deleteUser($db, $userId); 
}

if (isset($_POST["action"]) && $_POST["action"] === "deleteProduct") {
    $productId = $_POST["productId"];
    echo deleteProduct($db, $productId); 
}

if (isset($_POST["action"]) && $_POST["action"] === "saveorder") {
    echo saveOrder($db, $_POST); 
}

function saveOrder($db, $postData){

    $user_id = $_POST["user_id"];
    $selectedProducts = $_POST["products"];

    $status = "Pending"; 
    $orderQuery = "INSERT INTO orders (user_id, status) VALUES ('$user_id', '$status')";
    $db->query($orderQuery);
    $order_id = $db->insert_id;

    foreach ($selectedProducts as $product) {
        $product_id = $product["pro_id"];
        $quantity = $product["quantity"];
        $avialable = $product["avialable"];

        $orderDetailsQuery = "INSERT INTO order_details (order_id, product_id, quantity,avialable) VALUES ('$order_id', '$product_id', '$quantity','$quantity')";
        $db->query($orderDetailsQuery);
    }

    return  "Oder Submitted successfully";

}

function deleteProduct($db, $productId) {
    $query = "UPDATE products SET status = 2 WHERE id = $productId";
    $result = mysqli_query($db, $query);

    if ($result) {
        $productCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as productCount FROM products WHERE status = 1"))['productCount'];
        if($productCount > 0){
            return "success";

        }else{
            return "no-procut";
        }
    } else {
        return "failure";
    }
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
    $name = mysqli_real_escape_string($db, $postData["name"]);
    $email = mysqli_real_escape_string($db, $postData["email"]);
    $password = mysqli_real_escape_string($db, $postData["password"]);
    $id = mysqli_real_escape_string($db, $postData["id"]);
    $hashedPassword = "";

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    $result = false;
    if (!empty($id)) {
        if (!empty($imagePath)) {
            $query = "UPDATE users SET name = '$name', email = '$email', password = '$hashedPassword', userImage = '$imagePath' WHERE id = $id";
        } else {
            $query = "UPDATE users SET name = '$name', email = '$email', password = '$hashedPassword' WHERE id = $id";
        }
    } else { 
        if (!empty($imagePath)) {
            $query = "INSERT INTO users (name, email, password, userImage) VALUES ('$name', '$email', '$hashedPassword', '$imagePath')";
        } else {
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        }
    }

    $result = mysqli_query($db, $query);

    if (!$result) {
        echo "Query failed: " . mysqli_error($db);
    }

    return $result;
}

function storeProduct($db, $postData, $imagePath = NULL) {
    $name = mysqli_real_escape_string($db, $postData["name"]);
    $id = mysqli_real_escape_string($db, $postData["id"]);
    $hashedPassword = "";


    $result = false;
    if (!empty($id)) {
        if (!empty($imagePath)) {
            $query = "UPDATE products SET name = '$name', productImage = '$imagePath' WHERE id = $id";
        } else {
            $query = "UPDATE products SET name = '$name' WHERE id = $id";
        }
    } else { 
        if (!empty($imagePath)) {
            $query = "INSERT INTO products (name, productImage) VALUES ('$name', '$imagePath')";
        } else {
            $query = "INSERT INTO products (name) VALUES ('$name')";
        }
    }

    $result = mysqli_query($db, $query);

    if (!$result) {
        echo "Query failed: " . mysqli_error($db);
    }

    return $result;
}

function getAllProduct() {
    global $db; 

    $query = "SELECT * FROM products WHERE status = 1 ORDER By id DESC";
    $result = mysqli_query($db, $query);

    $products = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }

    return $products;
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

function totalStats($db, $tableName){
    $productCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as totalCount FROM $tableName"))['totalCount'];
    return $productCount;
}

function ordersManage($db, $tableName,$status){
    $productCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as totalCount FROM $tableName Where status = '$status'"))['totalCount'];
    return $productCount;
}

?>

