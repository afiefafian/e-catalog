<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();

        return view('admin.profile', $data);
    }
}
