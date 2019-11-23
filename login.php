
<?php require_once('db.php');  ?>


<?php



if (isset($_POST['submit']) && $_POST['submit'] = 'submit') {

        if (!preg_match('/[^A-Za-z0-9 ]+/', $_POST['uname'])) {
                $uname = $_POST['uname'];
                $password = md5($_POST['password']);

                $sql = "select * from user where u_name='{$uname}' and 	u_password='{$password}'";
                $result = mysqli_query($link, $sql);
                if (mysqli_error($link)) {
                        die(mysqli_error($link));
                } else {

                        if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                setcookie("t_user", "{$row['u_name']}", time() + (86400 * 30), "/");
                                setcookie("t_pass", "{$row['u_password']}", time() + (86400 * 30), "/");
                                setcookie("t_id",  "{$row['u_id']}", time() + (86400 * 30), "/");
                                setcookie("t_power", "{$row['u_type']}", time() + (86400 * 30), "/");



                                if ($row['u_type'] == 0) {
                                        //header('Location:'profile.php');
                                        
                                        echo "<script>window.location.href='./profile.php'</script>";   

                                } else if ($row['u_type'] == 1) {
                                        setcookie("t_status", "{$row['u_status']}", time() + (86400 * 30), "/");
                                        
                                        echo "<script>window.location.href='./mgr/index.php'</script>";   
                                        
                                } else if ($row['u_type'] == 2) {

                                        echo "<script>window.location.href='./admin/index.php'</script>";   

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

require_once('head.php');
require_once('menu.php');


?>
<section class="section-long">
        <div class="container">


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
                                                        <td>Login Name:</td>
                                                        <td><input type='text' name='uname'></td>
                                                </tr>
                                                <tr>
                                                        <td>Password:</td>
                                                        <td><input type='password' name='password'></td>
                                                </tr>
                                                <!-- <tr><td>Login as:</td><td><select name='loginAs' ><option value='0'>User</option><option value='1'>Manager</option><option value='2'>Admin</option></select></td></tr>  -->
                                                <tr>
                                                        <td colspan='2'><br/></td>
                                                </tr>
                                                <tr>
                                                        <td colspan='2'><input type='submit' name='submit' value='submit'  class='btn-theme btn' ><a href='signup.php' style="padding-left:5px;"><buttoon type='button'  class='btn-theme btn' >Signup</button></a></td>
                                                </tr>
                                        </form>




                                </table>
                        </div>
                </div>

        </div>
</section>