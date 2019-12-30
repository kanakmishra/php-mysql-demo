<?php 
    session_start();
    include("connection.php");
    if(isset($_GET['Message'])){
        echo $_GET['Message'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
        />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        
    </head>
    <?php  if (!empty($_SESSION['email'])){ ?>
    <body>
        
        <div>
            <h2>Hobbies</h2>    
                <div class="form-group" style="float:right" >
                    <a href="hobbies_add.php" class="alert-link">
                    <button type="button" class="btn btn-primary" name="Add">Add</button></a>
                </div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Created Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                </thead>  
                <tbody>
                <?php
                    $userId = $_SESSION['id'];
                    $select = "SELECT * FROM hobbies where user_id=  $userId";
                    $results = mysqli_query($db, $select);
                    if($results->num_rows > 0){
                        while($row = $results-> fetch_object()) { ?>
                            <tr>
                                <td> <?php echo $row->id ?></td>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo  date("d-M-Y",strtotime($row->created_at)) ?></td>
                                <td><a href="hobbies_edit.php?id=<?php echo $row->id ?>" class="glyphicon glyphicon-edit">Edit</a></td>
                                <td><a href="hobbies_delete.php?id=<?php echo $row->id ?>" class="glyphicon glyphicon-remove">Delete</td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "0 result";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </body>
    <?php } else { header("location:login.php");} ?>
</html>

<script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable();
  } );
</script>
