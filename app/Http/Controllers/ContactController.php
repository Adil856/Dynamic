<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $user = Contact::all();
        return view('contacts-index', compact('user'));
    }

    public function create()
    {
        return view('contacts-create');
    }

    public function store(Request $request)
    {   
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
            $user = new Contact;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->save();

        // Save the contact to the database
        // Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $user = Contact::findOrFail($id);
        return view('contacts-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);

        // Update the contact in the database
        $user = Contact::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the contact from the database
        $user = Contact::findOrFail($id);
        $user->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     // Perform a search in the contacts table based on the query
    //     $users = Contact::where('name', 'like', "%$query%")
    //                         ->orWhere('email', 'like', "%$query%")
    //                         ->orWhere('phone', 'like', "%$query%")
    //                         ->get();

    //     return view('contacts.search', compact('contacts', 'query'));
    // }
}
