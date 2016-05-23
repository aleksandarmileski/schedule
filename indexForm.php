<div class="login-page customlfp">
    <div class="form">
        <form action="" method="post" class="register-form">
            <input type="text" placeholder="Enter Username" name="form-username" id="form-username" required />
            <input type="password" placeholder="Password" name="form-password" id="form-password" required />
            <input type="password" placeholder="Repeat Password" name="form-password1" id="form-password1" required />
            <button name="formSignup">create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form action="" method="post" class="login-form" >
            <input type="text" placeholder="Username" name="form-username" id="form-username" required />
            <input type="password" placeholder="Password" name="form-password" name="form-password" required />
            <button name="formLogin">login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
        <?php if (isset($_SESSION['errMessage'])): ?>
            <p class="errorce"><?php echo $_SESSION['errMessage']; $_SESSION['errMessage']=""; ?></p>
        <?php endif ?>
    </div>
</div>