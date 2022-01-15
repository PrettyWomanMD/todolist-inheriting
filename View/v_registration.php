<?= $headerTemplate; ?>
<div style="text-align: center; margin-top: 50px">
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
        <div style="color: red"><?= isset($errors['name']) ? $errors['name'] : ''; ?> </div>
        <br>
        <br>
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
        <label>Repeat password:</label>
        <input type="password" name="repeatPassword">
        <div style="color: red"><?= isset($errors['repeatPassword']) ? $errors['repeatPassword'] : ''; ?> </div>
        <div style="color: red"><?= isset($errors['passwordoDontMatch']) ? $errors['passwordoDontMatch'] : ''; ?> </div>
        <br>
        <br>
        <button type="submit" name="register">Sign In</button>
    </form>
</div>
