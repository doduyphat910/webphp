 <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script type="text/javascript" src="js/tintuc.js"></script>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
 <link rel="stylesheet" type="text/css" href="css/style.css"/>

<body style="background-color: whitesmoke" class="loading" >
<div class="dots-loader"></div>
<style type="text/css" media="screen">
.loading * {
  display: none;}
.dots-loader:not(:required) {
  opacity: 1;
  overflow: hidden;
  position: absolute;
  left: 50%;
  top: 50%;
  margin-left: -4px;
  margin-top: -4px;
  text-indent: -9999px;
  display: inline-block;
  width: 8px;
  height: 8px;
  background: transparent;
  border-radius: 100%;
  box-shadow: #f86 -14px -14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px 14px 0 7px, #4ae -14px 14px 0 7px;
  animation: dots-loader 5s infinite ease-in-out;
  transform-origin: 50% 50%;
  transform: scale(1);
  transition: .3s all;
}
@keyframes dots-loader {
  0% {
    box-shadow: #f86 -14px -14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px 14px 0 7px, #4ae -14px 14px 0 7px;
  }
  8.33% {
    box-shadow: #f86 14px -14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px 14px 0 7px, #4ae -14px 14px 0 7px;
  }
  16.67% {
    box-shadow: #f86 14px 14px 0 7px, #fc6 14px 14px 0 7px, #6d7 14px 14px 0 7px, #4ae -14px 14px 0 7px;
  }
  25% {
    box-shadow: #f86 -14px 14px 0 7px, #fc6 -14px 14px 0 7px, #6d7 -14px 14px 0 7px, #4ae -14px 14px 0 7px;
  }
  33.33% {
    box-shadow: #f86 -14px -14px 0 7px, #fc6 -14px 14px 0 7px, #6d7 -14px -14px 0 7px, #4ae -14px -14px 0 7px;
  }
  41.67% {
    box-shadow: #f86 14px -14px 0 7px, #fc6 -14px 14px 0 7px, #6d7 -14px -14px 0 7px, #4ae 14px -14px 0 7px;
  }
  50% {
    box-shadow: #f86 14px 14px 0 7px, #fc6 -14px 14px 0 7px, #6d7 -14px -14px 0 7px, #4ae 14px -14px 0 7px;
  }
  58.33% {
    box-shadow: #f86 -14px 14px 0 7px, #fc6 -14px 14px 0 7px, #6d7 -14px -14px 0 7px, #4ae 14px -14px 0 7px;
  }
  66.67% {
    box-shadow: #f86 -14px -14px 0 7px, #fc6 -14px -14px 0 7px, #6d7 -14px -14px 0 7px, #4ae 14px -14px 0 7px;
  }
  75% {
    box-shadow: #f86 14px -14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px -14px 0 7px, #4ae 14px -14px 0 7px;
  }
  83.33% {
    box-shadow: #f86 14px 14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px 14px 0 7px, #4ae 14px 14px 0 7px;
  }
  91.67% {
    box-shadow: #f86 -14px 14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px 14px 0 7px, #4ae -14px 14px 0 7px;
  }
  100% {
    box-shadow: #f86 -14px -14px 0 7px, #fc6 14px -14px 0 7px, #6d7 14px 14px 0 7px, #4ae -14px 14px 0 7px;
  }
}
.loaded .dots-loader {
  opacity: 0;
  z-index: -1;
  pointer-events: none;
  transform: scale(0);
}
</style>
<script type="text/javascript">
  setTimeout(function() {
  $('body')
    .removeClass('loading')
    .addClass('loaded');
}, 3000);
</script>
<?php
if(isset($_SESSION['idUser'])){
	include("include/welcome.php");	
}
else{
	include("include/top.php");	
}
include("include/banner.php");
include("include/menu.php");
include("include/slide.php");
include("include/content.php");
include("include/footer.php");
 ?>
</body>
