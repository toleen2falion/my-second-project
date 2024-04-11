
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Healthy Food
    </title>
    <link rel="stylesheet" href="/assets_login/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href=" /assets_login/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php
        // <!-- <h2 class="logo">logo Chef</h2> -->
        ?>
        <nav class="navigition">
        
        </nav>
    </header>
    <div class="wrapper">
        <div  class="form-box login">
            <h2>login Chef</h2>
            <form method="POST" action="{{ route('chef.login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-box">
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        <span class="icon">
            <ion-icon name="mail"></ion-icon></span>
          
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"  placeholder="Enter email address" />
        
        </div>

        <!-- Password -->
        <div class="input-box">
        <span class="icon">
            <ion-icon name="lock-closed"></ion-icon></span>
            

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Enter password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Remember Me -->
        <div class="remember-forget">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn  btn-primary"> LOGIN</button>
        </div>
    </form>
    </div>
</div>
</div>




    <script src="/assets_login/js/bootstrap.bundle.min.js"></script>
    <script src="/assets_login/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>




<?php 
//////////////////// 
?>



















