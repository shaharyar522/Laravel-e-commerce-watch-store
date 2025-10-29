<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Signature Collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('css/userauth/registration.css') }}">

</head>
<body>
    <div class="auth-container">

        <div class="auth-header">

            <div class="logo">
            </div>
            <h1 class="auth-title">Create Account</h1>

        </div>

        <div class="auth-body">

            <form action="{{ route('user.register.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your full name"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" name="password" placeholder="Create a password"
                            required>
                        <button type="button" class="toggle-password" id="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" name="confirm-password"
                            placeholder="Confirm your password" required>
                        <button type="button" class="toggle-password" id="toggle-confirm-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn">Create Account</button>
                <div class="form-footer">
                    <p>Already have an account? <a href="{{ route('user.login') }}">Sign In</a></p>
                </div>

            </form>

        </div>
    </div>


</body>
</html>
