<?php
session_start();
require_once '../config/connect.php';
// if(!isset($_session['email']) & empty($_session['email'])){
// 	header('location: login.php');
// }

if (isset($_GET) & !empty($_GET)) { //if is set to get and not empty
    $id = $_GET['id']; //get the id 
} else {
    header('location: categories.php');
}
if (isset($_POST) & !empty($_POST)) { //if is set to post and not empty
    $id = mysqli_real_escape_string($connection, $_POST['id']); //post the id
    $name = mysqli_real_escape_string($connection, $_POST['categoryname']);//post the categoryname
    $sql = "UPDATE category SET name = '$name' WHERE id=$id"; //we are updating the form
    $res = mysqli_query($connection, $sql);
    if ($res) {
        $smsg = "Category updated";
    } else {
        $fmsg = "Failed to update Category";
    }
}
?>
<?php include "inc/header.php" ?>
<?php include "inc/nav.php" ?>

<section id="content">
    <div class="content-blog">
        <div class="container">
        <?php /* displays error */ if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?> 
		<?php /*displays error */ if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Productname">Product Name</label>
                    <?php
                    $sql = "SELECT * FROM category WHERE id=$id";
                    $res = mysqli_query($connection, $sql);
                    $r = mysqli_fetch_assoc($res);
                    ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="text" class="form-control" name="categoryname" id="Productname" placeholder="Category Name" value="<?php echo $r['name'];  ?>">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>

</section>


<?php include "inc/footer.php" ?>