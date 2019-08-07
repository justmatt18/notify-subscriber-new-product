<?php 
require_once 'connection.php';

class Product extends Connection {

    // function getSingleProduct($product_name) {
    //     $sql = "SELECT * FROM product WHERE product_name = '$product_name'";
    //     $result = $this->connect()->query($sql);
    //     $numRows = $result->num_rows;
    //     if ($numRows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $data[] = $row;
    //         }
    //         return $data;
    //     }
    //     $this->connect()->close();
    // } 
    
    function getSingleProduct() { // product that is not yet notified to the suscribed users
        $sql = "SELECT * FROM product WHERE notify_user = 0";
        $result = $this->connect()->query($sql);
        if ($result) {
            $record = mysqli_fetch_array($result);
            return $record;
        }
        $this->connect()->close();
    } 



	function insertProduct($product, $category) {
        $sucess = 'error';
        $sql = "INSERT INTO product (product_item, category_id) VALUES ('$product', '$category')";
        $result = $this->connect()->query($sql);
        if ($result) {
            $sucess = 'inserted';
        }
        $this->connect()->close();
        return $sucess;
    }
}
// create 
// $prod = new Product();
// $product_item = 'WarRock';
// $category_id = 2;
// $msg = '';
// $msg = $prod->insertProduct($product_item, $category_id);
// if (!empty($msg)) {
//     echo 'YESSS';
// }
// $data = $prod->getSingleProduct();
// var_dump($data);
// echo "Product name: " . $data['product_item'] . "<br>";
// echo "Category ID: " . $data['category_id'] . "<br>";
// echo "Notify User: " . $data['notify_user'] . "<br>";


?>