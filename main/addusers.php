<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - PMS Equity</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="main/dist/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="main/dist/js/init-alpine.js"></script>
    <link rel="stylesheet" href="main/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="main/plugins/jquery-ui/jquery-ui.css">

    <link rel="stylesheet" href="main/dist/css/bvalidator.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        * {
            padding: 0;
            margin: 0;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8) url(main/images/loader.gif) no-repeat center center;
            z-index: 10000;
        }

        .container-dabba {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #eee;
        }

        .container-dabba .card {
            height: 500px;
            width: 800px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            border-radius: 20px;
        }

        .container-dabba .card .form {
            width: 100%;
            height: 100%;

            display: flex;
        }

        .container-dabba .card .left-side {
            width: 35%;
            background-color: #00AAAA;
            height: 100%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 20px 30px;
            box-sizing: border-box;

        }

        /*left-side-start*/
        .left-heading {
            color: #fff;

        }

        .steps-content {
            margin-top: 30px;
            color: #fff;
        }

        .steps-content p {
            font-size: 12px;
            margin-top: 15px;
        }

        .progress-bar {
            list-style: none;
            /*color:#fff;*/
            margin-top: 30px;
            font-size: 13px;
            font-weight: 700;
            counter-reset: container-dabba 0;
        }

        .progress-bar li {
            position: relative;
            margin-left: 40px;
            margin-top: 50px;
            counter-increment: container-dabba 1;
            color: #065b5b;
        }

        .progress-bar li::before {
            content: counter(container-dabba);
            line-height: 25px;
            text-align: center;
            position: absolute;
            height: 25px;
            width: 25px;
            border: 1px solid #048e8e;
            border-radius: 50%;
            left: -40px;
            top: -5px;
            z-index: 10;
            background-color: #00AAAA;


        }


        .progress-bar li::after {
            content: '';
            position: absolute;
            height: 90px;
            width: 2px;
            background-color: #048e8e;
            z-index: 1;
            left: -27px;
            top: -70px;
        }


        .progress-bar li.active::after {
            background-color: #fff;

        }

        .progress-bar li:first-child:after {
            display: none;
        }

        /*.progress-bar li:last-child:after{*/
        /*  display:none;  */
        /*}*/
        .progress-bar li.active::before {
            color: #fff;
            border: 1px solid #fff;
        }

        .progress-bar li.active {
            color: #fff;
        }

        .d-none {
            display: none;
        }

        /*left-side-end*/
        .container-dabba .card .right-side {
            width: 65%;
            background-color: #fff;
            height: 100%;
            border-radius: 20px;
        }

        /*right-side-start*/
        .main {
            display: none;
        }

        .active {
            display: block;
        }

        .main {
            padding: 40px;
        }

        .main small {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2px;
            height: 30px;
            width: 30px;
            background-color: #ccc;
            border-radius: 50%;
            color: yellow;
            font-size: 19px;
        }

        .text {
            margin-top: 20px;
        }

        .congrats {
            text-align: center;
        }

        .text p {
            margin-top: 10px;
            font-size: 13px;
            font-weight: 700;
            color: #cbced4;
        }

        .input-text {
            margin: 30px 0;
            display: flex;
            gap: 20px;
        }

        .input-text .input-div {
            width: 100%;
            position: relative;

        }



        input[type="text"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #057c7c;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        input[type="number"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #057c7c;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        input[type="email"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #057c7c;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        input[type="date"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #057c7c;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        select {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 5px;
            border: 1px solid #057c7c;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }

        .input-text .input-div span {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 13px;
            transition: all 0.5s;
        }

        .input-div input:focus~span,
        .input-div input:valid~span {
            top: -20px;
            left: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .input-div span {
            top: -15px;
            left: 6px;
            font-size: 10px;
        }

        .buttons button {
            height: 40px;
            width: 100px;
            border: none;
            border-radius: 5px;
            background-color: #057c7c;
            font-size: 12px;
            color: #fff;
            cursor: pointer;
        }

        .button_space {
            display: flex;
            gap: 20px;

        }

        .button_space button:nth-child(1) {
            background-color: #fff;
            color: #057c7c;
            border: 1px solid #057c7c;
        }

        .user_card {
            margin-top: 20px;
            margin-bottom: 40px;
            height: 200px;
            width: 100%;
            border: 1px solid #c7d3d9;
            border-radius: 10px;
            display: flex;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
        }

        .user_card span {
            height: 80px;
            width: 100%;
            background-color: #dfeeff;
        }

        .circle {
            position: absolute;
            top: 40px;
            left: 60px;
        }

        .circle span {
            height: 70px;
            width: 70px;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #fff;
            border-radius: 50%;
        }

        .circle span img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .social {
            display: flex;
            position: absolute;
            top: 100px;
            right: 10px;
        }

        .social span {
            height: 30px;
            width: 30px;
            border-radius: 7px;
            background-color: #fff;
            border: 1px solid #cbd6dc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            color: #cbd6dc;

        }

        .social span i {
            cursor: pointer;
        }

        .heart {
            color: red !important;
        }

        .share {
            color: red !important;
        }

        .user_name {
            position: absolute;
            top: 110px;
            margin: 10px;
            padding: 0 30px;
            display: flex;
            flex-direction: column;
            width: 100%;

        }

        .user_name h3 {
            color: #4c5b68;
        }

        .detail {
            /*margin-top:10px;*/
            display: flex;
            justify-content: space-between;
            margin-right: 50px;
        }

        .detail p {
            font-size: 12px;
            font-weight: 700;

        }

        .detail p a {
            text-decoration: none;
            color: blue;
        }






        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }










        .warning {
            border: 1px solid red !important;
        }


        /*right-side-end*/
        @media (max-width:750px) {
            .container-dabba {
                height: scroll;


            }

            .container-dabba .card {
                max-width: 350px;
                height: auto !important;
                margin: 30px 0;
            }

            .container-dabba .card .right-side {
                width: 100%;

            }

            .input-text {
                display: block;
            }

            .input-text .input-div {
                margin-top: 20px;

            }

            .container-dabba .card .left-side {

                display: none;
            }

            .container-dabba .card {

                border-radius: 10px !important;
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container-dabba">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">
                        <h3><b>WELCOME TO PMS EQUITY</b></h3>
                    </div>
                    <div class="steps-content">
                        <h3>Step <span class="step-number">1</span></h3>
                        <p class="step-number-content active">Enter your personal information to create your account.</p>
                        <p class="step-number-content d-none">Enter required documents details and press next.</p>
                        <p class="step-number-content d-none">Enter your bank details and press next.</p>
                        <p class="step-number-content d-none">Enter employee ID & password and click on submit. </p>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">Personal Information</li>
                        <li>Required Documents</li>
                        <li>Bank Details</li>
                        <li>Password</li>
                    </ul>



                </div>
                <div class="right-side">
                    <div class="main active">
                        <div><img width="170px" src="main/images/logo/PMS Equity logo with black text svg.svg" alt=""></div>
                        <div class="text">
                            <h2>Your Personal Information</h2>
                            <p>Enter your personal information and click on next step</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require id="username">
                                <span>Full Name</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="email" id="email" required require>
                                <span>Email ID</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="mobileno" required require>
                                <span>Mobile Number</span>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    <div class="main">
                        <div><img width="170px" src="main/images/logo/PMS Equity logo with black text svg.svg" alt=""></div>
                        <div class="text">
                            <h2>Required Documents Details</h2>
                            <p>Please enter your documents details for next step .</p>
                        </div>


                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="address" required require>
                                <span>Address</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="number" id="adharno" required require>
                                <span>Aadhar Number</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="panno" required require>
                                <span>PAN Number</span>
                            </div>

                            <div class="input-div">
                                <input type="date" id="dob" required require>
                                <span>Date Of Birth</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    <div class="main">
                        <div><img width="170px" src="main/images/logo/PMS Equity logo with black text svg.svg" alt=""></div>
                        <div class="text">
                            <h2>Bank Details</h2>
                            <p>Please enter your bank details & press next</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="bankname" required require>
                                <span>Bank Name</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="number" id="accountno" required require>
                                <span>Account Number</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="ifsc" required require>
                                <span>IFSC</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>



                    <div class="main">
                        <div><img width="170px" src="main/images/logo/PMS Equity logo with black text svg.svg" alt=""></div>
                        <div class="text">
                            <h2>Employee ID & Password</h2>
                            <p>Please enter employee ID(if available) & password.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="employeeref">
                                <span>Employee ID (if available)</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="password" required require>
                                <span>Password</span>
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="comfirmpass" required require>
                                <span>Confirm Password</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button" id="otp_button">Submit</button>
                        </div>
                    </div>
                    <div class="main">
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" id="otp" required require>
                                <span>Enter OTP (Sent on your Email)</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="submit_button">Submit now</button>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    <script src="main/plugins/jquery/jquery.min.js"></script>
    <script src="main/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="main/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="main/dist/js/adminlte.min.js"></script>
    <script src="main/dist/js/customfunction.js?ver=<?php echo time(); ?>"></script>
    <script src="main/dist/js/jquery.bvalidator-yc.js"></script>
    <script src="main/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        var next_click = document.querySelectorAll(".next_button");
        var main_form = document.querySelectorAll(".main");
        var step_list = document.querySelectorAll(".progress-bar li");
        var num = document.querySelector(".step-number");
        let formnumber = 0;

        next_click.forEach(function(next_click_form) {
            next_click_form.addEventListener('click', function() {
                if (!validateform()) {
                    return false
                }
                formnumber++;
                updateform();
                progress_forward();
                contentchange();
            });
        });

        var back_click = document.querySelectorAll(".back_button");
        back_click.forEach(function(back_click_form) {
            back_click_form.addEventListener('click', function() {
                formnumber--;
                updateform();
                progress_backward();
                contentchange();
            });
        });

        var username = document.querySelector("#username");

        var otpclick = document.querySelectorAll("#otp_button");
        otpclick.forEach(function(otpclick_form) {

            otpclick_form.addEventListener('click', function() {
                var email = $("#email").val()
                var username = $("#username").val()
                if ($("#password").val() === '' || $("#password").val() !== $("#comfirmpass").val()) {
                    return false
                }
                formnumber++;
                addoverlay()
                $.post("main/otpforregister.php", {
                        email: email,
                        username: username
                    },

                    function(data) {
                        if (data === "Success") {
                            removeoverlay()
                        }
                    },
                );

            });
        });

        var submit_click = document.querySelectorAll(".submit_button");
        submit_click.forEach(function(submit_click_form) {

            submit_click_form.addEventListener('click', function() {
                console.log(validateform(), 'validateform')
                if (!validateform()) {
                    return false
                }
                formnumber++;
                addoverlay()
                $.post("main/insertuser.php", {
                        username: $('#username').val(),
                        email: $('#email').val(),
                        mobileno: $('#mobileno').val(),
                        address: $('#address').val(),
                        dob: $('#dob').val(),
                        adharno: $('#adharno').val(),
                        panno: $('#panno').val(),
                        bankname: $('#bankname').val(),
                        accountno: $('#accountno').val(),
                        ifsc: $('#ifsc').val(),
                        employeeref: $('#employeeref').val(),
                        password: $('#password').val(),
                        policyread: $('#policyread').val(),
                        otp: $('#otp').val(),
                    },
                    function(response) {
                        if (response === 'Success') {
                            removeoverlay()
                            alertify.alert('result', 'Registration successfull! Please wait for approval', function() {
                                window.location.href = 'login'
                            })
                        } else if (response === 'Failed') {
                            removeoverlay()
                            alertify.alert('result', 'Sorry! OTP does not match', function() {
                                // window.location.href = 'login'
                            })
                        } else {
                            removeoverlay()
                            alertify.alert('result', 'Sorry! Something went wrong', function() {
                                // window.location.href = 'login'
                            })
                        }
                    },
                );
                // updateform();
            });
        });

        var heart = document.querySelector(".fa-heart");
        heart.addEventListener('click', function() {
            heart.classList.toggle('heart');
        });


        var share = document.querySelector(".fa-share-alt");
        share.addEventListener('click', function() {
            share.classList.toggle('share');
        });



        function updateform() {
            main_form.forEach(function(mainform_number) {
                mainform_number.classList.remove('active');
            })
            main_form[formnumber].classList.add('active');
        }

        function progress_forward() {
            // step_list.forEach(list => {

            //     list.classList.remove('active');

            // }); 


            num.innerHTML = formnumber + 1;
            step_list[formnumber].classList.add('active');
        }

        function progress_backward() {
            var form_num = formnumber + 1;
            step_list[form_num].classList.remove('active');
            num.innerHTML = form_num;
        }

        var step_num_content = document.querySelectorAll(".step-number-content");

        function contentchange() {
            step_num_content.forEach(function(content) {
                content.classList.remove('active');
                content.classList.add('d-none');
            });
            step_num_content[formnumber].classList.add('active');
        }


        function validateform() {
            validate = true;
            var validate_inputs = document.querySelectorAll(".main.active input");
            validate_inputs.forEach(function(vaildate_input, index) {
                vaildate_input.classList.remove('warning');
                if (vaildate_input.hasAttribute('require')) {
                    if (vaildate_input.value.length == 0) {
                        validate = false;
                        vaildate_input.classList.add('warning');
                    }
                }
                if (vaildate_input.id === 'email' && !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(vaildate_input.value)) {
                    validate = false
                    vaildate_input.classList.add('warning');
                }
                let password = $("#password").val()
                if (vaildate_input.id === 'password' && vaildate_input.value === '') {
                    validate = false
                    vaildate_input.classList.add('warning');
                }
                if (vaildate_input.id === 'comfirmpass' && vaildate_input.value !== password) {
                    validate = false
                    vaildate_input.classList.add('warning');
                }
                // console.log(vaildate_input.value)
            });
            return validate;

        }
    </script>
</body>

</html>