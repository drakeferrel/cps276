<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init(){
  global $elementsArr, $stickyForm;

  if(isset($_POST['login'])){
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);

    if($postArr['masterStatus']['status'] == "noerrors"){
      return attemptLogin($_POST, $postArr);

    }
    else{
      /* IF THERE WAS A PROBLEM WITH THE FORM VALIDATION THEN THE MODIFIED ARRAY ($postArr) WILL BE SENT AS THE SECOND PARAMETER.  THIS MODIFIED ARRAY IS THE SAME AS THE ELEMENTS ARRAY BUT ERROR MESSAGES AND VALUES HAVE BEEN ADDED TO DISPLAY ERRORS AND MAKE IT STICKY */
      return getForm("",$postArr);
    }
    
  }

  /* THIS CREATES THE FORM BASED ON THE ORIGINAL ARRAY THIS IS CALLED WHEN THE PAGE FIRST LOADS BEFORE A FORM HAS BEEN SUBMITTED */
  else {
      return getForm("", $elementsArr);
    } 
}

/* THIS IS THE DATA OF THE FORM.  IT IS A MULTI-DIMENTIONAL ASSOCIATIVE ARRAY THAT IS USED TO CONTAIN FORM DATA AND ERROR MESSAGES.   EACH SUB ARRAY IS NAMED BASED UPON WHAT FORM FIELD IT IS ATTACHED TO. FOR EXAMPLE, "NAME" GOES TO THE TEXT FIELDS WITH THE NAME ATTRIBUTE THAT HAS THE VALUE OF "NAME". NOTICE THE TYPE IS "TEXT" FOR TEXT FIELD.  DEPENDING ON WHAT HAPPENS THIS ASSOCIATE ARRAY IS UPDATED.*/
$elementsArr = [
  "masterStatus"=>[
    "status"=>"noerrors",
    "type"=>"masterStatus"
  ],
  "email"=>[
	  "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be written as a proper email</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"sshaper@test.com",
		"regex"=>"email"
	],
	"password"=>[
	  "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Password cannot be blank and must be written as a proper password</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"password",
		"regex"=>"password"
	]
];


/*THIS FUNCTION CAN BE CALLED TO ADD DATA TO THE DATABASE */
function attemptLogin($post, $postArr){
	require_once 'classes/PdoMethods.php';
  
	$pdo = new PdoMethods();
	$sql = "SELECT email_address, password, name, status FROM admins WHERE email_address = :email_address";
	$bindings = array(
		array(':email_address', $_POST['email'], 'str')
	);

	$records = $pdo->selectBinded($sql, $bindings);

	/** IF THERE WAS AN RETURN ERROR STRING */
	if($records == 'error'){
		return getForm("There was an error logging in",$postArr);
	}
	
	/** */
	else{
		if(count($records) != 0){
			if($_POST['password'] == $records[0]['password']){
				session_start();
				$_SESSION['access'] = "accessGranted";
				$_SESSION['name'] = $records[0]['name'];
				$_SESSION['status'] = $records[0]['status'];
				return "success";
			}
			else {
				return getForm("There was a problem logging in with those credentials", $postArr);
			}
		}
		else {
			return getForm("There was a problem logging in with those credentials",$postArr);
		}
	}
}
   

/*THIS IS THEGET FROM FUCTION WHICH WILL BUILD THE FORM BASED UPON UPON THE (UNMODIFIED OF MODIFIED) ELEMENTS ARRAY. */
function getForm($acknowledgement, $elementsArr){
/* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
$form = <<<HTML
				<form method="post" action="index.php?page=login">
					<div class="row">
						<div class="col-12">
							<div class="row">
								<label for="email">Email{$elementsArr['email']['errorOutput']}</label>
								<input type="email" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}"> 
							</div>
						</div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-12">
							<div class="row">
								<label for="password">Password{$elementsArr['password']['errorOutput']}</label>
								<input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
							</div>
						</div>
					</div>
					
					<br>
					
					<button type="submit" class="btn btn-primary" name="login">Login</button>
			  </form>
HTML;

/* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
return [$acknowledgement, $form, "<h1>Login</h1>"];

}

?>