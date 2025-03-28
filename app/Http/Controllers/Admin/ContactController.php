<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Hiển thị danh sách liên hệ.
     */
    public function index(Request $request)
    {
        $contacts = Contact::query();

        if ($request->has('search')) {
            $contacts->where('full_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $contacts = $contacts->paginate(10);

        return view('Admin.pages.contacts.index', compact('contacts'));
    }

    /**
     * Xóa liên hệ.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Đã xóa liên hệ.');
    }
}
