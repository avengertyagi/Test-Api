<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event\UserCreate;
class UsersAuth extends Controller
{
    public function index()
    {
        event(new UserCreate("Email has been send on your gmail address"));
    }
}
