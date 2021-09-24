<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>THĐ-TX</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/index.css">
	<link rel="stylesheet" href="assets/css/reset.css">
	<script src="assets/js/auto.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=274900842999711&autoLogAppEvents=1"></script>
<div class="header">
	<div class="logo">
		<img src="assets/media/cfs.jpg" alt="" width="40px" height="40px">
		
	</div>
</div>

<div class="container">
	<div class="section">
		<form  method="post" enctype="multipart/form-data" action="src/FormDataHandler.php">
		  <p style="font-size: 20px;"><b>Hãy viết hết những gì bạn muốn đăng xuống phía dưới:</b></p><br>
		  <div class="form-group" contentEditable="true">
		    <textarea id="content" rows="7" name="content" type="text" class="form-control" placeholder="Viết vào đây" required></textarea>
		  </div>
		  <p style="font-size: 20px;"><b>Upload ảnh và video (Nếu có)</b></p><br>
		  <div class="form-group">
    		<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file">
  		  </div>
		  <button type="submit" name="submit" class="btn btn-primary btn-block btn-sm">Gửi Confession</button>
		</form><br>
		<?php 
			echo OkMess();
			echo ErrorMess();
		?>
	</div>
</div>
<div class="footer">
<p>&copy; <?php echo date("Y"); ?> THPT Trần Hưng Đạo - Thanh Xuân</p><br>
<p>Current time: <?php $datetime = date('d-m-Y H:i:s'); echo $datetime;?></p>
<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthptthdtxcfs%2F&tabs&width=314&height=214&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=true&appId=274900842999711" width="314" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>