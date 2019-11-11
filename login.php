<?php
require_once('head.php');
require_once('menu.php');

?>
     <section class="section-long">
        <div class="container">


<div class="section-line">
<div class="section-head">
                            <h2 class="section-title text-uppercase">Login</h2>
                        </div>


<div class="section-description">
<table>

<form action='login.php' mecthod='post' id='frm' >

<tr><td>Login Name:</td><td><input type='text' name='uname'></td></tr>
<tr><td>Password:</td><td><input type='password' name='password'></td></tr>
<tr><td>Login as:</td><td><select name='loginAs' ><option value='0'>User</option><option value='1'>Manager</option><option value='2'>Admin</option></select></td></tr>
<tr><td colspan='2'><input type='submit' name='submit' value='submit'></td></tr>
</form>




</table>
</div>
        </div>

    </div>
    </section>


