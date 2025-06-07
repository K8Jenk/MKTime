<?php
include 'include/admin_header.html';
# Open database connection.
require ( 'include/dbconnect.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  
  # Initialize an error array.
  $errors = array();

# Check for a item name.
  if ( empty( $_POST[ 'item_id' ] ) )
  { $errors[] = 'Update item ID.' ; }
  else
  { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'item_id' ] ) ) ; }
  
  # Check for a item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for a item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

# Check for a item price.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }
 if ( empty( $errors ) ) 
  {
    $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: read.php");
    } else {
        echo "Error updating record: " . $link->error;
    }
  
    # Close database connection.
    
	mysqli_close($link); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' 
	<script type ="text/JavaScript">
	alert("' ;
    foreach ( $errors as $msg )
    { echo "$msg " ; }
    echo 'Please try again.")</script>';
    # Close database connection.
    mysqli_close( $link );
  } 
  

}
?>

<div class="container px-4">
    <h1>Update Item</h1>
<form action="update.php" method="post">
<div class="form-group">
  <label for="item_id">Update Item ID</label>
  <input type="text" name="item_id" class="form-control" value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>"> 
</div>
<div class="form-group">
<label for="item_name">Update Item Name</label>
  <input type="text" name="item_name" class="form-control" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>"> 
</div>
<div class="form-group">
	<label for="description">Description:</label>
	<textarea id="item_desc" class="form-control" name="item_desc" required value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>"></textarea>
</div>
<div class="form-group">
  <label for="item_img">Update Item Image</label>
  <input type="text" name="item_img" class="form-control" value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
</div>
<div class="form-group">
  <label for="item_desc">Update Item Price</label>
  <input type="text" name="item_price" class="form-control" value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">
</div>
  <input type="submit" class="btn btn-dark" value="Update Record"></p>
</form><!-- closing form -->
	<br>
		<!--<a href="create.php">Add Records</a>  |  <a href="read_table.php">Read Records</a>  |  <a href="update_record.php">Update Record</a>  | <a href="delete_record.php">Delete Record</a>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    
  </body>
</html>

<?php
// Include admin footer
include 'include/footer.html';
?>
