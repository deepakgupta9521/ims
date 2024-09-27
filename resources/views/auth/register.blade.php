<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/log.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #FFD700;
            color: black;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #e6b800;
        }

        .login-link {
            margin-top: 15px;
            font-size: 0.9em;
        }

        .login-link a {
            text-decoration: none;
            color: #007bff;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .roles-container {
            text-align: left; /* Align text to the left for better readability */
        }

        .form-check {
            margin-bottom: 10px; /* Spacing between checkboxes */
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>{{ __('Sign Up') }}</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" placeholder="Enter your Name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Enter your email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Roles -->
            <div class="mb-3 roles-container">
                <label class="form-label">{{ __('Select Role') }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role[]" value="admin" id="roleAdmin">
                    <label class="form-check-label" for="roleAdmin">{{ __('Admin') }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role[]" value="user" id="roleUser">
                    <label class="form-check-label" for="roleUser">{{ __('User') }}</label>
                </div>
                <x-input-error :messages="$errors->get('roles')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a class="login-link" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                <x-primary-button class="btn-custom">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
