<?php

namespace Modules\Guest\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function __invoke(): View
    {
        return view('guest::home');
    }
}
