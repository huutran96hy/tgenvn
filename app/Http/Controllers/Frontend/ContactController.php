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
        $contacts = Contact::all();
        return response()->json([
            'success' => true,
            'message' => 'Contact list retrieved successfully',
            'data' => ContactResource::collection($contacts),
        ]);
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

        $contact = Contact::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Contact submitted successfully',
            'data' => new ContactResource($contact),
        ], 201);
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
