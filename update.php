<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Update the record</title>
  </head>
  <style>
   
  </style>
  <body class="container">
            <h1 class="page-header">Update scp record</h1>

           
            <?php

              //check if id value was sent to this page via the get method (?=) from a link
            $id=isset($_GET['id'])? $_GET['id']:die('Error:Record id not found');

            // connect to the database

            include 'config/database.php';

          try
            {
                 //select data form the db
              $query="select id,item,class,image,containment,description from scp where id=:id";
            
             //bind our ? to  id
              $read=$conn->prepare($query);
              $read->bindParam(":id",$id);
              $read->execute();
               //store record into an associative array
              $row=$read->fetch(PDO::FETCH_ASSOC);

              //retrieve individual field data from the array
              $id =$row['id'];
              $item=$row['item'];
              $class =$row['class'];
              $image=$row['image'];
              $containment =$row['containment'];
              $description =$row['description'];
              
         }

         catch(PDOException $exception)
            {
                die('Error: '.$exception->getmessage());
            }


            if($_POST)
            {
             try
             {
              //update sql query
              $query="update scp set id=id,item=:item,class=:class,image=:image,containment=:containment,description=:description where id=:id";

              //prepare the query 
              $update=$conn->prepare($query);

              //save post values from the form
                 $id=htmlspecialchars(strip_tags($_POST['id']));
                  $item=htmlspecialchars(strip_tags($_POST['item']));
                    $class=htmlspecialchars(strip_tags($_POST['class']));
                     $image=htmlspecialchars(strip_tags($_POST['image']));
                     $containment=htmlspecialchars(strip_tags($_POST['containment']));
                      
                     $description=htmlspecialchars(strip_tags($_POST['description']));
                       

                    //bind our parameter to our query
                  $update->bindParam(':id',$id);
                  $update->bindParam(':item',$item);
                  $update->bindParam(':class',$class);
                    $update->bindParam(':image',$image);
                  $update->bindParam(':containment',$containment);
                  $update->bindParam(':description',$description);
                   
                  //execute the update query
                  if($update->execute())
                  {
                    echo"<div class='alert alert-success'>Record {$id} updated successfully.</div>";
                  }
                  else
                  {
                      echo"<div class='alert alert-danger'>Unable to update scp record.Please try again.</div>";
                  }


             }
             catch(PDOException $exception)
             {
               die('Error: '. $exception->getmessage());
             }
            }
            else
            {
              echo "<div class='alert alert-danger'>Record is ready to be updated</div>";
            }
                       

            ?>

   <h2>Enter a new scp Record. </h2>

      <form class="form-group bg1-dark text-dark p-1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] .'?id='. $id);?>" method="POST" >
     
     
     <br>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>" placeholder="scp id" require>
    

     <p>item</p>
     <br>
    <input type="text" class="form-control" name="item" value="<?php echo htmlspecialchars($item, ENT_QUOTES); ?>" placeholder="scp item" require>
    <br><br>

    <p>class</p>
    <br>
    <input type="text" class="form-control" name="class" value="<?php echo htmlspecialchars($class, ENT_QUOTES); ?>" placeholder="Text " require>
    <br>

     <p>Image</p>
    <br>
    <input type="text" class="form-control" name="image" value="<?php echo htmlspecialchars($image, ENT_QUOTES); ?>" placeholder="Text " require>
    <br>

    <p>containment</p>
     <br>
     <textarea class="form-control" rows="5" name="containment" require><?php echo htmlspecialchars($containment, ENT_QUOTES); ?></textarea>
    <br><br>

    <p>description</p>
    <br>
         <textarea class="form-control" rows="5" name="description" require><?php echo htmlspecialchars($description, ENT_QUOTES); ?></textarea>

    <br><br>

    
    <br>

    <hr width="75%">
    <input type="submit" class="btn btn-primary" name="update" value="Save Changes">
</form>
<p><a href="home.php" class="btn btn-info">Go Back</a></p>


     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

