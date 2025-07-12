<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Mail\QuoteMail;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    public function index()
    {
        return view('Frontend.quote');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'email' => 'required|email|max:255',
            'homepage' => 'nullable|url|max:255',
            'subject' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone1' => 'nullable|string|max:3',
            'phone2' => 'nullable|string|max:4',
            'phone3' => 'nullable|string|max:4',
            'fax1' => 'nullable|string|max:3',
            'fax2' => 'nullable|string|max:4',
            'fax3' => 'nullable|string|max:4',
            'address' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'response_method' => 'required|in:phone,email,both',
            'message' => 'required|string',
            'tags' => 'nullable|string|max:500',
            'attachments.*' => 'nullable|file|max:2048|mimes:jpg,jpeg,png,pdf,doc,docx,txt,zip',
            'allow_comments' => 'nullable|boolean',
            'allow_web' => 'nullable|boolean',
            'visibility' => 'required|in:public,private'
        ], [
            'name.required' => '이름을 입력해주세요.',
            'password.required' => '비밀번호를 입력해주세요.',
            'password.min' => '비밀번호는 최소 6자 이상이어야 합니다.',
            'email.required' => '이메일을 입력해주세요.',
            'email.email' => '올바른 이메일 형식을 입력해주세요.',
            'subject.required' => '제목을 입력해주세요.',
            'contact_email.required' => '연락처 이메일을 입력해주세요.',
            'contact_email.email' => '올바른 연락처 이메일 형식을 입력해주세요.',
            'response_method.required' => '답변 방법을 선택해주세요.',
            'message.required' => '메시지 내용을 입력해주세요.',
            'attachments.*.max' => '첨부파일은 2MB 이하여야 합니다.',
            'attachments.*.mimes' => '허용되지 않는 파일 형식입니다.',
            'visibility.required' => '공개 설정을 선택해주세요.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', '입력 정보를 확인해주세요.');
        }

        try {
            // Process form data
            $formData = $request->all();

            // Combine phone numbers
            if ($request->phone1 && $request->phone2 && $request->phone3) {
                $formData['phone'] = $request->phone1 . '-' . $request->phone2 . '-' . $request->phone3;
            }

            // Combine fax numbers
            if ($request->fax1 && $request->fax2 && $request->fax3) {
                $formData['fax'] = $request->fax1 . '-' . $request->fax2 . '-' . $request->fax3;
            }

            // Handle file attachments
            $attachments = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    if ($file->isValid()) {
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs('quote-attachments', $filename, 'public');

                        $attachments[] = [
                            'original_name' => $file->getClientOriginalName(),
                            'filename' => $filename,
                            'path' => $path,
                            'size' => $file->getSize(),
                            'mime_type' => $file->getMimeType()
                        ];
                    }
                }
            }

            $formData['attachments'] = $attachments;
            $formData['submitted_at'] = now();
            $formData['ip_address'] = $request->ip();
            $formData['user_agent'] = $request->userAgent();

            // Save to database (optional - create quotes table if needed)
            // Quote::create($formData);

            // Send email notification
            $this->sendQuoteEmail($formData);

            return redirect()->route('quote')
                ->with('success', '견적 요청이 성공적으로 전송되었습니다. 빠른 시일 내에 답변드리겠습니다.')
                ->with('quote_id', 'Q' . date('Ymd') . rand(1000, 9999));
        } catch (\Exception $e) {
            // Log the error
            Log::error('Quote form submission error: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'exception' => $e
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', '견적 요청 전송 중 오류가 발생했습니다. 잠시 후 다시 시도해주세요.');
        }
    }

    private function sendQuoteEmail($formData)
    {
        // Send to admin
        $adminEmail = 'huutran96hy@gmail.com';
        Mail::to($adminEmail)->send(new QuoteMail($formData, 'admin'));
        $adEmail = 'tgenc@tg-enc.co.kr';
        Mail::to($adEmail)->send(new QuoteMail($formData, 'admin'));
        $adEmail2 = 'julul21@naver.com';
        Mail::to($adEmail2)->send(new QuoteMail($formData, 'admin'));
        // Send confirmation to customer
        Mail::to($formData['contact_email'])->send(new QuoteMail($formData, 'customer'));

        // Send copy to additional recipients if configured
        $ccEmails = config('mail.quote_cc_emails', []);
        if (!empty($ccEmails)) {
            foreach ($ccEmails as $email) {
                Mail::to($email)->send(new QuoteMail($formData, 'cc'));
            }
        }
    }

    public function preview(Request $request)
    {
        $content = $request->input('content', '');

        return response()->json([
            'success' => true,
            'preview_html' => $content,
            'word_count' => str_word_count(strip_tags($content)),
            'char_count' => strlen(strip_tags($content))
        ]);
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => '이미지 파일만 업로드 가능합니다. (최대 2MB)'
            ], 400);
        }

        try {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('quote-images', $filename, 'public');

            return response()->json([
                'success' => true,
                'url' => Storage::url($path),
                'filename' => $filename
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => '이미지 업로드 중 오류가 발생했습니다.'
            ], 500);
        }
    }
}
