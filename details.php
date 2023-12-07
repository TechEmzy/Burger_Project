<?php

    //importing the connect database file into my details file
    include('config/db_connect.php');

    //check to delete
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);
        $sql = "DELETE FROM burgers WHERE id= $id_to_delete";

        if(mysqli_query($connect, $sql)){
            //success
            header("Location: index.php");
        }else{
            //failure
            echo 'query error: '. mysqli_error($connect);
        }
    }

    //Check GET req id param
    if (isset($_GET['id'])){
        //protecting the data in the database
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        //make sql
        $sql = "SELECT * FROM burgers WHERE id = $id";
        //get the query result
        $result = mysqli_query($connect, $sql);
        //fetch result in array format
        $burger = mysqli_fetch_assoc($result);
        //free result from memory
        mysqli_free_result($result);
        mysqli_close($connect);   
    }

?>

<!DOCTYPE html>
<html>

    <!-- injecting the Header into the details page -->
    <?php include('templates/header.php'); ?>
    
    <div class="container center grey-text">
        <?php if($burger): ?>
            <h4> <?php echo htmlspecialchars($burger['title']); ?> </h4>
            <p> Created by: <?php echo htmlspecialchars($burger['email']); ?> </p>
            <p> <?php echo htmlspecialchars($burger['created_at']); ?> </p>
            <h5 >Recipe: </h5>
            <p> <?php echo htmlspecialchars($burger['recipe']); ?> </p>

            <!-- DELETE BURGER -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $burger['id'] ?>" >
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" >
            </form>

        <?php else: ?>

            <h5> No such burger exists! </h5>
        
        <?php endif; ?>
    </div>

    <!-- injecting the Footer into the details page -->
    <?php include('templates/footer.php'); ?>

</html>