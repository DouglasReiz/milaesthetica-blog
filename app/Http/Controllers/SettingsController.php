<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
{
    $setting = Setting::first();
    return view('blog.home', compact('setting'));
}
}
