<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="js/jquery.js"></script>
	<style>
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: #000;
		}
		.header-bg{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100vh;
			background: url('img/2.jpg');
			background-size: cover;
			background-attachment: fixed;
			display: flex;
			justify-content: center;
			align-items: center; 
		}
		.header-bg h2{
			margin: 0;
			padding: 0;
			background: #fff;
			color: #000;
			padding: 20px;
			text-align: center;
			max-width: 80%;

		}
		section{
			position: relative;
			top: 100vh;
			padding: 100px;
			width: 100%;
			min-height: 100vh;
			box-sizing: border-box;
		}
		section h2{
			margin: 0 0 50px;
			padding: 0;
			font-size: 4em;
			color: white;
		}
		section p {
			color: white;
		}
	</style>
</head>
<body>
	<div class="header-bg">
		<h2>Fast-service</h2>
	</div>

	<section>
		<h2>Teste</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PcageMaker including versions of Lorem Ipsum.</		
	</section>
	
	<script>
		$(document).ready(function(){
			$(window).scroll(function(){
				$('.header-bg').css('opacity', 1 -
					$(window).scrollTop()/700)
			})
		})
	</script>

</body>
</html>