<?php

    //import the connect database file into my index.php
    include('config/db_connect.php');

    //construct the query for all burgers
    $sql = 'SELECT title, recipe, id FROM burgers ORDER BY created_at';

    //make query and get result
    $result = mysqli_query($connect, $sql);

    //fetch the resulting rows as an array
    $burgers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);   //free result from memory

    //close connection
    mysqli_close($connect);
    // print_r($burgers);

?>

<!DOCTYPE html>
<html lang="en">

    <!-- injecting the Header file into the index file -->
    <?php include('templates/header.php'); ?>  

    <h4 class="center grey-text">Burgers!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($burgers as $burger): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/burger.png" alt="burger" class="burger">

                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($burger['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $burger['recipe']) as $rec): ?>
                                    <li><?php echo htmlspecialchars($rec) ?></li>
                                <?php endforeach; ?>
                            </ul>                            
                        </div>

                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $burger['id'] ?>">more info</a>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- injecting the Footer file into the index file -->
    <?php include('templates/footer.php'); ?>  

</html>