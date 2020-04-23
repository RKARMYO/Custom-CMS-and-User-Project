<?php
	include_once("../model/Model.php");

	class Controller
	{
		public $model;
		
		public function __construct()  
	    {  
	        $this->model = new Model();

	    } 
		public function userakm()
		{
			if(isset($_POST['operation']))
			{
				switch ($_POST['operation'])
				{
					case 'register':
						$return=$this->model->register($_POST['username'],$_POST['usernamefake'],$_POST['password'],$_POST['phone']);
					break;

					case 'login':
						$return=$this->model->login($_POST['username'],$_POST['password']);
					break;

					case 'loginAdmin':
						$return=$this->model->loginAdmin($_POST['username'],$_POST['password']);
					break;
					
					default:
						include 'view/404.php';
					break;
				}
			}
		}
	}

?>