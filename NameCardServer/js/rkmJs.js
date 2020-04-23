$(document).ready(function(){ console.log("jquery ok");

	// $(".table").DataTable();

	$(document).on("click",".menuBtn",function(){
		$(".menuDivHide").slideToggle("fast");
	});

	$(document).on("click",".personDivInner3",function(){
		$(".LoadingDiv").show();
		var userId=$(this).next().val();//alert(userId);
		$(".profileDivHide").show();
		$("#checkimage").empty();
		$.post("index.php",{operation:"showProfile",dbId:userId},function(res){ //alert(res);
			var decode=JSON.parse(res);
			$("#username").val(decode[0]['username']);
			$("#rank").val(decode[0]['rank']);
			var mail="<a href='mailto:"+decode[0]['email']+"'>"+decode[0]['email']+"</a>";
			$("#address").val(decode[0]['address']);
			$("#updateId").val(decode[0]['dbId']);

			$("#mailHide").show();
			$("#mailHide").html(mail);
			$("#email").hide();
			$("#imgpfhide").hide();

			$(".fakeHide").addClass("hide");
			$(".passHide").addClass("hide");
			$(".saveHide").addClass("hide");

			$('#username').prop('disabled', true);
			$('#rank').prop('disabled', true);
			$('#email').prop('disabled', true);
			$('#address').prop('disabled', true);
			$('#categories').prop('disabled', true);
			$('#files').prop('disabled', true);


			var img=decode[0]['profileImg'];
			var str=decode[0]['phoneNo'];//alert(decode[0]['phoneNo']);			
			if(str!=null)
			{
				var ar = str.split(',');
				$(".emptyphone").remove();
				var string="";
				for(i=0;i<ar.length;i++)
				{
					$(".toAppendPhone").empty();
					if(i==0)
					{
						string+='<div style="width: 100%;height:40px;margin-top: 10px;"><div style="width: 30%;height: 100%;float: left;margin-left: 5%"><label for="phone">ဖုန်းနံပါတ် :</label></div><div style="width: 40%;height: 100%;float: left;"><a href="tel:'+ar[i]+'"><input type="text" class="form-control" class="phone" name="phone[]" value="'+ar[i]+'" disabled></a></div><div style="width: 20%;height: 100%;float: left;"></div></div>';
					}
					else
					{
						string+= '<div style="width: 100%;height:40px;margin-top: 10px;"><div style="width: 30%;height: 100%;float: left;margin-left: 5%"><label for="phone"> </label></div><div style="width: 40%;height: 100%;float: left;"><a href="tel:'+ar[i]+'"><input type="text" class="form-control" class="phone" name="phone[]" value="'+ar[i]+'" disabled></a></div><div style="width: 20%;height: 100%;float: left;"></div></div>';
					}
					$(".toAppendPhone").append(string);
					$(".LoadingDiv").hide();
				}
			}

			if(img!=null)
			{
				$("#checkimage").html("<img id='userpf' class='img' src='uploadImg/"+decode[0]['profileImg']+"' alt='Your Image +' style='width:140px;height:140px;border-radius:30%;'>");
			}

			var cate=decode[0]['categories'];//alert(cate);
			if(cate.length > 0)
			{
				$("#cateHide").text(cate);
				$("#cateHide").val(cate);
			}
		});
	});

	$(document).on("click",".profileBtn",function(){
		$(".LoadingDiv").show();
		$(".profileDivHide").show();
		$("#checkimage").empty();
		var userId=$(this).next().val();console.log("userId:"+userId);
		$.post("index.php",{operation:"showProfile",dbId:userId},function(res){ //alert(res);
			var decode=JSON.parse(res);
			$("#username").val(decode[0]['username']);
			$("#usernamefake").val(decode[0]['usernameFake']);
			$("#rank").val(decode[0]['rank']);
			$("#email").val(decode[0]['email']);
			$("#password").val(decode[0]['password1']);
			$("#address").val(decode[0]['address']);
			$("#updateId").val(decode[0]['dbId']);

			$("#mailHide").hide();
			$("#email").show();
			$("#imgpfhide").show();

			$(".fakeHide").removeClass("hide");
			$(".passHide").removeClass("hide");
			$(".saveHide").removeClass("hide");

			$('#username').prop('disabled', false);
			$('#rank').prop('disabled', false);
			$('#email').prop('disabled', false);
			$('#address').prop('disabled', false);
			$('#categories').prop('disabled', false);
			$('#files').prop('disabled', false);


			var img=decode[0]['profileImg'];
			var str=decode[0]['phoneNo'];//alert(decode[0]['phoneNo']);			
			if(str!=null)
			{
				var ar = str.split(',');
				$(".emptyphone").remove();
				var string="";
				for(i=0;i<ar.length;i++)
				{
					$(".toAppendPhone").empty();
					if(i==0)
					{
						string+='<div style="width: 100%;height:40px;margin-top: 10px;"><div style="width: 30%;height: 100%;float: left;margin-left: 5%"><label for="phone">ဖုန်းနံပါတ် :</label></div><div style="width: 40%;height: 100%;float: left;"><input type="text" class="form-control" class="phone" name="phone[]" value="'+ar[i]+'"></div><div style="width: 20%;height: 100%;float: left;"><span class="phonePlus"><i class="fas fa-plus-circle"></i></span><span class="phoneMinus"><i class="fas fa-minus-circle"></i></span></div></div>';
						//$(".toAppendPhone").append(string);
					}
					else
					{
						string+= '<div style="width: 100%;height:40px;margin-top: 10px;"><div style="width: 30%;height: 100%;float: left;margin-left: 5%"><label for="phone"> </label></div><div style="width: 40%;height: 100%;float: left;"><input type="text" class="form-control" class="phone" name="phone[]" value="'+ar[i]+'"></div><div style="width: 20%;height: 100%;float: left;"><span class="phonePlus"><i class="fas fa-plus-circle"></i></span><span class="phoneMinus"><i class="fas fa-minus-circle"></i></span></div></div>';
						//$(".toAppendPhone").append(string);
					}
					$(".toAppendPhone").append(string);
					$(".LoadingDiv").hide();
				}
			}

			if(img!=null)
			{
				$("#checkimage").html("<img id='userpf' class='img' src='uploadImg/"+decode[0]['profileImg']+"' alt='Your Image +' style='width:140px;height:140px;border-radius:30%;'>");
			}

			var cate=decode[0]['categories'];//alert(cate);
			if(cate.length > 0)
			{
				$("#cateHide").text(cate);
				$("#cateHide").val(cate);
			}
		});
	});

	$(document).on("click",".profileClose",function(){
		$(".profileDivHide").hide();
		$(".menuDivHide").hide();
	});

	$(document).on("click",".phonePlus",function(){
		var phDiv=$("#getPhone").html();
		$(".toAppendPhone").append(phDiv);
	});

	$(document).on("click",".phoneMinus",function(){
		$(this).parent().parent().remove();
	});

	$(document).on("submit","#updateForm",function(e){
		e.preventDefault();console.log("form ok");
		$.ajax({
			url:'index.php',
			type:'post',
			data:new FormData(this),
			cache:false,// no cache
			processData:false,
			contentType:false,
			success:function(res)
			{
				if(res==true)
				{
					alert("အောင်မြင်ပါသည်!");
					$(".profileDivHide").hide();
					$(".menuDivHide").hide();
				}
				else
				{
					alert("မှားယွင်းနေပါသည်!");
				}
			}
		});
	});

	$(document).on("keyup","#searchVal",function(){
		var searchVal=$("#searchVal").val();console.log("searchVal :"+searchVal);
		$(".bodyDiv").hide();
		$(".bodyDiv1").show();
		$.get("index.php",{operation:"search",searchVal:searchVal},function(res){ //alert(res);
			var decode=JSON.parse(res);
			var string="";
			$(".bodyDiv1").empty();
			for(i=0;i<decode.length;i++)
			{
				
				if(decode[i]["phoneNo"].length > 0)
				{
					var phLink="";
					var phStr=decode[i]["phoneNo"];
					var phArr = phStr.split(',');				
					var count=phArr.length;
					for(j=0;j<count;j++)
					{
						if(count==1 || i==(count-1))
						{
							phLink+= "<a href='tel:"+phArr[j]+"'>"+phArr[j]+"</a>";
						}
						else
						{
							phLink+= "<a href='tel:"+phArr[j]+"'>"+phArr[j]+"</a> , ";
						}
					}
				}
				string+= '<div class="personDiv"><div class="personDivInner1"><img class="img" src="uploadImg/'+decode[i]["profileImg"]+'"></div><div class="personDivInner2"><table  cellspacing="0" style="text-align: left;"><tr><td><i class="fas fa-user prefix" style="color: white;"></i></td><td style="padding-left: 5px;">အမည် :</td><td>'+decode[i]["username"]+'</td></tr><tr><td><i class="fas fa-phone-alt" style="color: white;"></i></td><td style="padding-left: 5px;">ဖုန်းနံပါတ် :</td><td>'+phLink+'</td></tr></table></div><div class="personDivInner3"><span class="text-primary" style="text-align: center;"><h2>></h2></span></div><input type="hidden" value="'+decode[i]["dbId"]+'"></div>';
			}
			$(".bodyDiv1").html(string);
		});
		if(searchVal=="")
		{
			$(".bodyDiv").show();
			$(".bodyDiv1").hide();
		}
	});

	$(document).on("click",".adminEdit",function(){
		var dbId=$(this).next().val();//alert(dbId);
		$("#hideId").val(dbId);
		$(".adminEditDiv").show();
		//$("."+dbId).hide();
	});

	$(document).on("click",".adminDelete",function(){
		var dbId=$(this).next().val();//alert(dbId);
		$.get("index.php",{operation:"adminDelete",dbId:dbId},function(res){ //alert(res);
			if(res==true)
			{
				alert("Success!");
				$("."+dbId).hide();
			}
		});
	});

	$(document).on("click",".adminClose",function(){
		$(".adminEditDiv").hide();
	});
	
	$(document).on("click","#adminEditBtn",function(){ //alert("ok");
		var dbId=$("#hideId").val();
		var role=$("#role").val(); console.log(dbId+role);
		$.post("index.php",{operation:"adminUpdate",dbId:dbId,userRole:role},function(res){ //alert(res);
			if(res==true)
			{
				alert("Success!");
				$(".adminEditDiv").hide();
				$("."+dbId).hide();
			}
		});
	});

	$(document).on("click","#allowed",function(){
		$(".adminBody").hide();
		$(".adminBody1").show();
		$.get("index.php",{operation:"allowedData"},function(res){ //alert(res);
			if(res!=404)
			{
				var decode=JSON.parse(res);
				var count=decode.length;//alert(count);
				var string="";
				string+= '<table class="table"><thead><tr><th>စဉ်</th><th>အမည်</th><th>အမည်ဝှက်</th><th>ဖုန်းနံပါတ်</th><th>စကားဝှက်</th><th>ဌာန</th><th>ရာထူး</th><th>အီးမေးလ်</th><th>ပြင်</th><th>ဖျက်</th></tr></thead><tbody>';
				for(i=0;i<count;i++)
				{
					string+= '<tr class=""><td>'+(i+1)+'</td><td>'+decode[i]['username']+'</td><td>'+decode[i]['usernameFake']+'</td><td>ph</td><td>'+decode[i]['password1']+'</td><td>'+decode[i]['categories']+'</td><td>'+decode[i]['rank']+'</td><td>'+decode[i]['email']+'</td><td><span class="adminEdit">edit</span><input type="hidden" value="'+decode[i]['dbId']+'"></td><th><span class="adminDelete">delete</span><input type="hidden" value="'+decode[i]['dbId']+'"></th></tr>';
				}
				string+= "</tbody></table>";
				$(".adminBody1").empty();
				$(".adminBody1").append(string);
				$(".table").DataTable();
			}
			else
			{
				alert("No data!");
			}
		});
	});

	$(document).on("click","#notAllowed",function(){
		$(".adminBody").show();
		$(".adminBody1").hide();
	});

	$(document).on("click",".aboutBtn",function(){
		$(".aboutDiv").show();
	});

	$(document).on("click",".aboutClose",function(){
		$(".aboutDiv").hide();
		$("#menuDivHide").hide();
	});	

});


// $(document).on("click",function(e){
	// 	if (e.target.id === 'menuDivHide') {
	//             alert('Div Clicked !!');
	//         } else {
	//             $('#menuDivHide').hide();
	//         }
	// });
function readURL(input) {//================Photo ရွေးလိုက်ရင်ရွေးတဲ့ပုံပေါ်အောင်လို့====================
    if (input.files && input.files[0]) 
    {
        var reader = new FileReader();

        reader.onload = function (e) {
                    $('#userpf')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
