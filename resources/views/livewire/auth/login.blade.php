<div class="card col-lg-4 mx-auto">
    <div class="card-body px-5 py-5">
        <h3 class="card-title text-left mb-4">Login</h3>
        <x-form
            action="login"
            x-init="init"
            :validation="$liveValidationRules"
        >
            <div class="form-group">
                <x-input
                    type="email"
                    name="email"
                    label="Email"
                    labelClass=""
                    base-class="form-control p_input"
                    :rules="$liveValidationRules['email']"
                />
            </div>
            <div class="form-group">
                <x-input
                    type="password"
                    name="password"
                    label="Password"
                    labelClass=""
                    base-class="form-control p_input"
                    :rules="$liveValidationRules['password']"
                />
            </div>
            <div class="text-center mt-4">
                <x-submit_button
                    class="btn btn-primary btn-block enter-btn col-5 transition duration-200"
                    text="Register"
                />
            </div>
            <p class="sign-up text-center">Don't have an account ?<a href="{{  route('register') }}"> Register</a></p>
        </x-form>
    </div>
</div>
