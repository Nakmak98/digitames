{% extends 'base.html' %}

{% block content %}
<div class="login h-100">
    <div class="container text-white">
        <br>

        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 rt-col">
                <form method="POST" action="/login/">
                    <h3 class="text-center">Sign in</h3>
                    <div class="alert alert-error">{{error}}</div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">Email</p></label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   required>
                            <input type="hidden" name="type" value="basic">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputPassword4">Password</p></label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                   name="password" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="save_data" value="YES">Remember me
                        </label>
                    </div>
                    <br>
                    <div class="g-recaptcha" data-sitekey="your_site_key" data-theme="dark"></div>
                    <br><br>
                    <input type="submit" class="btn btn-primary " value="Login" id="reg_btn" name="login">
                    <br><br>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <p>Don't have an account? Create now!</p>
                <a href="account/registration.php" method="post">
                    <button class="btn btn-primary" id="sup">Create account</button>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="#" method="post" class="text-white" style="align: right">
                    Forgot your password?
                </a>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
{% endblock %}