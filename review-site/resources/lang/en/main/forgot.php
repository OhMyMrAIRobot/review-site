<?php
return [
    'page' => 'Forgot password',
    'title' => 'Password recovery',
    'emailLabel' => 'Your email',
    'send' => 'Send',
    'haveAcc' => "Already have an account? <a href=" . route('auth.index') . " class='font-medium text-indigo-600 hover:underline'>Login here</a>",
    'noAcc' => "Dont have an account? <a href=" . route('register.index') . " class='font-medium text-indigo-600 hover:underline'>Register here</a>"
];
