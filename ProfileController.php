<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('lecturer.profile', [
            'lecturer' => auth()->user(),
        ]);
    }
}
