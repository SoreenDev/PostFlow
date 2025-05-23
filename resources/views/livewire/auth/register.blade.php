<div class="card col-lg-4 mx-auto">
    <div class="card-body px-5 py-5">
        <h3 class="card-title text-left mb-3">Register</h3>
        <x-form
            action="register"
            x-init="init"
            :validation="$front_validation"
        >
            <div class="form-group">
                <x-input
                    type="text"
                    name="user_name"
                    label="User Name"
                    labelClass=""
                    base-class="form-control p_input"
                    :rules="$front_validation['user_name']"
                />
            </div>
            <div class="form-group">
                <x-input
                    type="email"
                    name="email"
                    label="Email"
                    labelClass=""
                    base-class="form-control p_input"
                    :rules="$front_validation['email']"
                />
            </div>
            <div class="form-group">
                <x-input
                    type="password"
                    name="password"
                    label="Password"
                    labelClass=""
                    base-class="form-control p_input"
                    :rules="$front_validation['password']"
                />
            </div>
            <div class="form-group">
                <x-input
                    type="password"
                    name="password_confirmation"
                    label="Password Confirmation"
                    labelClass=""
                    base-class="form-control p_input"
                    :rules="$front_validation['password_confirmation']"
                />
            </div>
            <div class="text-center mt-4">
                <x-submit_button
                    class="btn btn-primary btn-block enter-btn col-5 transition duration-200"
                    text="Register"
                />
            </div>
            <p class="sign-up text-center">Already have an Account?<a href="#"> Sign Up</a></p>
        </x-form>
    </div>
</div>
