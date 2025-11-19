<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Mark as read when viewed
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact message deleted successfully!');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Message marked as read.');
    }

    public function markAsUnread(Contact $contact)
    {
        $contact->update(['is_read' => false]);
        return back()->with('success', 'Message marked as unread.');
    }

    public function downloadAttachment(Contact $contact)
    {
        if (!$contact->attachment) {
            return back()->with('error', 'No attachment found for this message.');
        }

        $filePath = storage_path('app/public/' . $contact->attachment);

        if (!file_exists($filePath)) {
            return back()->with('error', 'Attachment file not found.');
        }

        return response()->download($filePath);
    }
}

