<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="author" content="Capt Ar Kar Myo">
	<title>NameCard</title>

	<link rel="stylesheet" href="css/rkmCss.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="js/datatables/dataTable.css">
	<style type="text/css">
		@font-face 
		{
		  font-family: 'Pyidaungsu';
		  src: URL('font/Pyidaungsu.ttf') format('truetype');
		}
		body
		{
			font-family: Pyidaungsu;
		}
	</style>
</head>
<body>
	<header class="header">
		<div class="headerDiv">
			<div class="headerInner1">
				<center><h3 style="display: none;"><i class="fas fa-bars menuBtn"></i></h3></center>
			</div>
			<div class="headerInner2">
				<center><h3>Name Card Admin</h3></center>
			</div>
			<div class="headerInner1">
				<center><span style="color: white;font-size: 0.6em;text-align: center;">mmsoftware100</span></center>
			</div>
		</div>
	</header>

	<!--edit div hide-->
	<div class="adminEditDiv">
		<div style="width: 50%;height: 200px;margin-top: 10%;margin-left: 25%;border-radius: 7px;background-color: white;">
			<span class="adminClose">X</span>
			<center><span>အသုံးပြုခွင့်</span></center>
			<div style="width:98%;height: 40px;margin-left: 1%;margin-top: 10px;">
				<select class="browser-default custom-select" id="role" name="categories">
					<option value="0">ခွင့်မပြုပါ</option>
					<option value="1">ခွင့်ပြုသည်</option>
				</select>
			</div>
			<div style="width:94%;height: 40px;margin-left: 3%;margin-top: 10px;">
				<input type="button" id="adminEditBtn" style="color:white;background-color: #00C851;" class="form-control" value="ပြင်မည်">
				<input id="hideId" type="hidden" value="">
			</div>
		</div>
	</div>

	<!--Menu Div-->
	<div class="adminMenu">
		<div class="adminMenuInner">
			<input type="button" id="notAllowed" class="form-control" value="မှတ်ပုံလာတင်ထားသူများ">
		</div>
		<div class="adminMenuInner">
			<input type="button" id="allowed" class="form-control" value="မှတ်ပုံတင်ထားပြီးထားသူများ" name="">
		</div>
	</div>

	<!--body div-->
	<div class="adminBody">
		<table class="table">
			<thead>
				<tr>
					<th>စဉ်</th><th>အမည်</th><th>အမည်ဝှက်</th><th>ဖုန်းနံပါတ်</th><th>စကားဝှက်</th><th>ပြင်</th><th>ဖျက်</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($data as $key => $value)
					{
				?>
				<tr class="<?php echo $value['dbId'];?>">
					<td><?php echo $key+1;?></td><td><?php echo $value['username'];?></td><td><?php echo $value['usernameFake'];?></td><td><?php echo $value['phoneNo'];?></td><td><?php echo $value['password1'];?></td><td><span class="adminEdit">edit</span><input type="hidden" value="<?php echo $value['dbId'];?>"></td><th><span class="adminDelete">delete</span><input type="hidden" value="<?php echo $value['dbId'];?>"></th>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<!--body div hide-->
	<div class="adminBody1">

	</div>


	<!-- JQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/rkmJs.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/datatables/dataTable.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".table").DataTable();
		});
	</script>
</body>
</html>