<body style="background: black; color: white">
<div style="text-align: center; margin-top: 50px">
    <h1>To do list</h1>
    <div style="margin-top: 30px; font-size: 20px;">
        <?php if (isset($_SESSION['userId'])) { ?>
            <a style="color: white" href="/">Home</a>
        <?php } ?>
        <?php if (empty($_SESSION['userId'])) { ?>
            <?php if (!isset($onLoginPage)) { ?>
                <a style="margin-left: 50px; color: white" href='/login'>Login</a>
            <?php } ?>
            <?php if (!isset($onRegisterPage)) { ?>
                <a style="margin-left: 50px; color: white" href='/registration'>Registration</a>
            <?php }
        } ?>
        <?php if (isset($_SESSION['userId'])) { ?>
            <a style="margin-left: 50px; color: white" href='/logout'>Logout</a>
        <?php } ?>
    </div>
    <div style="margin-top: 30px">________________________________________________________________________________</div>
</div>


</body>
