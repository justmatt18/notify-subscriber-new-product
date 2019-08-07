<?php 
require_once 'connection.php';

class Sub_Category extends Connection {

	function getSubscribers() {
		$sql = 'SELECT subscriber.email, category.category_name FROM subscriber 
		INNER JOIN subscriber_category ON subscriber.id = subscriber_category.subscriber_id
		INNER JOIN category ON category.id = subscriber_category.category_id
		WHERE 1';

		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        $this->connect()->close();
	}


	function getByCategory($id) {
		$sql = 'SELECT subscriber.email, category.category_name FROM subscriber 
		INNER JOIN subscriber_category ON subscriber.ID = subscriber_category.subscriber_id
		INNER JOIN category ON category.ID = subscriber_category.category_id
		WHERE category.ID = ' . $id;
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        $this->connect()->close();
	}
}

// $sb = new Sub_Category();
// $id = 1;
// $records = $sb->getByCategory($id);
// // $record = $sb->getSubscribers();
// foreach ($records as $record) {
// 	echo 'New Product details has been sent to ' . $record['email'] . '<br>';
// }
?>