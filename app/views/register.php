<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if (!empty($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="POST" action="/register">
        <input name="name" placeholder="Name" required><br>
        <input name="email" type="email" placeholder="Email" required><br>
        <input name="password" type="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <a href="/login">Already have an account? Login</a>
</body>
</html>

