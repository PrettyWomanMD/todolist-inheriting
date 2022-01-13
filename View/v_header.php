<body style="background: black; color: white">
<div style="text-align: center; margin-top: 50px">
    <h1>To do list</h1>
    <div style="margin-top: 30px; font-size: 20px;">
        <?php if (isset($_SESSION['email'])) { ?>
            <a style="color: white" href="/">Home</a>
        <?php } ?>
        <?php if (empty($_SESSION['email'])) { ?>
            <a style="margin-left: 50px; color: white" href='/login'>Login</a>
            <a style="margin-left: 50px; color: white" href='/registration'>Registration</a>
        <?php } ?>
        <?php if (isset($_SESSION['email'])) { ?>
            <a style="margin-left: 50px; color: white" href='/logout'>Logout</a>
        <?php } ?>
    </div>
    <div style="margin-top: 30px">________________________________________________________________________________</div>
</div>


</body>
