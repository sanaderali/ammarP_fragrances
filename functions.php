<?php
session_start();
include('connection.php');
function dd($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";

}

// ajax function calling ... 
// delete ... calling 
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
// undo deleting ... calling 
if (isset($_POST["action"]) && $_POST["action"] === "undoDelProduct") {
    $productId = $_POST["productId"];
    echo undoDelProduct($db, $productId); 
}

if (isset($_POST["action"]) && $_POST["action"] === "deleteCategory") {
    $categorytId = $_POST["categoryId"];
    echo deleteCategory($db, $categorytId); 
}

if (isset($_POST["action"]) && $_POST["action"] === "OrderStatus") {
    echo orderStatuschange($db, $_POST); 
}

    // orders management .... 
    function saveOrder($db, $postData){

        $user_id = $_POST["user_id"];
        $selectedProducts = $_POST["products"];

        $status = "New"; 
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

    function getAllOrders() {
        global $db; 
        if (isset($_SESSION['user']) && isset($_SESSION['user_role'])) {
            $user_Id = $_SESSION['user']['id'];
            if ($_SESSION['user_role'] == 'admin') {

                $query = "SELECT o.id, o.order_date, o.status, u.name as user_name, u.shop_name, u.userImage as user_Image,
                p.name as product_name, od.quantity, od.avialable
                FROM orders as o
                join users as u on o.user_id = u.id
                join order_details as od on o.id = od.order_id
                join products as p on od.product_id = p.id
                ORDER BY o.id DESC";

            }else{
                $query = "SELECT o.id, o.order_date, o.status, u.userImage as user_Image, u.name as user_name, u.shop_name,
                p.name as product_name, od.quantity, od.avialable
                FROM orders as o
                JOIN users as u ON o.user_id = u.id
                JOIN order_details as od ON o.id = od.order_id
                JOIN products as p ON od.product_id = p.id
                WHERE u.id = '$user_Id'
                ORDER BY o.id DESC";
            }
                
        }
        
        $result = mysqli_query($db, $query);
        $orders = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $orderIndex = $row['id']; // Use the order ID as the index
                
                if (!isset($orders[$orderIndex])) {
                    $orders[$orderIndex] = array(
                        'order_id' => $row['id'],
                        'order_date' => $row['order_date'],
                        'status' => $row['status'],
                        'user_Image' => $row['user_Image'],
                        'user_name' => $row['user_name'],
                        'shop_name' => $row['shop_name'],
                        'product_details' => array()
                    );
                }

                $productDetails = array(
                    'product_name' => $row['product_name'],
                    'quantity' => $row['quantity'],
                    'available_quantities' => $row['avialable']
                );

                $orders[$orderIndex]['product_details'][] = $productDetails;
            }
        }

        return $orders;
    }

    function getAllOrdersByCategory($categoryId) {
        global $db; 
        if (isset($_SESSION['user']) && isset($_SESSION['user_role'])) {
            $user_Id = $_SESSION['user']['id'];
            if ($_SESSION['user_role'] == 'admin') {

                $query = "SELECT o.id, o.order_date, o.status, u.name as user_name, u.shop_name, u.userImage as user_Image,
                p.name as product_name, od.quantity, od.avialable
                FROM orders as o
                join users as u on o.user_id = u.id
                join order_details as od on o.id = od.order_id
                join products as p on od.product_id = p.id
                WHERE p.category_id = '$categoryId'
                ORDER BY o.id DESC";

            }else{
                $query = "SELECT o.id, o.order_date, o.status, u.userImage as user_Image, u.name as user_name, u.shop_name,
                p.name as product_name, od.quantity, od.avialable
                FROM orders as o
                JOIN users as u ON o.user_id = u.id
                JOIN order_details as od ON o.id = od.order_id
                JOIN products as p ON od.product_id = p.id
                WHERE u.id = '$user_Id'
                AND p.category_id = '$categoryId'
                ORDER BY o.id DESC";
            }
                
        }
        
        $result = mysqli_query($db, $query);
        $orders = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $orderIndex = $row['id']; // Use the order ID as the index
                
                if (!isset($orders[$orderIndex])) {
                    $orders[$orderIndex] = array(
                        'order_id' => $row['id'],
                        'order_date' => $row['order_date'],
                        'status' => $row['status'],
                        'user_Image' => $row['user_Image'],
                        'user_name' => $row['user_name'],
                        'shop_name' => $row['shop_name'],
                        'product_details' => array()
                    );
                }

                $productDetails = array(
                    'product_name' => $row['product_name'],
                    'quantity' => $row['quantity'],
                    'available_quantities' => $row['avialable']
                );

                $orders[$orderIndex]['product_details'][] = $productDetails;
            }
        }

        return $orders;
    }

    function totalStats($db, $tableName){
        $productCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as totalCount FROM $tableName"))['totalCount'];
        return $productCount;
    }

    function ordersManage($db, $tableName,$status){
        $productCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as totalCount FROM $tableName Where status = '$status'"))['totalCount'];
        return $productCount;
    }

    function orderStatuschange($db,$post){
        $orderID = $post["id"];
        $newStatus = $post["status"];
        $query = "UPDATE orders SET status = '$newStatus' WHERE id = '$orderID'";
        $result = mysqli_query($db, $query);
        if ($result) {
          $return = 'yes';
        }else{
            $return = 'no';
        } 

        return $return;
    }

    // users management ... here...
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
        $shopName = mysqli_real_escape_string($db, $postData["shop-name"]);
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
                $query = "UPDATE users SET name = '$name', shop_name = '$shopName', email = '$email', password = '$hashedPassword', userImage = '$imagePath' WHERE id = $id";
            } else {
                $query = "UPDATE users SET name = '$name', shop_name = '$shopName', email = '$email', password = '$hashedPassword' WHERE id = $id";
            }
        } else { 
            if (!empty($imagePath)) {
                $query = "INSERT INTO users (name, shop_name, email, password, userImage) VALUES ('$name','$shopName', '$email', '$hashedPassword', '$imagePath')";
            } else {
                $query = "INSERT INTO users (name, shop_name, email, password) VALUES ('$name', '$email', '$shopName', '$hashedPassword')";
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

    // products management .....
    function storeProduct($db, $postData, $imagePath = NULL) {
        $name = mysqli_real_escape_string($db, $postData["name"]);
        $category_id = mysqli_real_escape_string($db, $postData["category_id"]);
        $id = mysqli_real_escape_string($db, $postData["id"]);

        $result = false;
        if (!empty($id)) {
            if (!empty($imagePath)) {
                $query = "UPDATE products SET name = '$name', category_id = '$category_id', productImage = '$imagePath' WHERE id = '$id'";
            } else {
                $query = "UPDATE products SET name = '$name', category_id = '$category_id' WHERE id = '$id'";
            }
        } else { 
            if (!empty($imagePath)) {
                $query = "INSERT INTO products (name, productImage,category_id) VALUES ('$name','$imagePath','$category_id')";
            } else {
                $query = "INSERT INTO products (name,category_id) VALUES ('$name','$category_id')";
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
  
    function getAllDletedProduct() {
        global $db; 

        $query = "SELECT * FROM products WHERE status = 2 ORDER By id DESC";
        $result = mysqli_query($db, $query);

        $products = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }

        return $products;
    }

    function getAllProductByCategory($categoryId) {
        global $db; 

        $query = "SELECT * FROM products WHERE status = 1 AND category_id = '$categoryId' ORDER By id DESC";
        $result = mysqli_query($db, $query);

        $categoryProducts = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $categoryProducts[] = $row;
            }
        }

        return $categoryProducts;
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

    function undoDelProduct($db, $productId) {
        $query = "UPDATE products SET status = 1 WHERE id = $productId";
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

    //categories functionalities ... here...
    function getAllCategoris() {
        global $db; 

        $query = "SELECT * FROM categories WHERE status = 'Active' ORDER By id DESC";
        $result = mysqli_query($db, $query);

        $categories = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $categories[] = $row;
            }
        }

        return $categories;
    }

    function storeCategory($db, $postData, $imagePath = NULL) {
        $name = mysqli_real_escape_string($db, $postData["name"]);
        $id = mysqli_real_escape_string($db, $postData["id"]);


        $result = false;
        if (!empty($id)) {
                $query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
        } else { 
                $query = "INSERT INTO categories (name) VALUES ('$name')";
        }

        $result = mysqli_query($db, $query);

        if (!$result) {
            echo "Query failed: " . mysqli_error($db);
        }

        return $result;
    }

    function deleteCategory($db, $catoryId) {
        $query = "UPDATE categories SET status = 'Deleted' WHERE id = $catoryId";
        $result = mysqli_query($db, $query);

        if ($result) {
            $catoryCount = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as categoryCount FROM categories WHERE status = 'Active'"))['categoryCount'];
            if($catoryCount > 0){
                return "success";

            }else{
                return "no-category";
            }
        } else {
            return "failure";
        }
    }

?>

