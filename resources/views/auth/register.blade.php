<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Validation</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
  <link rel="stylesheet" href="/MyProfile/style.css">

</head>

    <form method="POST" action="{{ route('register') }}" lang="ar" dir="rtl">
        @csrf
<h2>إنشاء حساب </h2>
        <!-- Name -->
        <div>
         <h3>   <x-input-label for="name" :value="__('الاسم')" /> </h3>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
         <h3><x-input-label for="email" :value="__('البريد الألكتروني')" /></h3>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
         <h3><x-input-label for="password" :value="__('كلمة المرور')" /></h3>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
           <h3> <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" /></h3>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
        <h3><a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __(' لدي حساب  ') }}
            </a></h3>

            <x-primary-button class="ml-4">
                {{ __('تسجيل') }}
            </x-primary-button>
        </div>
    </form>

<script  src="/MyProfile/script.js"></script>