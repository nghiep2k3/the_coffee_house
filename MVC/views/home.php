<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to Home Page</h1>
    <?php if (isset($_SESSION['user'])): ?>
    <p>Hello, <?php echo $_SESSION['user']['username']; ?>!</p>
    <a href="index.php?controller=user&action=logout">Logout</a>
    <?php else: ?>
    <a href="index.php?controller=user&action=login">Login</a>
    <?php endif; ?>

</body>

</html>