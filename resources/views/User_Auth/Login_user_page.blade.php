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
            <h1 class="auth-title">login</h1>

        </div>

        <div class="auth-body">
            <form action="{{ route('user.login.post') }}" method="POST">
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

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

                <button type="submit" class="btn">Sign In</button>

                <div class="divider">
                    <span>or continue with</span>
                </div>

                <div class="social-login">
                    <button type="button" class="social-btn google">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </button>
                </div>
                <div class="form-footer">
                    <p>Don't have an account? <a href="{{ route('user.register') }}">Create Account</a></p>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




@if(session('success'))
<script>
    Swal.fire({
        title: "Congratulations!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Continue to Login"
    });
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: "{{ session('error') }}",
    confirmButtonColor: '#d33',
    confirmButtonText: 'Go to Registration'
});
</script>
@endif



</body>
</html>
