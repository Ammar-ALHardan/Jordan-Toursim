<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $password=$_POST['password'];

 $query="INSERT INTO `user`(`name`,`email`,`phone`,`password`) VALUES ('$name','$email','$phone','$password')";
 mysqli_query($conn,$query);
 header('location: manage_user.php');

}
?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">Manage User's</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        
                        
                        <div class="form-group">
                                <label for="">Name :</label>
                                <input type="text" id="name" name="name" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">E-mail :</label>
                                <input type="text" id="email" name="email" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone :</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Password :</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add User's</button></div>
                                        </form>
                                 </div>
                           </div>
                    </div>
             </div>
      </div>  
</div>              
<div class="row mb-5">
    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM `user`";
                                        $excute = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            <td>
                                                <a href="delete_user.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_user.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</div>
