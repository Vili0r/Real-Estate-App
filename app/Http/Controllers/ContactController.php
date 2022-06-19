<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->check() || !auth()->user()->is_admin){
            abort(403);
        }

        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        Contact::create($request->validated());

        return redirect()->route('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if(!auth()->check() || !auth()->user()->is_admin){
            abort(403);
        }

        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
