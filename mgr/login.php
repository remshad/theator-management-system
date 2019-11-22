
<?php require_once('dbs.php');  ?>
<html>
<head>
    <style type="text/css">
    .login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
#bt1:hover,#bt1:active,#bt1:focus {
  background: linear-gradient(to top, #a3bded 0%, #6991c7 100%);
}
body {
  margin: 40px auto;
  background-image: linear-gradient(to top, #a3bded 0%, #6991c7 100%);     
}
        
    </style>
</head>


<?php



if (isset($_POST['submit']) && $_POST['submit'] = 'submit') {

        if (!preg_match('/[^A-Za-z0-9 ]+/', $_POST['uname'])) {
                $uname = $_POST['uname'];
                $password = md5($_POST['password']);

                $sql = "select * from user where u_name='{$uname}' and 	u_password='{$password}'  and u_type='1'";
                $result = mysqli_query($link, $sql);
                if (mysqli_error($link)) {
                        die(mysqli_error($link));
                } else {

                        if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                if ($row['u_type'] == 1) {
                                        header('Location:index.php');
                                        setcookie("t_user", "{$row['u_name']}", time() + (86400 * 30), "/");
                                        setcookie("t_pass", "{$row['u_password']}", time() + (86400 * 30), "/");
                                        setcookie("t_power", "1", time() + (86400 * 30), "/");
                                        setcookie("t_id", "{$row['u_id']}", time() + (86400 * 30), "/");
                                        setcookie("t_status", "{$row['u_status']}", time() + (86400 * 30), "/");
                                      //  echo "<script>window.location.href='profile.php'</script>";   

                                } else {
                                        $error[] = "unknown error";
                                }
                        } else {
                                $error[] = 'Username or password is wrong';
                        }
                }
        } else {
                $error[] = "User name only expect alphanumeritics";
        }
}

//require_once('head.php');
//require_once('menu.php');


?>
<div class="login-page">
        <div class="form">


                <div class="section-line" style="padding-left:10%">

                        <?php

                        if (isset($error) && count($error) > 0) {
                                echo "<div>";
                                foreach ($error as $err) {
                                        echo '<div class="alert alert-warning alert-dismissible fade show">
        <strong>Warning!</strong> ' . $err . '
        <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                }
                                echo "</div>";
                        }
                        ?>
                        <div class="section-head">
                                <h2 class="section-title text-uppercase">Login</h2>
                        </div>


                        <div class="section-description">
                                <table>

                                        <form action='login.php' method='post' id='frm'>

                                                <tr>
                                                        <td>User Name:</td>
                                                        <td><input type='text' name='uname'></td>
                                                </tr>
                                                <tr>
                                                        <td>Password:</td>
                                                        <td><input type='password' name='password'></td>
                                                </tr>
                                                <!-- <tr><td>Login as:</td><td><select name='loginAs' ><option value='0'>User</option><option value='1'>Manager</option><option value='2'>Admin</option></select></td></tr>  -->
                                                <tr>
                                                        <td colspan='2'><input id="bt1" type='submit' name='submit' value='submit'></td>
                                                </tr>
                                        </form>




                                </table>
                        </div>
                </div>

        </div>
</div>
</html>