<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Mail</title>
	</head>
	<body>
		<div style="background: #f5f5f5;font-family: Arial; overflow: hidden;">
			<div style=" background: none repeat scroll 0 0 #FFFFFF; border: 0 solid #AAAAAA; border-radius: 5px; -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3), 0 0 30px 0 rgba(0, 0, 0, 0.15);-moz-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3), 0 0 30px 0 rgba(0, 0, 0, 0.15);box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3), 0 0 30px 0 rgba(0, 0, 0, 0.15); color: #444444; font-size: 0.9em; margin: 50px auto 20px; padding: 30px 50px; width: 80%; ">
				<img src="" alt="Bach">
				<hr>
				<div>
					<?php echo isset($message) ? $message : '' ?>
				</div>
			</div>
			<div style="color: #aaa;width: 80%;margin: 0 auto 20px;font-size: .7em; text-align: center;">
				<p style="margin: 0 0 5px;">Este mensaje se generó automáticamente, no responda a este mensaje.</p>
				<p style="margin: 0 0 5px;">&copy; <?php echo date('Y') ?> - Bach</p>
			</div>
		</div>
	</body>
</html>