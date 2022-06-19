<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $contactEmails = Contact::select(['email', 'id'])->get();

        return view('dashboard', compact('contactEmails'));
    }
}
