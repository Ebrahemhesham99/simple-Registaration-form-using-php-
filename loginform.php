<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php 
  $department = "open Source"
  ?>
<form method="post" action="checkroute.php">
      <table class="user-table">
        <tr>
          <th colspan="2">Registration form</th>
        </tr>
        <tr>
          <td><label>first name</label></td>
          <td><input type="text" name="firstName"required /></td>
        </tr>
        <tr>
          <td><label>last name</label></td>
          <td><input type="text" name="lastName" /></td>
        </tr>
        <tr>
          <td><label for="address">Address</label></td>
          <td><textarea name="address"  style="overflow:auto;"required></textarea></td>
        </tr>
        <tr>
          <td><label for="country">Country</label></td>
          <td>
        <select name="country">
            <option value="Egypt">Egypt</option>
            <option value="canda">Canada</option>
            <option value="UK">United Kingdom</option>
            <option value="AUStralia">Australia</option>
            <option value="GERMANY">Germany</option>
            <option value="JaPaN">Japan</option>
        </select>
      </td>
    </tr>
        <tr>
          <td><label>Gender</label></td>
          <td>
            <input type="radio" name="gender" value="Male"/>male
          <input type="radio" name="gender" value="Female"/>female</td>
        </tr>
        <tr>
          <td><label>skills</label></td>
          <td>
            <input type="checkbox"name="skills[]" value="php"/>
            php
            <input type="checkbox" name="skills[]" value="js2E"/>
          js2E
            <br />
            <input type="checkbox" name="skills[]" value="mysql"/>
            mysql            
            <input type="checkbox"name="skills[]" value="postgresql"/>
            postgresql
          </td>
        </tr>
        <tr>
               <td> <label for="email">Email:</label></td>
              <td>  <input type="email" class="form-control" id="email" name="email" required></td>
        </tr>
        <tr>
          <td><label>User name</label></td>
          <td><input type="text"name="username"/></td>
        </tr>
        <tr>
          <td><label>password</label></td>
          <td><input type="password" name="password" /></td>
        </tr>
        <tr>
          <td><label>Department</label></td>
          <td><input readonly type="text" name="department" value="<?php echo $department;?>"></td>
        </tr>
        <tr>
          <td colspan="2"><label for="verification">sh68Sa</label></br>
       <span>Please insert the code into the below text </span>
       <input type="text" name="verification" id="verification">
      </td>
      </tr>
          <td colspan="8" style="text-align: center">
            <input type="submit" value="add" name="add" style="width: 20%" />
            <input type="reset" value="reset" style="width: 20%" />
          </td>
        </tr>
      </table>
    </form>
</body>
</html>