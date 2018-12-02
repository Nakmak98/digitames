{% extends 'base.html' %}

{% block content %}
<div class="sign">
    <div class="container text-white">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <form method="POST" action="account/registration.php">
                    <h2 class="text-center">Sign up</h2>
                    <div class="alert alert-error">{{error}}</div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">Email*</p></label>
                            <input type="email" class="form-control" id="new_email" placeholder="Email" name="new_email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputPassword4">Password*</p></label>
                            <input type="password" class="form-control" id="new_password" placeholder="Password" name="new_password" required>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                         <div class="form-group col">
                             <label for="inputPassword4">Confirm Password*</p></label>
                             <input type="password" class="form-control" id="new_password" placeholder="Password" name="confirm_password" required>
                         </div>
                     </div>-->
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputAddress">Select your age*</label>
                            <select class="custom-select" id="age" name="age" required>
                                <option selected disabled value=''>Select your age</option>
                                <option value="3">3-6</option>
                                <option value="7">7-11</option>
                                <option value="12">12-15</option>
                                <option value="16">16-17</option>
                                <option value="18">18+</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputAddress">Select your region*</label>
                            <select class="custom-select" id="region" name="region" required>
                                <option selected disabled value=''>Select your region</option>
                                <option value="af">Africa</option>
                                <option value="as">Asia</option>
                                <option value="eu">Europe</option>
                                <option value="na">North America</option>
                                <option value="sa">South America</option>
                                <option value="au">Oceanic</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="your_site_key" data-theme="dark"></div>
                    <br><br>
                    <!--<button type="submit" class="btn btn-primary " id="reg_btn">Create account</button>-->
                    <input type="submit" class="btn btn-primary " value="Create account" id="reg_btn" name="register">
                    <br><br>
                </form> <!-- /form -->
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4 rt-col">
                <br><br>
                <p>Already have account?</p>
                <a href="login.php">
                    <button class="btn btn-primary">Login with your account</button>
                </a>
                <br><br>
                <p>Here is terms of user. We won't share your date.
                    We will only collecting it for our personal statistic and
                    so you will be enable to get some additional featured on our website.</p>
            </div>
        </div>
    </div>
</div>
{% endblock %}