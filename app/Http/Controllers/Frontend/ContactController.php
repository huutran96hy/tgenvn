<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Lấy danh sách liên hệ.
     */
    public function index()
    {
        return view('Frontendpages.contact');
    }

    /**
     * Lưu liên hệ mới.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm.');
    }


    /**
     * Hiển thị chi tiết liên hệ.
     */
    public function show(Contact $contact)
    {
        return response()->json([
            'success' => true,
            'message' => 'Contact retrieved successfully',
            'data' => new ContactResource($contact),
        ]);
    }

    /**
     * Xóa liên hệ.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully',
            'data' => null,
        ]);
    }
}
