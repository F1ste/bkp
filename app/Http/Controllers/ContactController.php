<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::get();
        return view('pages.contacts')->with('contact', $contact);
    }

    public function edit(Contact $contact)
    {
        return view('pages.admin.contact.edit', [
            'contact' => $contact,
            'id' => $contact->id,
        ]);
    }

    public function update(ContactRequest $request)
    {
        $request->validated();

        $contact = Contact::where('id', $request->id)->update([
            'description' => $request->description,
            'map' => $request->map
        ]);

        return response()->json($contact, 201);
    }

    public function contact()
    {
        $contact = Contact::all();
        return view('pages.admin.contact.index')->with('contact', $contact);
    }
}
