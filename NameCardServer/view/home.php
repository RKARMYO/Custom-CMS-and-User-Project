<?php
	$userId=$_SESSION['userId'];
?>
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
		.hide
		{
			display: none;
		}
		.show
		{
			display: block;
		}

	</style>
</head>
<body>
	<header class="header">
		<div class="headerDiv">
			<div class="headerInner1">
				<center><h3><i class="fas fa-bars menuBtn"></i></h3></center>
			</div>
			<div class="headerInner2">
				<center><h3>Name Card</h3></center>
			</div>
			<div class="headerInner1">
				<center><h3 style="display: none;"><i class="fas fa-search"></i></h3></center>
			</div>
		</div>
	</header>

	<!--menu div-->
	<div class="menuDivHide" id="menuDivHide">
		<div class="menuHeader">
			<center><span><h3><i class="fas fa-users"></i></h3></span></center>
		</div>
		<div class="menuHeaderInner">
			<div class="menuHeaderInner1">
				<center><span><h3><i class="far fa-user myicon"></i></h3></span></center>
			</div>
			<div class="menuHeaderInner2">
				<h5 class='text-danger' style="padding-top: 5px;"><span class="profileBtn">Profile</span><input type="hidden" value="<?php echo $userId;?>"></h5>
			</div>
		</div>
		<div class="menuHeaderInner" style="display: none;">
			<div class="menuHeaderInner1">
				<center><span><h3><i class="far fa-comment myicon"></i></h3></span></center>
			</div>
			<div class="menuHeaderInner2">
				<h5 class='text-danger' style="padding-top: 5px;"><span class="groupChatBtn">Group Chat</span></h5>
			</div>
		</div>
		<div class="menuHeaderInner">
			<div class="menuHeaderInner1">
				<center><span><h3><i class="fab fa-android myicon"></i></h3></span></center>
			</div>
			<div class="menuHeaderInner2">
				<h5 class='text-danger' style="padding-top: 5px;"><span class="aboutBtn">About</span></h5>
			</div>
		</div>
	</div>

		<!--search div-->
		 <div class="searchDiv">
			<div class="input-group md-form form-sm form-1 pl-0">
			  <div class="input-group-prepend">
			    <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
			        aria-hidden="true"></i></span>
			  </div>
			  <input class="form-control my-0 py-1" id="searchVal" type="text" placeholder="အမည် (သို့) ဌာန ..." aria-label="Search">
			</div>
		</div>

	<!--body Div-->
	<div class="bodyDiv">
		<!--default div-->
		<?php
			foreach ($data as $key => $value) 
			{
		?>
		<div class="personDiv">
			<div class="personDivInner1">
				<img class="img" src="uploadImg/<?php echo $value['profileImg'] ;?>" alt="no image">
			</div>
			<div class="personDivInner2">
				<table  cellspacing='0' style="text-align: left;">
					<tr>
						<td><i class="fas fa-user prefix" style="color: white;"></i></td><td style="padding-left: 5px;">အမည် :</td><td><?php echo $value['username'] ;?></td>
					</tr>
					<tr>
						<td><i class="fas fa-phone-alt" style="color: white;"></i></td><td style="padding-left: 5px;">ဖုန်းနံပါတ် :</td>
						<td>
							<?php 
								$phStr=$value['phoneNo'] ;
								$phArr=explode(",", $phStr);
								$count=count($phArr);
								for($i=0;$i<$count;$i++)
								{
									if($count==1 || $i==($count-1))
									{
										echo "<a href='tel:".$phArr[$i]."'>".$phArr[$i]."</a>";
									}
									else
									{
										echo "<a href='tel:".$phArr[$i]."'>".$phArr[$i]."</a> , ";
									}
								}
							?>							
						</td>
					</tr>
				</table>
			</div>
			<div class="personDivInner3">
				<span class="text-primary" style="text-align: center;"><h2>></h2></span>
			</div>
			<input type="hidden" value="<?php echo $value['dbId'] ;?>">
		</div>
		<?php
			}
		?>
	</div>

	<!--search result div hide-->
	<div class="bodyDiv1">

	</div>


	<!--profile Div hide-->
	<div class="profileDivHide">
		<div class="mainProfileDiv">
			<form id="updateForm">
			<input type="hidden" name="operation" value="update">
			<span class="profileClose">x</span>
			<div class="imgSrc">
				 <center><label for='files'><div id='checkimage'>
				 		<!-- <span style="color: white;">your image</span> -->
		              <img id="userpf" src="#" alt="" style="width: 140px;height: 140px;border-radius: 30%;" />
		          </div></label>
		          <!-- <input id="files" style="visibility:hidden;" type="file" name="profile" onchange="readURL(this);"> --></center>
				<!-- <img class="img" src="uploadImg/a.jpg"> -->
			</div>
			<div style="width: 100%;height:40px;margin-top: 20px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="username">အမည် :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input type="text" class="form-control" id="username" name="username" placeholder="...">
				</div>
			</div>
			<div class="fakeHide" style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="usernamefake">အမည်ဝှက် :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input type="text" class="form-control" id="usernamefake" name="usernamefake" placeholder="...">
				</div>
			</div>
			<div style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="usernamefake">ဌာန :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<select class="browser-default custom-select" id="categories" name="categories">
						<option id="cateHide">ဝန်ထမ်းအမျိုးအစား</option>
						<option value="ရုံးဝန်ထမ်းများ">ရုံးဝန်ထမ်း</option>
						<option value="လွှတ်တော်ကိုယ်စားလှယ်များ">လွှတ်တော်ကိုယ်စားလှယ်</option>
						<option value="အစိုးရအဖွဲ့ဝန်ကြီးများ">အစိုးရအဖွဲ့ဝန်ကြီး</option>
						<option value="ပြည်နယ်/တိုင်းဒေသကြီးဌာနဆိုင်ရာများ">ပြည်နယ်/တိုင်းဒေသကြီးဌာနဆိုင်ရာ</option>
						<option value="လုံခြုံရေးဝန်ထမ်းများ">လုံခြုံရေးဝန်ထမ်း</option>
					</select>
				</div>
			</div>
			<div style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="rank">ရာထူး :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input type="text" class="form-control" id="rank" name="rank" placeholder="...">
				</div>
			</div>
			<div class="emptyphone" style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 40px;float: left;margin-left: 5%">
					<label for="phone">ဖုန်းနံပါတ် :</label>
				</div>
				<div style="width: 40%;height: 40px;float: left;">
					<input type="tel" class="form-control" class="phone" name="phone[]" placeholder="...">
				</div>
				<div style="width: 20%;height:40px;float: left;">
					<span class="phonePlus"><i class="fas fa-plus-circle"></i></span>
				</div>
			</div>
			<div class="toAppendPhone">
				
			</div>
			<div style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="email">အီးမေးလ် :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input type="email" class="form-control" id="email" name="email" placeholder="...">
					<span class="form-control" id="mailHide"></span>
				</div>
			</div>
			<div class="passHide" style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="password">စကားဝှက် :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input type="text" class="form-control" id="password" name="password" placeholder="...">
				</div>
			</div>
			<div style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="address">လိပ်စာ :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input type="text" class="form-control" id="address" name="address" placeholder="...">
				</div>
			</div>
			<div id="imgpfhide" style="width: 100%;height:40px;margin-top: 10px;">
				<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
					<label for="address">ဓါတ်ပုံ :</label>
				</div>
				<div style="width: 60%;height: 100%;float: left;">
					<input class="form-control" id="files" style="visibility:;" type="file" name="profile" onchange="readURL(this);">
				</div>
			</div>
			<div class="saveHide" style="width: 50%;height: 40px;margin-top: 7px;margin-left: 25%;">
				<input type="submit" class="form-control saveBtn" style="background-color: green;color: white;" value="သိမ်းဆည်းမည်">
				<input type="hidden" id="updateId" name="updateId">
			</div>
			</form>
		</div>
	</div>

	<!--About Div Hide-->
	<div class="aboutDiv">
		<span class="aboutClose">x</span>
		<div style="width: 90%;height: 100%;background-color: rgba(0,0,0,0.1);margin-left: 5%;border-radius: 5px;">
			<p><center>
			   ယခု Name Card Application ရဲ့ ရည်ရွယ်ချက်ကတော့ မိမိအဖွဲ့အစည်း (သို့) မိမိနှင့် ပတ်သက်သူများ၏ အချက်အလက်များကို တစ်နေရာတည်းမှာ စုစည်းထားပြီး အချိန်မရွေး နေရာမရွေးပဲ ကြည့်ရှု့နိုင်အောင်၊ အမြဲ update အချက်အလက်များကိုရရှိအောင် (<b>ဉပမာ၊ တစ်ယောက်က သူ့ရဲ့ ဖုန်းနံပါတ်၊ လိပ်စာပြောင်းလိုက်ရင် အခြားသူများမှာပါ အလိုအလျောက် ပြောင်းလဲ</b>) ရေးသားထားခြင်း ဖြစ်ပါတယ်။
			</center></p>
			<p>
				<center>
					<span>Developed By :<a href="https://m.me/mmsoftware100"><span style="color: blue;">mmsoftware100</span></a></span><br>
					Phone : <span style="color: green;"><a href="tel:09678186401"> Phone</a></span><br>
					Version : <span style="color: red;"> 1.0</span>
				</center>
			</p>
		</div>
	</div>

	<!--phone div hide-->
	<div id="getPhone" style="display: none;">
		<div style="width: 100%;height:40px;margin-top: 10px;">
			<div style="width: 30%;height: 100%;float: left;margin-left: 5%">
				<label for="phone"></label>
			</div>
			<div style="width: 40%;height: 100%;float: left;">
				<input type="text" class="form-control" class="phone" name="phone[]" placeholder="...">
			</div>
			<div style="width: 20%;height: 100%;float: left;">
				<span class="phonePlus"><i class="fas fa-plus-circle"></i></span>
				<span class="phoneMinus"><i class="fas fa-minus-circle"></i></span>
			</div>
		</div>
	</div>

	<!--Loading hide-->
	<div class="LoadingDiv">
		<center>
			<button class="btn btn-primary Loading" type="button" style='margin-top:150px;' disabled>
				<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
				Loading...
			</button>
		</center>
	</div>
	

	<!-- JQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/rkmJs.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>