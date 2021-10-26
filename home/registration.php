<div class="col-md-4" >
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Registration</h5>
            <form class="needs-validation" novalidate id="registration-form">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Fullname</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationCustomUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationCustomUsername">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" id="register">Register</button>
            </form>
        </div>
    </div>
</div>
<script>
</script>
