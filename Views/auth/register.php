<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Registered</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div class="main">
    <h1>Serving Dhaka</h1>
    <div class="container">
        <div class="sign-up-content">
            <form id="registerForm"  class="signup-form" action="<?=url('auth/register_store')?>" method="POST">
                <div class="login-logo">
                    <a href="<?=url('home/home')?>"><img src="../Images/logo.png" alt="Serving Dahak"></a>
                </div>
                <h2 class="form-title">What type of user are you ?</h2>
                <div class="form-radio">
                    <input type="radio" name="role" value="admin" id="admin">
                    <label for="admin">Admin</label>

                    <input type="radio" name="role" value="manager" id="manager" >
                    <label for="manager">Manager</label>

                    <input type="radio" name="role" value="worker" id="worker" checked>
                    <label for="worker">Worker</label>
                </div>

                <div class="form-textbox">
                    <label for="name">Full name</label>
                    <input type="text" name="name" id="name" >
                </div>

                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-textbox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" >
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="<?=url('home/privacy')?>" class="term-service">Terms of service</a></label>
                </div>

                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit">
                </div>
            </form>
            <p class="loginhere">
                Already have an account ?<a href="<?=url('auth/login')?>" class="loginhere-link"> Log in</a>
            </p>
        </div>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script>
    $(function (){
        $('#registerForm').submit(function (e){
            e.preventDefault();
            const form=$(this);
            $.ajax({
                url:form.attr('action'),
                method:'POST',
                data:form.serialize(),
                success(res){
                    Swal.fire({
                        timer: 5000,
                        icon:'success',
                        timerProgressBar: true,
                        showConfirmButton: false,
                        text:'Registration successfully'
                    }).then(()=>{
                        location.href="<?=url('auth/login')?>";

                    })
                },
                error(e){
                    Swal.fire({
                        timer: 5000,
                        icon:'error',
                        timerProgressBar: true,
                        showConfirmButton: false,
                        text:'Duplicate Email',
                    }).then(()=>{
                        location.reload()
                    })
                }
            })
        })
    })
</script>
</html>