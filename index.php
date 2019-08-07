<?php
require_once 'product.php';
require_once 'sub_category.php';

// get All subscribers
$subs = new Sub_Category();
$subscribers = $subs->getSubscribers();

// get data from the form
$product_name = '';
$category_id ;
$insert_success = FALSE;
$success = '';

//variables for product details
$product_n = '';
$categeroyID_n = '';

// get all subs
$subscriber_lists = [];


// !empty($_POST['product']) && !empty($_POST['category']) && 
if (isset($_POST['submit']) && !empty($_POST['product']) && !empty($_POST['category'])) {
	$product_name = $_POST['product'];
	$category_id = $_POST['category'];
	$product = new Product();
	$success = $product->insertProduct($product_name, $category_id);
	if(!empty($success)) { // successfully inserted the new product
		// get data from the unnotified new product to the subscriber
		$product_notify = $product->getSingleProduct();
		$product_n = $product_notify['product_item'];
		$categeroyID_n = $product_notify['category_id'];

		// get all subscribers of new product's category
		$subscriber_lists = $subs->getByCategory($categeroyID_n);


	}

}

// if inserted successfully 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<style>
	body {
		margin-top: 50px;
	}
	div.row.form-group {
		border-style: groove;
	}
	#tbl-notify {
		margin-top: 20px;
	}

</style>
<body>
	<div class="container">
		<div class="row" id="form-product">
			<form maction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col s12" >
				<div class="row form-group">
					<div class="input-field col s5">
					<input id="Product Name" type="text" class="validate" name="product">
					<label for="Product Name">Product Name</label>
					</div>
					<div class="input-field col s5">
					<input id="Category Name" type="text" class="validate" name="category">
					<label for="Category Name">Category</label>
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect waves-light" type="submit" name="submit">Add Product
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="row" id="tbl_sub">
			<table class="centered highlight">
			<h3 class="center-align">Subscribers</h3>
				<thead>
					<tr>
						<th >Email</th>
						<th >Subscribed Category</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($subscribers as $subscriber):  ?>
					<tr class="highlight">
						<td><?php echo $subscriber['email']; ?></td>
						<td><?php echo $subscriber['category_name']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- email sent -->
		<?php if ($subscriber_lists != NULL ):?>
		<div class="row" id="tbl_notify">
			<table class="centered highlight">
			<h3 class="center-align">Notify Subscribers</h3>
				<thead>
					<tr>
						<th >Email</th>
						<th >Category</th>
						<th>Sent</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach ($subscriber_lists as $subscriber_list):  ?>
					<tr class="highlight">
						<td><?php echo $subscriber_list['email']; ?></td>
						<td><?php echo $subscriber_list['category_name']; ?></td>
						<td>Sent</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php endif;?>
	</div>
</body>
</html>