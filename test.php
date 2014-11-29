<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.css">
	<style type="text/css">
		.canvas {
			background: url(assets/img/logo_iiat.jpg) no-repeat 168px center;
			background-size: auto 100%;
			width: 100%;
			height: 800px;
			margin: 20px 0;
			position: relative;
		}
		.canvas .red {
			background: none repeat scroll 0 0 red;
			border-radius: 50%;
			height: 800px;
			margin: 0 auto;
			width: 800px;
			overflow: hidden;
			display: none;
		}
		.canvas .yellow-center {
			background: none repeat scroll 0 0 yellow;
			border-radius: 50%;
			height: 630px;
			margin: 84px auto;
			width: 620px;
			display: none;
		}
		.canvas .blue-01 {
			background: none repeat scroll 0 0 blue;
			height: 90px;
			left: 50%;
			position: absolute;
			top: 80px;
			width: 445px;
		}
		.canvas .blue-02 {
			background: none repeat scroll 0 0 blue;
			height: 40px;
			left: 50%;
			margin: -3px 0 0 -88px;
			position: absolute;
			top: 50%;
			width: 50px;
		}
		.canvas .blue-02:before {
			border-bottom: 23px solid transparent;
			border-left: 50px solid blue;
			border-top: 41px solid transparent;
			content: "";
			height: 0;
			width: 0;
		}
		.canvas .blue-03 {
			background: none repeat scroll 0 0 blue;
			height: 260px;
			left: 50%;
			margin: 54px 0 0 -88px;
			position: absolute;
			top: 50%;
			width: 50px;
		}
		.canvas .blue-04 {
			background: none repeat scroll 0 0 blue;
			height: 346px;
			left: 50%;
			margin: 54px 0 0 -10px;
			position: absolute;
			top: 50%;
			width: 30px;
		}
		.canvas .blue-04:before {
			border-bottom: 23px solid transparent;
			border-left: 30px solid blue;
			border-top: 36px solid transparent;
			content: "";
			height: 0;
			width: 0;
		}
		.canvas .blue-05 {
			background: none repeat scroll 0 0 blue;
			height: 454px;
			left: 50%;
			margin: -1px 0 0 150px;
			position: absolute;
			top: 50%;
			transform: rotate(-49grad);
			width: 30px;
		}
		.canvas .blue-05:before {
			border-bottom: 29px solid transparent;
			border-right: 30px solid blue;
			border-top: 36px solid transparent;
			bottom: -29px;
			content: "";
			height: 0;
			position: absolute;
			width: 0;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="canvas">
					<div class="red">
						<div class="yellow-center"></div>
					</div>
					<div class="blue-01"></div>
					<div class="blue-02"></div>
					<div class="blue-03"></div>
					<div class="blue-04"></div>
					<div class="blue-05"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>