<?php

	header("Access-Control-Allow-Origin:*");
	class Model 
	{
		private $mysqli = null;
		private $stmt = null;

		function __construct()
		{
		    try
		    {
		    	$servername = "localhost";
				$username = "root";
				$password = "";
				$db_name = "test";
				  $this->mysqli = new mysqli($servername, $username, $password, $db_name);
				  $this->mysqli -> set_charset("utf8");
		    } 
		    catch (Exception $ex) 
		    { 
		    	die($ex->getMessage()); 
		    }
		}

		function __destruct()
		{
		    if ($this->stmt!==null) { $this->stmt = null; }
		    if ($this->mysqli!==null) { $this->mysqli = null; }
		}
		
		public function register($username,$usernamefake,$password,$phone)
		{
			try
			    {
			      $this->stmt = $this->mysqli->prepare("INSERT INTO namecard (username,usernameFake,password1,phoneNo) VALUES (?,?,?,?)");
			      $this->stmt->bind_param('ssss',$username,$usernamefake,$password,$phone);
				  if($this->stmt->execute())
				  {
					  echo true;
				  }
			      
			    }
			    catch (Exception $ex)
			    { 
			    	die($ex->getMessage()); 
				}
				$this->stmt = null;
		}

		public function login($username,$password)
		{
		    try
		    {
				$this->stmt= $this->mysqli->prepare("SELECT * FROM namecard WHERE usernameFake=? AND password1=?");
				$this->stmt->bind_param('ss',$username,$password);
				$this->stmt->execute();
				$result = $this->stmt->get_result();
				$rows=$result->num_rows;
		      	$datas = $result->fetch_all(MYSQLI_ASSOC);

				if($rows > 0)
				{
					if($datas[0]['userRole']==1)
					{
						$data=array("status"=>"101","code"=>"5542587","id"=>$datas[0]['dbId']);
						echo json_encode($data);
					}
					else
					{
						$data=array("status"=>"505","code"=>"0000");
						echo json_encode($data);
					}
				}
				else
				{
					$data=array("status"=>false,"code"=>"0000");
					echo json_encode($data);
				}
		    }
		    catch (Exception $ex)
		    { 
		    	die($ex->getMessage());
		    }
		    $this->stmt = null;
		}

		public function loginAdmin($name,$pass)
		{
			if($name=="soehtike55" && $pass=="mmsoftware10055")
			{
				$data=array("status"=>true,"code"=>"5542587");
				echo json_encode($data);
			}
			else
			{
				$data=array("status"=>false,"code"=>"0000");
				echo json_encode($data);
			}
		}
		
		public function profile($id)
		{
		    try
		    {
		      $this->stmt= $this->mysqli->prepare("SELECT * FROM namecard WHERE dbId=?");
		      $this->stmt->bind_param("i",$id);
		      $this->stmt->execute();
		      $result = $this->stmt->get_result();
		      $result = $result->fetch_all(MYSQLI_ASSOC);
		    }
		    catch (Exception $ex)
		    { 
		    	die($ex->getMessage()); 
		    }
		    $this->stmt = null;
		    echo json_encode($result);
		}

		public function select($sql)
		{
			$result = false;
		    try
		    {
		      $this->stmt= $this->mysqli->prepare($sql);
		      $this->stmt->execute();
		      $result = $this->stmt->get_result();
		      $result = $result->fetch_all(MYSQLI_ASSOC);
		    }
		    catch (Exception $ex)
		    { 
		    	die($ex->getMessage()); 
		    }
		    $this->stmt = null;
		    return $result;
		}

		public function update($dbId,$rank,$username,$usernamefake,$phone,$email,$password,$address,$imgOrg,$imgTemp,$cate)
		{
			$phones=implode(",",$phone);
			if(!empty($imgOrg))//with image
			{
				$check=0;
				$posttime=time();
				$targetDir = "uploadImg/".$posttime.$imgOrg;
				$img=$posttime.$imgOrg;
				if(move_uploaded_file($imgTemp,$targetDir))
				{
					$check++;
				}
				if($check > 0)
				{
					try
					{
						$this->stmt= $this->mysqli->prepare("UPDATE namecard SET username=?,usernameFake=?,password1=?,phoneNo=?,address=?,profileImg=?,rank=?,email=?,categories=? WHERE dbId=?");
						$this->stmt->bind_param("sssssssssi",$username,$usernamefake,$password,$phones,$address,$img,$rank,$email,$cate,$dbId);
						if($this->stmt->execute())
						{
							echo true;
						}
					}
					catch (Exception $ex)
					{ 
						die($ex->getMessage()); 
					}
					$this->stmt = null;
				}
			}
			else//no image
			{
				try
				{
					$this->stmt= $this->mysqli->prepare("UPDATE namecard SET username=?,usernameFake=?,password1=?,phoneNo=?,address=?,rank=?,email=?,categories=? WHERE dbId=?");
					$this->stmt->bind_param("ssssssssi",$username,$usernamefake,$password,$phones,$address,$rank,$email,$cate,$dbId);
					if($this->stmt->execute())
					{
						echo true;
					}
				}
				catch (Exception $ex)
				{ 
					die($ex->getMessage()); 
				}
				$this->stmt = null;
			}
		}

		public function search($value)
		{
		    try
		    {
				$value1="%".$value."%";
				$this->stmt= $this->mysqli->prepare("SELECT * FROM namecard WHERE userRole=? AND username LIKE ? OR categories LIKE ? LIMIT 50");
				$this->stmt->bind_param("iss",$role,$value1,$value1);
				$role=1;
				$this->stmt->execute();
				$result = $this->stmt->get_result();
				$result = $result->fetch_all(MYSQLI_ASSOC);
		    }
		    catch (Exception $ex)
		    { 
		    	die($ex->getMessage()); 
		    }
		    $this->stmt = null;
		    echo json_encode($result);
		}

		public function adminUpdate($dbId,$role)
		{
			try
			{
				$this->stmt= $this->mysqli->prepare("UPDATE namecard SET userRole=? WHERE dbId=?");
				$this->stmt->bind_param("ii",$role,$dbId);
				if($this->stmt->execute())
				{
					echo true;
				}
			}
			catch (Exception $ex)
			{ 
				die($ex->getMessage()); 
			}
			$this->stmt = null;
		}

		public function delete($dbId)
		{
			try
			{
				$this->stmt= $this->mysqli->prepare("DELETE FROM namecard WHERE dbId=?");
				$this->stmt->bind_param("i",$dbId);
				if($this->stmt->execute())
				{
					echo true;
				}
			}
			catch (Exception $ex)
			{ 
				die($ex->getMessage()); 
			}
			$this->stmt = null;
		}

		public function selectAllow($sql)
		{
			try
		    {
				$this->stmt= $this->mysqli->prepare($sql);
				$this->stmt->execute();
				$result = $this->stmt->get_result();
				$rows=$result->num_rows;				
				if($rows > 0)
				{
					$result = $result->fetch_all(MYSQLI_ASSOC);
					echo json_encode($result);
				}
				else
				{
					echo 404;
				}
		    }
		    catch (Exception $ex)
		    { 
		    	die($ex->getMessage()); 
		    }
		    $this->stmt = null;
		}

	}

?>