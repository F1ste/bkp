<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::get();
        return view('pages.contacts')->with('contact', $contact);
    }
    
    public function edit($id)
    {
        $contact =  Contact::where('id', $id)->get();

        if(count($contact) > 0) {

            $contact = $contact[0];
            

            return view('pages.admin.contact.edit', [ 
                'contact'    => $contact,
                'id'       => $id,
                
            ]);
        } else {
            return redirect(route('pages.admin.contact.create'));
        }
    }
    public function update(ContactRequest $request)
    {
        $request->validated();
    
        $contact = Contact::where('id', $request->id)->update([
            'description'   => $request->description,
            
        ]);
        
        return response()->json($contact, 201);
    }

    public function contact(){
        $contact=Contact::all();
        return view('pages.admin.contact.index')->with('contact', $contact);
    }
}
