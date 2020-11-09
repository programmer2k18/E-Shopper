<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::to('frontend/sign/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::to('frontend/sign/css/style.css')}}">
    <style>
        #inputState{
            width: 100%;
            color: #1d2124;
            padding: 12px;
            border: none;
            border-bottom: 0.7px solid #1a1a1a;
            cursor: pointer;
            opacity: 0.7;
        }
    </style>
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{route('register')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name"><i style="margin-left: 5px;" class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i style="margin-left: 5px;" class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i style="margin-left: 5px;" class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"  required autocomplete="new-password"/>
                        </div>

                        <div class="form-group">
                            <label for="re-pass"><i style="margin-left: 5px;" class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password"placeholder="Repeat your password"/>
                        </div>

                        <div class="form-group">
                            <label><i style="margin-left: 5px;" class="zmdi zmdi-alarm-add"></i></label>
                            <input type="text" name="address" placeholder="Your Full Address"/>
                        </div>

                        <div class="form-group">
                            <label><i style="margin-left: 5px;" class="zmdi zmdi-alarm-add"></i></label>
                            <input type="text" name="age" placeholder="Your Age"/>
                        </div>

                        <div class="form-group">
                            <label><i style="
                            margin-left: 5px;" class="zmdi zmdi-alarm-add"></i></label>
                            <input type="text" name="phone" placeholder="Your phone number"/>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <select id="inputState" class="form-control" name="gender">
                                    <option selected>Choose Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        {{--<div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>--}}
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('frontend/sign/images/signup-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{route('login')}}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{asset('frontend/sign/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/sign/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>