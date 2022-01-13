<?= $headerTemplate; ?>
<div style="text-align: center; margin-top: 50px">
    <form method="post" action="">
        <label>Email:</label>
        <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <div style="color: red"><?= isset($errors['email']) ? $errors['email'] : ''; ?> </div>
        <br>
        <br>
        <label>Password:</label>
        <input type="password" name="password">
        <div style="color: red"><?= isset($errors['password']) ? $errors['password'] : ''; ?> </div>
        <br>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</div>
