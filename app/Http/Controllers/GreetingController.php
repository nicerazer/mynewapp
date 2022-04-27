<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingController extends Controller
{
    public function hello() {
        return view('homepage.welcome-to-my-page', [
            'food' => [
                'pizza' => ['pepperoni', 'CHICKENSAURUS']
            ],
            'drinks' => 'jus tembikai',
        ]);
    }
}
