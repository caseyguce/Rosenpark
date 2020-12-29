<?php
  if (isset($_SESSION["username"]) && !empty($_SESSION["username"]))
  {
    header("location:index.php");
  }
?>
<div class='register login'>
  <form action='login_process.php' method='post'>
  <h1>Login</h1>
  <div class='forms'>
    <table>
      <tbody>
        <tr>
          <td>Username:</td>
        </tr>
        <tr>
          <td><input type='text' name='username' required='required' /></td>
        </tr>
        <tr>
          <td>Password:</td>
        </tr>
        <tr>
          <td><input type='password' name='password' required='required' /></td>
        </tr>
        <tr>
          <td><input type='submit' class='button' value='Login' /></td>
        </tr>
        <tr>
          <td><a href='index.php?page=register'>Don't have an account? Register.</a></td>
        </tr>
      </tbody>
    </table>
  </div>
  </form>
</div>
