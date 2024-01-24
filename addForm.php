


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add form</title>
</head>
<body>
<form action="operations.php?id=<?php echo $employee['id']; ?>" method="POST">
                        <input type="text" name="newUsername" placeholder="New Username" required>
                        <input type="password" name="newPassword" placeholder="New Password" required>
                        <input type="submit" value="Update">
      </form>
</body>
</html>