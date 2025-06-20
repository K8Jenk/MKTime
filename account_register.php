<?php
// Include admin header
include 'include/header.html';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
# Connect to the database.
  require ('include/dbconnect.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if ( empty( $_POST[ 'last_name' ] ) ) 
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

   # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }

  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
$errors[] = 
'Email address already registered. 
<a class="alert-link" href="login.php">Sign In Now</a>' ;
  }

  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn', '$ln', '$e', '$p', NOW())" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '
     <p>You are now registered.</p>
	  <a class="alert-link" href="login.php">Login</a>'; }
	  
# Close database connection.
    mysqli_close($link); 
    exit();
  }

   # Or report errors.
  else 
  {
    echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<main role="main">
    <div class="container py-4 text-center">
        <div class="row gy-5 justify-content-center">
            <h1>Account Register</h1></div>
            
    <div class="container py-4 text-center">
        <div class="row gy-5 justify-content-center">

        <form action="account_register.php" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputFirstName">First Name</label>
                <input  type="text" 
                        name="first_name"
                        class="form-control" 
                        required 
                        placeholder="* First Name " 
                        value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
              </div>

              <div class="form-group col-md-6">
                <label for="inputSurname">Surname</label>
	              <input  type="text" 
                        name="last_name" 
                        class="form-control" 
                        required 
                        placeholder="* Last Name" 
                        value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail1">Email</label>
                <input type="email" 
                      name="email" 
                      class="form-control" 
                      required 
                      placeholder="* email@example.com" 
                      value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
              </div>
              </div>

              <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputpass1">Password</label>
                <input type="password"
                      name="pass1" 
                      class="form-control" 
                      required 
                      placeholder="* Create New Password" 
                      value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputpass2">Confirm Password</label>
                <input type="password"
                      name="pass2" 
                      class="form-control" 
                      required 
                      placeholder="* Create New Password" 
                      value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
              </div>
            </div>
          
            
            <div class="form-row justify-content-center">
              <input  type="submit"
                      value="Create Account Now">
          </form>
          
</main>

<?php
// Include admin footer
include 'include/footer.html';
?>