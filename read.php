<?php
include 'include/admin_header.html';
# Open database connection.
require ( 'include/dbconnect.php' ) ;
# Retrieve items from 'shop' database table.
$q = "SELECT * FROM product" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  # Display body section.
  echo '<div class="container">
			<div class="row">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
  echo '
  <div class="col-md-3 d-flex justify-content-center">
	 <div class="card" style="width: 18rem;">
	  <img src='. $row['item_img'].' class="card-img-top" alt="Silver-Watch">
		<div class="card-py-3-body">
		 <h5 class="card-title text-center">' . $row['item_name'] .'</h5>
		 <p class="card-text">'. $row['item_desc'] . '</p>
		</div>
		 <ul class="list-group list-group-flush">
		   <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
		   <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id='.$row['item_id'].'">  Edit</a> </li>
		   <li class="list-group-item"><a class="btn btn-danger btn-lg btn-block" href="delete.php?id='.$row['item_id'].'">  Delete</a>  </li>
		 </ul>
	 </div>
	</div>';
  }
  echo '</div></div>';
# Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message.
else { echo '<p>There are currently no items in this table.</p>' ; }

// Include admin footer
include 'include/footer.html';
?>
 