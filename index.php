<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>THĐ-TX</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/reset.css">
	<script src="https://kit.fontawesome.com/50f10d1d11.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
	<script src="assets/js/auto.js" type="text/javascript" charset="utf-8" async defer></script>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!--Favicon -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
	<div id="fb-root"></div>
	<div class="header">
		<div class="logo">
			<img src="assets/media/cfs.jpg" alt="" width="40px" height="40px">

		</div>
	</div>

	<div class="container">
		<div class="section">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<form enctype="multipart/form-data" method="POST" id="cfsform">
				<p style="font-size: 20px;"><b>Hãy viết hết những gì bạn muốn đăng xuống phía dưới:</b></p><br>
				<div class="form-group" contentEditable="true">
					<textarea id="content" rows="7" name="content" type="text" class="form-control" placeholder="Nội dung...." required></textarea>
				</div>
				<p style="font-size: 20px;"><b>Upload ảnh hoặc video (Nếu có)</b></p><br>
				<div class="custom-file mb-3">
					<input type="file" class="custom-file-input" id="fileToUpload" name="fileupload">
					<label class="custom-file-label" for="customFile">Chọn file tải lên</label>
				</div>
				<div class="alert alert-warning fade show" role="alert">
					<strong>Lưu ý:</strong> Chỉ định dạng file jpg, png, jpeg, mp4, mov và file nhỏ hơn 20MB được phép upload.
					</button>
				</div>
				<button type="submit" name="submit" id="filesubmit" class="btn btn-primary btn-block btn-sm">Gửi bài viết</button>
				<div class="alert alert-success" role="alert" id='noti'></div>
				<div class="alert alert-danger" role="alert" id='error_noti'></div>
			</form><br>
		</div>
	</div>
	<div class="footer">
		<p>&copy; <?php echo date("Y"); ?> THPT Trần Hưng Đạo - Thanh Xuân Confession</p><br>
		<span>
			Made with <i class="fa fa-heart pulse"></i> by <a href="https://www.facebook.com/te.nguyenku/" target="_blank">Nguyen Khai Hoan</a> and <a href="https://www.facebook.com/ducpa14" target="_blank">Phan Duc</a>
		</span>
	</div>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>