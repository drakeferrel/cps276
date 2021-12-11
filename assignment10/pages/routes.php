<?php

$nav = "";

session_start();
if(isset($_SESSION['access'])) {
	if($_SESSION['access'] !== "accessGranted"){
		$_GET['page'] = "login";
	} else {
		$nav=<<<HTML
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php?page=addContact" class="nav-link">Add Contacts</a></li>
            <li class="nav-item"><a href="index.php?page=deleteContacts" class="nav-link">Delete Contact(s)</a></li>
HTML;

		if($_SESSION['status'] === 'admin') {
				$nav.=<<<HTML
					<li class="nav-item"><a href="index.php?page=addAdmin" class="nav-link">Add Admin</a></li>
					<li class="nav-item"><a href="index.php?page=deleteAdmins" class="nav-link">Delete Admin(s)</a></li>
HTML;
		}

		$nav.=<<<HTML
			<li class="nav-item"><a href="index.php?page=logout" class="nav-link">Logout</a></li>
        </ul>
    </nav>
HTML;
	}
} else $_GET['page'] = "login";

$path = "index.php?page=welcome";

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();

    }
	
	else if($_GET['page'] === "addAdmin"){
		if($_SESSION['status'] === 'admin') {
			require_once('pages/addAdmin.php');
			$result = init();
		} else {
			/*
			require_once('pages/login.php');
			$result = init();
			*/
			
			session_start();

			/* DELETES THE COOKIE BY SETTING BACK ONE HOUR */
			setcookie("PHPSESSID", "", time() - 3600, "/");

			/* DELETE THE SESSION VALUES*/
			session_destroy();

			/* REDIRECT TO THE INDEX.PHP PAGE*/ 
			header('Location: index.php');
		}
    }
	
	else if($_GET['page'] === "deleteAdmins"){
		if($_SESSION['status'] === 'admin') {
			require_once('pages/deleteAdmins.php');
			$result = init();
		} else {
			/*
			require_once('pages/login.php');
			$result = init();
			*/
			
			session_start();

			/* DELETES THE COOKIE BY SETTING BACK ONE HOUR */
			setcookie("PHPSESSID", "", time() - 3600, "/");

			/* DELETE THE SESSION VALUES*/
			session_destroy();

			/* REDIRECT TO THE INDEX.PHP PAGE*/ 
			header('Location: index.php');
		}
    }
	
	else if($_GET['page'] === "login"){
		require_once('pages/login.php');
		$result = init();
		if($result == "success") {
			header('Location: index.php?page=welcome');
		}
	}
	
	else if($_GET['page'] === "logout"){
		session_start();

		/* DELETES THE COOKIE BY SETTING BACK ONE HOUR */
		setcookie("PHPSESSID", "", time() - 3600, "/");

		/* DELETE THE SESSION VALUES*/
		session_destroy();

		/* REDIRECT TO THE INDEX.PHP PAGE*/ 
		header('Location: index.php');
	}

    else {
        //header('Location: http://russet.php?page=form');
        header('location: '.$path);
    }
}

else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: '.$path);
}



?>