<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <style>
        body {
            background-color: #09090B;
        }

        .card {
            background-color: #18181B;
        }

        .input-container {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1;
            color: white;
        }
    </style>


    <div style="margin-top: 80px;" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div style="padding: 15px;border-radius:10px" class="card">
                    <div style="color: white;font-size:20px;margin-top:30px;font-family:Arial, Helvetica, sans-serif"
                        class="card-title text-center"><b>{{ __('Laravel') }}</b></div>
                    <div style="color: white;font-size:25px;font-family:Arial, Helvetica, sans-serif"
                        class="card-title text-center"><b>{{ __('Sign up') }}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="role_id" id="role_id" value="4">

                            <div class="row">
                                <div  class="col-md-12">
                                    <label style="color: white" for="name"
                                        class=" col-form-label text-md-right"><small>{{ __('Name') }}</small></label>
                                    <input
                                        style="padding:23px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                        id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div style="margin-top: 13px;" class="col-md-12">
                                    <label style="color: white" for="email"
                                        class=" col-form-label text-md-right"><small>{{ __('E-Mail Address') }}</small></label>


                                    <input
                                        style="padding:23px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                        id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div style="margin-top: 13px;" class="col-md-12">
                               <div class="row">
                                <div class="col-md-6">
                                    <label style="color: white" for="password"
                                    class=" col-form-label text-md-right"><small>{{ __('Password') }}</small></label>
                                <div class="input-container">
                                    <input
                                        style="padding:23px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                        id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <span class="eye-icon" onclick="togglePassword('password')">
                                        <i id="password-icon" class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label style="color: white" for="password-confirm"
                                        class=" col-form-label text-md-right"><small>{{ __('Confirm Password') }}</small></label>
                                    <div class="input-container">
                                        <input
                                            style="padding:23px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                            id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <span class="eye-icon" onclick="togglePassword('password-confirm')">
                                            <i id="password-confirm-icon" class="fa fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                               </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div style="margin-top: 13px;" class="col-md-6">
                                            <label style="color: white" for="phone_number"
                                                class=" col-form-label text-md-right"><small>{{ __('Phone Number') }}</small></label>


                                            <input
                                                style="padding:23px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                                id="phone_number" type="number"
                                                class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                                value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div style="margin-top: 13px;" class="col-md-6">
                                            <label style="color: white" for="country_id"
                                                class=" col-form-label text-md-right"><small>{{ __('Country') }}</small></label>
                                            <select style="height:50px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                            id="country_id"
                                             class="form-control @error('country_id') is-invalid @enderror"  name="country_id"
                                            value="{{ old('country_id') }}" required autocomplete="country_id">
                                                <option value="">Select Country</option>
                                                @forelse ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @empty
                                                <option value="">No Country Found</option>
                                                @endforelse
                                            </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>





                                <div style="margin-top: 13px;" class="col-md-12">
                                    <label style="color: white" for="company_name"
                                        class=" col-form-label text-md-right"><small>{{ __('Company Name') }}</small></label>


                                    <input
                                        style="padding:23px;border: #99ff01 3px groove;background-color:#242427;color:white;border-radius:10px"
                                        id="company_name" type="text"
                                        class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                        value="{{ old('company_name') }}" required autocomplete="company_name">

                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div style="margin-top: 13px;" class="col-md-11">
                                    <a style="text-decoration: none;color:#99ff01" href="{{ url('client/login') }}">I have
                                        an Already Account</a>
                                </div>
                                <div style="margin-top: 13px;" class="col-md-12">
                                    <button style="background-color: #99ff01;color:#09090B" style="submit"
                                        class="btn btn-success w-100"><b>Sign up</b></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function togglePassword(id) {
        const passwordInput = document.getElementById(id);
        const passwordIcon = document.getElementById(id + '-icon');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.className = "fa fa-eye";
        } else {
            passwordInput.type = "password";
            passwordIcon.className = "fa fa-eye-slash";
        }
    }
</script>

</html>
