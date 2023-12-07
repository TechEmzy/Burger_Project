<?php

    //importing the connect database file into my add.php file
    include('config/db_connect.php');

    $title = $email = $recipe= '';              //setting all input variable to an empty string, for the VALUE in the input to persist the data.
    $errors = array('email'=>'', 'title'=>'', 'recipe'=>'');      //storing the errors in a variable.
    //setting the POST request
    if(isset($_POST['submit'])){
        // Check Email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){     //using filter to validate the Email field.
                $errors['email'] = 'email must be a valid email address';
            }
        }
        
        // Check Title
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required <br />';
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){            //using regular expression to validate the Title input.
                $errors['title'] = 'Title must be letters and spaces only';
            }
        }
        
        // Check Recipe
        if(empty($_POST['recipe'])){
            $errors['recipe'] = 'Atleast add a single recipe <br />';
        }else{
            $recipe = $_POST['recipe'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $recipe)){        //using regex to validate the Recipe input.
                $errors['recipe'] = 'The recipe must be a comma separated list';
            }
        }
        
        // Checking for errors and redirecting.
        if(array_filter($errors)){
            // echo 'errors in the form';
        }else{

            //protecting the data's going into the database
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $recipe = mysqli_real_escape_string($connect, $_POST['recipe']);

            //Create sql
            $sql = "INSERT INTO burgers(email, title, recipe) VALUES('$email', '$title', '$recipe')";

            //Save to the DB and check
            if(mysqli_query($connect, $sql)){
                //if sucess redirect me to the homepage/index page
                header('Location: index.php');
            }else{
                //error
                echo 'query error: ' . mysqli_error($connection);
            }
        }
    }
    //End of POST check

?>

<!DOCTYPE html>
<html lang="en">

    <!-- injecting the Header file into the index file which has the Materialize link stylesheet. -->
    <?php include('templates/header.php'); ?>  

    <!-- Form header -->
    <section class="container grey-text">
        <h4 class= "center">Add a Burger</h4>
        
        <!-- Form -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="white">
        
            <label>Your Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"> 
            <div class="red-text"><?php echo $errors['email']; ?></div>     <!-- output the email error below the email field -->
            
            <label>Burger Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>     <!-- output the title error below the title field -->
            
            <label>Burger Recipe(comma seperated):</label>
            <input type="text" name="recipe" value="<?php echo htmlspecialchars($recipe) ?>">
            <div class="red-text"><?php echo $errors['recipe']; ?></div>     <!-- output the recipe error below the recipe field -->

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>
    
    <!-- injecting the Footer file into the index file. -->
    <?php include('templates/footer.php'); ?>

</html>