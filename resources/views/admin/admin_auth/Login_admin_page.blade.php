<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Signature Collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('css/userauth/login.css') }}">
</head>
<body>

    <div class="auth-container">
        <div class="auth-header">

            <div class="logo">
            </div>

            <h1 class="auth-title">Admin Login</h1>

        </div>

        <div class="auth-body">

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="password-container">
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        <button type="button" class="toggle-password" id="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit"  class="btn">Sign In</button>
            </form>

        </div>
    </div>

</body>
</html>
