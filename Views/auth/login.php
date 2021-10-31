<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div class="main">
    <h1>Serving Dhaka</h1>
    <div class="container">
        <div class="sign-up-content">
            <form name="login" class="signup-form" action="<?=url('auth/login_check')?>" onsubmit="return validateForm()" method="POST">
                <div class="login-logo">
                    <a href="<?=url('home/home')?>"><img src="../Images/logo.png" alt="Serving Dahak"></a>
                </div>
                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required/>
                </div>
                <div class="form-textbox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required/>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember" class="agree-term"/>
                    <label for="remember" class="label-agree-term"><span><span></span></span>Remember Me</label>
                </div>
                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit">
                </div>
            </form>
            <p class="loginhere">
                Don't you have an account ?<a href="<?=url('auth/register')?>" class="loginhere-link"> Get Registered</a>
            </p>
        </div>
    </div>
</div>
</html>