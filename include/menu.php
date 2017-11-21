<?php
include "library/dbCon.php";
include "classes/autoload.php";
$obj = new tintuc();
?>

<div>
  <nav class="navbar navbar-expand-xl navbar-light bg-faded">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><strong>Trang chủ</strong></a>
  
  <!-- Links -->
  <div class="collapse navbar-collapse" id="nav-content">   
   <ul class="navbar-nav">
    <?php
  $data = $obj->getCategorys();
    foreach ($data as $key => $value) {
      if($key>11){
        break;
      }
  ?>
    <li class="nav-item">
     <a class="nav-link" href="index.php?p=theloai&idTL=<?php echo $value['idTL']?>"><?php echo $value['TenTL']?></a>
   </li>
   <?php
    }
   ?>
 </ul>
 <!-- Search -->
 <form class="form-inline" role="search">
  <input type="text" class="form-control">
  <button type="submit" class="btn btn-secondary">Search</button>
</form>
</nav>
</div>