<?php
require("support.php");

$topPart = <<<EOBODY
<div id = cent>
<form action="{$_SERVER['PHP_SELF']}" method="post" class = "form-horizontal">
<h1>Log into Our System</h1>
<strong>Username: </strong>
<input type="text" name="name" class="form-control" required/></br></br>
<strong>Password: </strong>
<input type="password" name="password"  class="form-control" required/></br></br>

<input type="submit" name="submitInfoButton" class = "form-control" value = "Login"/></br>
</form>
</div>
EOBODY;

$bottomPart = "";

if (isset($_POST["submitInfoButton"])) {
		$login = trim($_POST["name"]);
		$password = trim($_POST["password"]);
		$db = connectToDB();
        $sqlQuery = sprintf("select password from users where email='%s'", $email);
        $result = mysqli_query($db,$sqlQuery);
if ($result) {
    if (mysqli_num_rows($result) == 0) {
        $bottomPart .= "<h2>Please Register</h2>";
        $bottomPart .="<a href=\"index.html\"><button>Return to main menu</button></a>";
    }
    else{
        $recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!password_verify($password, $recordArray['password'])) {
			$bottomPart .= "<strong><h1>Invalid login information provided.</strong><h1><br />";
		}
		else {
			session_start();
			$_SESSION['attempts'] = 0;
			header("location:edit.php");
		}
	}
}else{
    $bottomPart .= "<h2>Please Register</h2>";
    $bottomPart .="<a href=\"index.html\"><button>Return to main menu</button></a>";
}


}
$body = $topPart.$bottomPart;
$page = generatePage($body);
echo $page;
?>