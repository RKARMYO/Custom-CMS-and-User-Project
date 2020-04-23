<?php
	include_once("model/Model.php");

	class Controller
	{
		public $model;
		
		public function __construct()  
	    {  
	        $this->model = new Model();

	    } 
		public function invoke()
		{
			// if(!isset($_POST['operation']) && !isset($_GET['operation']))
			// {
			// 	include 'view/home.php';
			// }
			if(isset($_POST['operation']))
			{
				switch ($_POST['operation'])
				{
					case 'showProfile':
						$data=$this->model->profile($_POST['dbId']);
					break;

					case 'update':
						$dbId=$_POST['updateId'];$rank=$_POST['rank'];
						$username=$_POST['username'];$usernamefake=$_POST['usernamefake'];
						$phone=$_POST['phone'];$email=$_POST['email'];
						$password=$_POST['password'];$address=$_POST['address'];
						$cate=$_POST['categories'];
						$imgOrg=$_FILES['profile']['name'];
						$imgTemp=$_FILES["profile"]["tmp_name"];
						$data=$this->model->update($dbId,$rank,$username,$usernamefake,$phone,$email,$password,$address,$imgOrg,$imgTemp,$cate);
					break;

					case 'adminUpdate':
						$data=$this->model->adminUpdate($_POST['dbId'],$_POST['userRole']);
					break;

					
					default:
						include 'view/404.php';
					break;
				}
			}
			if(isset($_GET['operation']))
			{
				switch ($_GET['operation'])
				{
					case 'home':
						$data=$this->model->select("SELECT * FROM namecard WHERE userRole=1 LIMIT 10");
						include 'view/home.php';
					break;
					
					case 'search':
						$result=$this->model->search($_GET['searchVal']);
					break;

					case 'admin':
						$data=$this->model->select("SELECT * FROM namecard WHERE userRole=0 ORDER BY dbID DESC");
						include 'view/admin.php';
					break;

					case 'adminDelete':
						$result=$this->model->delete($_GET['dbId']);
					break;

					case 'allowedData':
						$data=$this->model->selectAllow("SELECT * FROM namecard WHERE userRole=1 ORDER BY dbID DESC");
					break;
					
					default:
						include 'view/404.php';
					break;
				}
			}
		}
	}

?>