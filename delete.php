<?php
include 'include/admin_header.html';
# Open database connection.
require ( 'include/dbconnect.php' ) ;

    $q = "SELECT * FROM product;" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
		
		{
		echo '
		<div class="container">
			<table class="table">
			<h1>Delete Item</h1>
			<thead>
			<tr><th>ID</th><th>Item Name</th><th></th>Image<th>Item Price</th><th>Delete</th></tr></thead><tbody>';
			
			while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
			echo'<tr>
			<td>'.$row['item_id'].' </td><td>'.$row['item_name'].'</td><td><img src="'.$row['item_img'].'" alt="product" width="50" height="50"></td><td>&pound'.$row['item_price'].'</td><td>
					<a class="btn btn-dark" href="delete_now.php?item_id='.$row['item_id'].'">Delete Item</a><br>
			';
		}
		
		;}
	
    # Close database connection.
    mysqli_close($link); 

    exit();
?>
<?php
// Include admin footer
include 'include/footer.html';
?>