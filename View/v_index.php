<?= $headerTemplate; ?>
<div style="font-size: 50px; text-align: center; margin-top: 50px;">Hello!</div>
<div style="margin-left: 50px">
    <?php if (isset($_SESSION['email'])) {
        ?>
        <div>
            <div style="margin-bottom: 25px; font-size: 25px">Add new task</div>
            <form action="" method="post">
                <label>Title:</label>
                <input type="text" name="title" value="<?= isset($_POST['title']) ? $_POST['title'] : ''; ?>">
                <div style="color: red"><?= isset($errors['title']) ? $errors['title'] : ''; ?> </div>
                <br>
                <br>
                <label>Content</label>
                <textarea name="text"><?= isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
                <div style="color: red"><?= isset($errors['text']) ? $errors['text'] : ''; ?> </div>
                <br>
                <br>
                <input type="submit" name="addTask" value="Add task">
            </form>
        </div>
        <div>__________________________________________________________________________________________</div>
        <h2>All tasks</h2>
    <?php } ?>
    <div>
        <?php foreach ($allTasks as $task) { ?>
            <h4>Title: <?= $task['title'] ?></h4>
            <p>Content: <?= $task['text'] ?></p>
            <i>Author: <?= $task['author'] ?>, <?= $task['task_data'] ?>:</i>
            <form style="margin-top: 25px" action="/completedTask/<?= $task['id_task'] ?>" method="post">
                <input type="submit" name="completed" value="Completed">
            </form>
            <div style="margin-bottom: 50px">
                __________________________________________________________________________________________
            </div>
        <?php } ?>
    </div>
</div>