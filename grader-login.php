<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login Form</title>
</head>
<body style="background-color:#ADFF2F">
   <marquee><h2>Multi-Tenant, Cloud Scale, Multi-AZ SaaS App in Amazon Web Service</h2></marquee>
    <h2>Grader Login</h2>
      <form method="post" action="validate_login.php" >
        <table border="1" >
            <tr>
                <td><label for="users_name">Username</label></td>
                <td><input type="text" 

                  name="users_name" id="users_name"></td>
            </tr>
            <tr>
                <td><label for="users_pass">Password</label></td>
                <td><input name="users_pass" 

                  type="password" id="users_pass"></input></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"/>
                <td><input type="reset" value="Reset"/>
            </tr>
        </table>
    </form>
</body>
</html>
