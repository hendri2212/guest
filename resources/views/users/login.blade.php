<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .card {
            border: 1px solid #ccc;
        }

        .form-control {
            background-color: #eee;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light mt-5">
                    <div class="card-body">
                        <h3 class="card-title">Login</h3>
                        <img src="https://source.unsplash.com/random" class="card-img-top mb-3" alt="Login background image" style="height: 250px;">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>

                                <input type="text" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @else is-valid @enderror">

                                @if ($errors->has('email'))
                                    <span class="error-message">{{ $errors->first('email', 'Please enter a valid email address.') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter your password" value="{{ old('password') }}" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input" id="remember-me" name="remember-me">
                                <label for="remember-me" class="form-check-label">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
