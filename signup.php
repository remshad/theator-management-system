<?php require_once('db.php');


if (isset($_POST['submit']) && $_POST['submit'] = 'submit') {

        if (isset($_POST['uname']) && !preg_match('/[^a-zA-Z0-9 ]+/', $_POST['uname'])) {

                if (isset($_POST['password1']) && strlen($_POST['password1']) > 5) {
                        if ($_POST['password1'] == $_POST['password2']) {

                                if (!preg_match('/[^0-9]+/', $_POST['phone']) && strlen($_POST['phone']) == 10) {

                                        if (!preg_match('/[^0-9]+/', $_POST['age']) && $_POST['age'] > 10) {
                                                if (!preg_match('/[^01]+/', $_POST['types'])) {

                                                        if (preg_match('/^([a-zA-Z][a-zA-Z0-9_]*)@[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/', $_POST['email'])) {

                                                                $sql = "SELECT * FROM `user` WHERE `u_e-mail`='{$_POST['email']}'";
                                                                $result = mysqli_query($link, $sql);
                                                                if (mysqli_num_rows($result) > 0) {
                                                                        $error[] = "This email already exist";
                                                                        $script = "frm.email.focus()";
                                                                } else {

                                                                        $sql = "SELECT * FROM `user` WHERE `u_name`='{$_POST['uname']}'";
                                                                        $result = mysqli_query($link, $sql);
                                                                        if (mysqli_num_rows($result) > 0) {
                                                                                $error[] = "This username already exist";
                                                                                $script = "frm.uname.focus()";
                                                                        } else {


                                                                                if ($_POST['types'] == 0) {
                                                                                        $type = 0;
                                                                                } else {
                                                                                        $type = 1;
                                                                                }
                                                                                $time = time();
                                                                                $password = md5($_POST['password1']);
                                                                                mysqli_query($link, "INSERT INTO `user`( `u_e-mail`, `u_name`, `u_age`, `u_phoneno`, `u_password`, `u_join_date`, `u_type`) 
                                                                       VALUES ('{$_POST['email']}','{$_POST['uname']}','{$_POST['age']}','{$_POST['phone']}','{$password}','{$time}','{$type}')");
                                                                                if (mysqli_error($link)) {
                                                                                        $error[] = "SQL error <br/>" . mysqli_error($link);
                                                                                } else {
                                                                                        $id=mysqli_insert_id($link);
                                                                                        $sucess[] = "User Registered <br/>Will be redirected to login page within 2 seconds";

                                                                                        setcookie("t_user", "{$_POST['uname']}", time() + (86400 * 30), "/");
                                                                                        setcookie("t_pass", "{$password}", time() + (86400 * 30), "/");
                                                                                        setcookie("t_id", "{$$id}", time() + (86400 * 30), "/");

                                                                                        if ($type == 0) {
                                                                                                setcookie("t_power", "0", time() + (86400 * 30), "/");
                                                                                                echo "<script>
                                                                                                setTimeout(function(){
                                                                                                  window.location.href ='./profile.php';
                                                                                                                }, 2000);


                                                                                                    </script>";
                                                                                        } else {

                                                                                                setcookie("t_power", "1", time() + (86400 * 30), "/");
                                                                                                echo "<script>
                                                                                                     setTimeout(function(){
                                                                                                   window.location.href ='./mgr/index.php';
                                                                                               }, 2000);
        
        
                                                                                                  </script>";
                                                                                        }
                                                                                }
                                                                        }
                                                                }
                                                        } else {
                                                                $error[] = "Invalid email ";
                                                                $script = "frm.email.focus()";
                                                        }
                                                } else {

                                                        $error[] = "Select a type";
                                                        $script = "frm.types.focus()";
                                                }
                                        } else {
                                                $error[] = "age should greater than 10 ";
                                                $script = "frm.age.focus()";
                                        }
                                } else {
                                        $error[] = "phone number 10 digit require";
                                        $script = "frm.phone.focus()";
                                }
                        } else {

                                $error[] = "Password missmatch";
                                $script = "frm.password2.focus()";
                        }
                } else {

                        $error[] = "Password string atleast 6 character";
                        $script = "frm.password1.focus()";
                }
        } else {
                $error[] = "Only alphabets or digilts or space expected";
                $script = "frm.uname.focus()";
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



                        if (isset($sucess) && count($sucess) > 0) {
                                echo "<div>";
                                foreach ($sucess as $succ) {
                                        echo '<div class="alert alert-info alert-dismissible fade show">
        <strong>Sucess!</strong> ' . $succ . '
        <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                }
                                echo "</div>";
                        }
                        ?>
                        <div class="section-head">
                                <h2 class="section-title text-uppercase">Signup</h2>
                        </div>


                        <div class="section-description">
                                <table class="table">

                                        <form action='signup.php' method='post' id='frm'>

                                                <tr>
                                                        <td>Login Name:</td>
                                                        <td><input type='text' name='uname' value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>"> </td>
                                                </tr>
                                                <tr>
                                                        <td>Password:</td>
                                                        <td><input type='password' name='password1' value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>"></td>
                                                </tr>
                                                <tr>
                                                        <td>Re enter Password:</td>
                                                        <td><input type='password' name='password2' value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>"></td>
                                                </tr>
                                                <tr>
                                                        <td>Email id</td>
                                                        <td><input type='email' name='email' value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></td>
                                                </tr>
                                                <tr>
                                                        <td>Phone Number</td>
                                                        <td><input type='number' name='phone' value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"></td>
                                                </tr>
                                                <tr>
                                                        <td>Age</td>
                                                        <td><input type='number' name='age' value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>"></td>
                                                </tr>
                                                <tr>
                                                        <td>Type</td>
                                                        <td>
                                                                <select name='types'>
                                                                        <option value='0'>User

                                                                        </option>
                                                                        <option value='1'>
                                                                                Theatre Manager
                                                                        </option>
                                                                </select>
                                                        </td>
                                                </tr>






                                                <!-- <tr><td>Login as:</td><td><select name='loginAs' ><option value='0'>User</option><option value='1'>Manager</option><option value='2'>Admin</option></select></td></tr>  -->
                                                <tr>
                                                        <td colspan='2'><input type='submit' name='submit' value='submit'  class='btn-theme btn'  ></td>
                                                </tr>
                                        </form>




                                </table>
                        </div>
                </div>

        </div>
</section>

<?php
if (isset($script)) echo "<script>{$script};</script>";

?>