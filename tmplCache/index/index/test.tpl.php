<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset=UTF-8">
  <title>Summernote</title>

<link href="home/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- <link href="home/bootstrap/css/navbar.css" rel="stylesheet"> -->

<!-- lunt Css -->
<link href="home/lunt/css/common.css" rel="stylesheet">
<link href="home/lunt/css/icon.css" rel="stylesheet">


<!-- font-awesome -->
<link href="http://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" > 

<!-- summernote -->
<link href="home/plugins/summernote/summernote.css" rel="stylesheet" >

<!-- select2 -->
<link href="home/plugins/select2/select2.min.css" rel="stylesheet">

<!-- tabCloud -->
<link href="home/plugins/tabCloud/css/tab.css" rel="stylesheet">


<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->



</head>
<body>
<script src="home/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- <script src="http://www.jq22.com/jquery/jquery-1.7.1.js"></script> -->
<script src="home/bootstrap/js/bootstrap.min.js"></script>
<script src="home/plugins/summernote/summernote.js"></script>
<script src="home/plugins/select2/select2.min.js"></script>
<script src="home/plugins/tabCloud/js/tab.js"></script>
<script src="home/template/template.js"></script>
<script src="home/lunt/js/test.js"></script>
<script src="home/lunt/js/wdsq.js"></script>
<script src="home/lunt/js/aw_template.js"></script>
<script src="home/lunt/js/plug-in.js"></script>
  <script>
    $(document).ready(function() {
       var file = '12444'; 
       var data = new FormData();  
       data.append("file", file); 
       console.log(data.get("file"));
    });
  </script>
  

</body>
</html>