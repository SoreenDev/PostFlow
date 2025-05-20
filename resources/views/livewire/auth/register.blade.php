<div class="card col-lg-4 mx-auto">
    <div class="card-body px-5 py-5">
        <h3 class="card-title text-left mb-3">Register</h3>
        <form  wire:submit="register">
            <div class="form-group">
                <x-input
                    type="text"
                    name="user_name"
                    label="User Name"
                    labelClass=""
                    base-class="form-control p_input"
                />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <x-input
                        type="email"
                        name="email"
                        label="Email"
                        labelClass=""
                        base-class="form-control p_input"
                    />
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <x-input
                        type="password"
                        name="password"
                        label="Password"
                        labelClass=""
                        base-class="form-control p_input"
                    />
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <x-input
                        type="password"
                        name="password_confirmation"
                        label="Password Confirmation"
                        labelClass=""
                        base-class="form-control p_input"
                    />
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block enter-btn col-5">Login</button>
            </div>
            <p class="sign-up text-center">Already have an Account?<a href="#"> Sign Up</a></p>
        </form>
    </div>
</div>
