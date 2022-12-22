<?php

	switch ($page) {
		
		case 'dashboard':
		
		break;
		
		case 'pages':

			if(isset($_POST['submitted']) == 1) {
						
				if (!empty($_POST['token'])) {
					if (hash_equals($_SESSION['token'], $_POST['token'])) {
						$config = HTMLPurifier_Config::createDefault();
						$purifier = new HTMLPurifier($config);
						$clean_html = $purifier->purify($_POST['body']);
		
						if(isset($_POST['id']) != '') {
							$action = 'updated';
							$stmt = pdo($dbc, "UPDATE posts SET user = :user, slug = :slug, title = :title, label = :label, header = :header, body = :body WHERE id = :id", [
								'user' => $_POST['user'],
								'slug' => $_POST['slug'],
								'title' => $_POST['title'],
								'label' => $_POST['label'],
								'header' => $_POST['header'],
								'body' => $clean_html,
								'id' => $_GET['id'],
							]);	
						} else {
							$action = 'added';	
							$stmt = pdo($dbc, "INSERT INTO posts (type, user, slug, title, label, header, body) VALUES (:type, :user, :slug, :title, :label, :header, :body)", [
								'type' => 1,
								'user' => $_POST['user'],
								'slug' => $_POST['slug'],
								'title' => $_POST['title'],
								'label' => $_POST['label'],
								'header' => $_POST['header'],
								'body' => $clean_html,
						
							]);							
						}
						if($stmt){
							$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
						} else {	
							$message = '<p class="alert alert-danger">Page could not be '.$action.'.';
						}
					} else {
						$message = '<p class="alert alert-danger">Error</p>';
					}
			} else {
				$message = '<p class="alert alert-danger">Error</p>';
			}
			}
			
			if(isset($_GET['id'])) { $opened = data_post($dbc, $_GET['id']); }
			
		break;
		
		case 'users':

			if(isset($_POST['submitted']) == 1) {
				if (!empty($_POST['token'])) {
					if (hash_equals($_SESSION['token'], $_POST['token'])) {
						if(isset($_POST['id']) != '') {
							$action = 'updated';
		
							if($_POST['password'] != '') {
								if($_POST['password'] == $_POST['passwordv']) {
									$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
									$stmt = pdo($dbc, "UPDATE users SET first = :first, last = :last, email = :email, password = :password, status = :status WHERE id = :id", [
										'first' => $_POST['first'],
										'last' => $_POST['last'],
										'email' => $_POST['email'],
										'password' => $password,
										'status' => $_POST['status'],
										'id' => $_GET['id']
									]);
								} else {
									$error = '<p class="alert alert-danger">Passwords do not match.</p>';
								} 					
							} else {
								$stmt = pdo($dbc, "UPDATE users SET first = :first, last = :last, email = :email, status = :status WHERE id = :id", [
									'first' => $_POST['first'],
									'last' => $_POST['last'],
									'email' => $_POST['email'],
									'status' => $_POST['status'],
									'id' => $_GET['id']
								]);
							} 
						} else {
							$action = 'added';
							if($_POST['password'] === $_POST['passwordv']) {
							$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
							$stmt = pdo($dbc, "INSERT INTO users (first, last, avatar, email, password, status) VALUES (:first, :last, :avatar, :email, :password, :status)", [
								'first' => $_POST['first'],
								'last' => $_POST['last'],
								'avatar' => '',
								'email' => $_POST['email'],
								'password' => $password,
								'status' => $_POST['status']
							]);
							} else {
								$message = '<p class="alert alert-danger">Passwords do not match!</p>';
							}
						} 
										
						if($stmt){
							$message = '<p class="alert alert-success">User was '.$action.'!</p>';
						} else {
							$message = '<p class="alert alert-danger">User could not be '.$action.'.';
							$message.= $error;
						}
					} else {
							$message = '<p class="alert alert-danger">Error</p>';
					}
			} else {
				$message = '<p class="alert alert-danger">Error</p>';
			}				
			}
			
			if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
			
		break;
			
		case 'navigation':
			
			if(isset($_POST['submitted']) == 1) {
						
				if (!empty($_POST['token'])) {
					if (hash_equals($_SESSION['token'], $_POST['token'])) {
						if(isset($_POST['id']) != '') {
					
							$action = 'updated';
							$stmt = pdo($dbc, "UPDATE navigation SET id = :id, label = :label, url = :url, position = :position, status = :status WHERE id = :openedid", [
								'id' => $_POST['id'],
								'label' => $_POST['label'],
								'url' => $_POST['url'],
								'position' => $_POST['position'],
								'status' => $_POST['status'],
								'openedid' => $_POST['openedid']
							]);					
						} 
						if($stmt){	
							$message = '<p class="alert alert-success">Navigation Item was '.$action.'!</p>';
						} else {
							$message = '<p class="alert alert-danger">Navigation Item could not be '.$action.'.';
						}
					} else {
						$message = '<p class="alert alert-danger">Error</p>';	 
					}
			} else {
				$message = '<p class="alert alert-danger">Error</p>';
			}
			}
	
		break;
		
		case 'settings':
		
			if(isset($_POST['submitted']) == 1) {				
					
				if (!empty($_POST['token'])) {
					if (hash_equals($_SESSION['token'], $_POST['token'])) {
						$action = 'updated';
						$stmt = pdo($dbc, "UPDATE settings SET label = :label, value = :value WHERE id = :openedid", [
							'label' => $_POST['label'],
							'value' => $_POST['value'],
							'openedid' => $_POST['openedid']
						]);
					
					if($stmt){	
						$message = '<p class="alert alert-success">Setting was '.$action.'!</p>';
					} else {
						$message = '<p class="alert alert-danger">Setting could not be '.$action.'.';
					}
					} else {
						$message = '<p class="alert alert-danger">Error</p>';	
					}
			} else {
				$message = '<p class="alert alert-danger">Error</p>';
			}
			}
		break;		
		default:
		break;
	}

?>