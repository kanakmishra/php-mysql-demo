<?php
    session_start();
    include('connection.php');
	if(isset($_GET['Message'])){
		echo $_GET['Message'];
    }
    
    $hobbiesId= $_GET["id"];

    if (isset($_POST['edit'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $select = "UPDATE hobbies SET name='$name' WHERE id=$hobbiesId"; 
        $results = mysqli_query($db, $select);
            $Message = urlencode("<font color='green'>Data Updated successfully.</font>");
            header("Location:hobbies.php?Message=".$Message);
    } 

    $select ="SELECT * from hobbies where id= $hobbiesId";
    $selects = mysqli_query($db, $select);
    if ($count = $selects->num_rows > 0) {
        while( $rows = $selects->fetch_object() ){
            ?>
           <h3 class="card-title text-center">Edit Hobbies</h3>
		    <form method="post" action="hobbies_edit.php?id=<?php echo $hobbiesId; ?>" data-parsley-validate=""> 
			<div class="form-group">
				<label>Title</label>
                <input type="text" name="name" value="<?php echo $rows->name ?>" required=""/>
            </div>
			<div>
				<button type="submit" class="btn btn-primary" name="edit">Edit</button>
			</div>
            <?php
        }
    } 
?>
