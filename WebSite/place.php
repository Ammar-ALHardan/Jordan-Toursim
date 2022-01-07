<?php $con = mysqli_connect('localhost','root','','orange_tourism'); ?>
<?php
$id = $_GET['id']; 
$query = "SELECT * FROM `tourist_place` WHERE id =$id";
$excute = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($excute);
print_r($row)

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="card" style="width: 18rem;">
  <img src="../admin/uploads/<?php echo $row['img']  ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Name :<?php echo $row['nameplace'] ?>.</p>
  </div>
</div>
