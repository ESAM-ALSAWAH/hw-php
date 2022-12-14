<?php 
    session_start();
    if(isset($_SESSION['user'])){
    if ($_SESSION['user'] == 'admin' ) {
            header("Location: ./admin/users.php", true, 301);
            exit();
    }
    else{
        header("Location: ./index.php", true, 301);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register </title>
    <?php include('head.php'); ?>
</head>

<body>


    <div class="mx-auto py-5" style="max-width: 400px;height: 100vh; ">
        <h1 class="text-center mb-4" style="color: #3b71ca;">Fatora</h1>
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content pb-5">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form >

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="signIn-email" class="form-control" />
                        <label class="form-label" for="loginName">Email or username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="signIn-password" class="form-control" />
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>
                    <!-- Submit button -->
                    <button type="button" id="signIn" class="btn btn-primary btn-block mb-4">Sign in</button>

                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form>


                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="firstName" class="form-control" />
                        <label class="form-label" for="registerName">First Name</label>
                        <div class="invalid-feedback">Please choose a username.</div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="lastName" class="form-control" />
                        <label class="form-label" for="registerName">Last Name</label>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="userName"" class="form-control" />
                        <label class="form-label" for="registerUsername">Username</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" class="form-control" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>
                    <!-- phone input -->
                    <div class="form-outline mb-4">
                        <input type="text" inputmode="tel" id="phone" class="form-control" />
                        <label class="form-label" for="registerEmail">Phone</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control" />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="repassword" class="form-control" />
                        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                    </div>

                    <select class="form-select mb-4" id="city" aria-label="Default select example">
                        <option selected>City</option>
                        <option value="damascus">Damascus</option>
                        <option value="aleppo">Aleppo</option>
                        <option value="latakia">Latakia</option>
                        <option value="hama">Hama</option>
                        <option value="homs">Homs</option>
                        <option value="tartus">Tartus</option>
                        <option value="suwayda">Suwayda</option>
                        <option value="quneitra">Quneitra</option>
                        <option value="der alzor">Der Alzor</option>
                        <option value="al-hasakah">Al-Hasakah</option>
                        <option value="Qamishli">Qamishli</option>
                        <option value="Al Raqa">Al Raqa</option>
                    </select>

                    <!-- Address input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="address" rows="4" style="resize: none;"></textarea>
                        <label class="form-label" for="textAreaExample">Address</label>
                    </div>
                    <select class="form-select mb-4" id="gender" aria-label="Default select example">
                        <option selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>

                    </select>
                    <input type="date" class="mb-4 " id="date"
                        style="width: 100%; border: 1px solid #bdbdbd; height: 35px; border-radius:.25rem; padding-inline:10px;">
                    <select class="form-select mb-4" id="occupation" aria-label="Default select example">
                        <option selected>Occupation</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Consulting">Consulting</option>
                        <option value="institution">Institution</option>
                        <option value="research and development">research and development</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Sales">Sales</option>
                        <option value="private job">private job</option>
                        <option value="Student">Student</option>
                        <option value="other">Other</option>

                    </select>
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div>
                    <!-- Submit button -->
                    <button type="button" id='register' class="btn btn-primary btn-block mb-3">Sign Up</button>
                </form>
            </div>
        </div>

    </div>
    <!-- Pills content -->


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>


    <script>
        $(document).ready(() => {
            $('#signIn').click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'actions/login.php',
                    data: {
                        email: $('#signIn-email').val(),
                        password: $('#signIn-password').val(),
                    },
                    success: (res) => {
                        const data = JSON.parse(res);
                        alertify.set('notifier', 'position', 'bottom-left')
                        alertify.success(data.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 500);


                    },
                    error: (err) => {
                        alertify.set('notifier', 'position', 'bottom-left')
                        alertify.error(err.responseText);
                    }
                })
            })
            $('#register').click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'actions/register.php',
                    data: {
                        firstName:$('#firstName').val(),
                        lastName:$('#lastName').val(),
                        userName:$('#userName').val(),
                        email:$('#email').val(),
                        password:$('#password').val(),
                        repassword:$('#repassword').val(),
                        phone:$('#phone').val(),
                        city:$('#city').val(),
                        address:$('#address').val(),
                        gender: $('#gender').val(),
                        date: $('#date').val(),
                        occupation: $('#occupation').val(),
                    },
                    success: (message) => {
                        
                        alertify.set('notifier', 'position', 'bottom-left')
                        alertify.success(message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 500);


                    },
                    error: (err) => {
                        alertify.set('notifier', 'position', 'bottom-left')
                        alertify.error(err.responseText);
                    }
                })
            })
        })

    </script>
</body>

</html>