<?php
include 'include/session.php';
# Open database connection.

require ( 'include/dbconnect.php' ) ;
# Retrieve items from 'shop' database table.
$q = "SELECT * FROM product" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  # Display body section.
  echo '<div class="container p-3">
			<div class="row p-3">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
  echo '
  <div class="col-md-3 d-flex justify-content-center">
	 <div class="card" style="width: 18rem;">
	  <img src='. $row['item_img'].' class="card-img-top" alt="item-image">
		<div class="card-body text-center">
		 <h5 class="card-title text-center">' . $row['item_name'] .'</h5>
		 <p class="card-text">'. $row['item_desc'] . '</p>
		</div>
	 		<div class="card-footer bg-transparent">
		 	<p class="card-text text-center">&pound' . $row['item_price'] . '</p>
		</div>
		<div class="card-footer text-muted">
		 <a href="added.php?id='.$row['item_id'].'" class="btn btn-dark btn-lg btn-block">Add to Cart</a>
		</div>
	</div>
	</div>
		';
  }
  echo '</div></div>';
# Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message.
else { echo '<p>There are currently no items in this table.</p>' ; }
?>