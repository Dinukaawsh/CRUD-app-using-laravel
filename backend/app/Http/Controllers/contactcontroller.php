<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Get all contacts
    public function contact() {
        $contacts = Contact::all();  
        return response()->json([
            'contacts' => $contacts,
            'message' => 'successful',
            'code' => 200
        ]);
    }

    // Save a new contact
    public function savecontact(Request $request) {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_number = $request->contact_number;
        $contact->save();

        return response()->json([
            'message' => 'Contact saved successfully',
            'code' => 200
        ]);
    }

    // Update an existing contact
    public function updatecontact(Request $request, $id) {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->name = $request->name ?? $contact->name;
            $contact->email = $request->email ?? $contact->email;
            $contact->designation = $request->designation ?? $contact->designation;
            $contact->contact_number = $request->contact_number ?? $contact->contact_number;
            $contact->save();

            return response()->json([
                'message' => 'Contact updated successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Contact with id ' . $id . ' does not exist.',
                'code' => 404
            ]);
        }
    }

    // Delete a contact
    public function deletecontact($id) {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json([
                'message' => 'Contact with id ' . $id . ' has been deleted successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Contact with id ' . $id . ' does not exist.',
                'code' => 404
            ]);
        }
    }
    public function getcontacts($id) {
    $contact = Contact::find($id);

    if ($contact) {
        return response()->json($contact); // Return the contact as a JSON response
    } else {
        return response()->json([
            'message' => 'Contact not found'
        ], 404); // Return an error if the contact is not found
    }
}

    
    
}
