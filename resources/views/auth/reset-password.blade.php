
<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            @keyframes shine {
                0% {
                    background-position: -200px;
                }
                100% {
                    background-position: 200px;
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: linear-gradient(135deg, #000000, #434343, #000000);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
                margin: 0;
                font-family: 'Roboto', sans-serif;
                animation: fadeIn 1s ease-in-out;
            }

            .login-container {
                background: #1a1a1a;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
                width: 450px;
                text-align: left;
                color: #fff;
                position: relative;
                overflow: hidden;
                animation: fadeIn 1s ease-in-out;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .login-container:hover {
                transform: scale(1.05);
                box-shadow: 0 0 30px #ffcc00;
            }

            .login-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.1));
                border-radius: 15px;
                pointer-events: none;
                animation: shine 2s infinite linear;
            }

            .login-container h2 {
                text-align: center;
                margin-bottom: 30px;
                font-size: 24px;
                color: #ffcc00;
            }

            .input-group {
                margin-bottom: 25px;
                position: relative;
                animation: fadeIn 1s ease-in-out;
            }

            .input-group i {
                position: absolute;
                top: 12px;
                left: 12px;
                color: #aaa;
            }

            .input-group input {
                width:380px;
                padding: 12px 12px 12px 40px;
                border: none;
                border-bottom: 2px solid #555;
                background: transparent;
                color: #fff;
                font-size: 16px;
                transition: border-bottom 0.3s;
                border-radius: 5px;
            }

            .input-group input:focus {
                outline: none;
                border-bottom: 2px solid #ffcc00;

            }

            .options {
                display: flex;
                justify-content: space-between;
                font-size: 14px;
                color: #aaa;
                animation: fadeIn 1s ease-in-out;
            }

            .options a {
                color: #aaa;
                text-decoration: none;
                transition: color 0.3s;
            }

            .options a:hover {
                color: #fff;
            }

            .login-btn {
                background-color: #ffcc00;
                border: none;
                padding: 12px 20px;
                color: #000;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
                margin-top: 20px;
                width: 100%;
                transition: background-color 0.3s, transform 0.3s;
                animation: fadeIn 1s ease-in-out;
            }

            .login-btn:hover {
                background-color: #e6b800;
                transform: scale(1.05);
            }
            .a_link:hover{
                color: #e6b800;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2>Reset Passwrod</h2>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input style="width: 370px" id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input placeholder="Enter new password" style="width: 370px"  id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" >
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input placeholder="Confirm password" style="width: 370px"  id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit" class="login-btn">Reset Password</button>
            </form>
        </div>
    </body>
    </html>


