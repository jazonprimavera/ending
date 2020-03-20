<?php

echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "<meta charset=\"utf-8\">\n";
echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "<title>Primavera and Alunan</title>\n";
echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">\n";
echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">\n";
echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>\n";
echo "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script> \n";
echo "<style type=\"text/css\">\n";
echo "	.login-form {\n";
echo "		width: 340px;\n";
echo "    	margin: 30px auto;\n";
echo "		margin-top: 100px;\n";
echo "		\n";
echo "	}\n";
echo "    .login-form form {\n";
echo "    	margin-bottom: 15px;\n";
echo "        background: #f7f7f7;\n";
echo "        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);\n";
echo "        padding: 30px;\n";
echo "    }\n";
echo "    .login-form h2 {\n";
echo "        margin: 0 0 15px;\n";
echo "    }\n";
echo "    .login-form .hint-text {\n";
echo "		color: #777;\n";
echo "		padding-bottom: 15px;\n";
echo "		text-align: center;\n";
echo "		font-size: 15px;\n";
echo "    }\n";
echo "    .form-control, .btn {\n";
echo "        min-height: 38px;\n";
echo "        border-radius: 2px;\n";
echo "    }\n";
echo "    .login-btn {        \n";
echo "        font-size: 15px;\n";
echo "        font-weight: bold;\n";
echo "    }\n";
echo "    .or-seperator {\n";
echo "        margin: 20px 0 10px;\n";
echo "        text-align: center;\n";
echo "        border-top: 1px solid #ccc;\n";
echo "    }\n";
echo "    .or-seperator i {\n";
echo "        padding: 0 10px;\n";
echo "        background: #f7f7f7;\n";
echo "        position: relative;\n";
echo "        top: -11px;\n";
echo "        z-index: 1;\n";
echo "    }\n";
echo "    .social-btn .btn {\n";
echo "        margin: 10px 0;\n";
echo "        font-size: 15px;\n";
echo "        text-align: left; \n";
echo "        line-height: 24px;       \n";
echo "    }\n";
echo "	.social-btn .btn i {\n";
echo "		float: left;\n";
echo "		margin: 4px 15px  0 5px;\n";
echo "        min-width: 15px;\n";
echo "	}\n";
echo "	.input-group-addon .fa{\n";
echo "		font-size: 18px;\n";
echo "	}\n";
echo "</style>\n";
echo "</head>\n";
echo "<body>\n";
echo "\n";
echo "<div class=\"login-form\">\n";
echo "    <form action=\"/examples/actions/confirmation.php\" method=\"post\">\n";
echo "        <h2 class=\"text-center\">Sign in</h2>		\n";
echo "        <div class=\"text-center social-btn\">\n";
echo "            <a href=\"#\" class=\"btn btn-primary btn-block\"><i class=\"fa fa-facebook\"></i> Sign in with <b>Facebook</b></a>\n";
echo "			<a href=\"https://accounts.google.com/ServiceLogin/signinchooser?service=classroom&passive=1209600&continue=https%3A%2F%2Fclassroom.google.com%2F&followup=https%3A%2F%2Fclassroom.google.com%2F&emr=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class=\"btn btn-danger btn-block\"><i class=\"fa fa-google\"></i> Sign in with <b>Google</b></a>\n";
echo "      <div class=\"hint-text small\">Login with your social media account <a href=\"#\" class=\"text-success\"></a></div>\n";
echo "       \n";
echo "</div>\n";
echo "</body>\n";
echo "</html>      ";

?>