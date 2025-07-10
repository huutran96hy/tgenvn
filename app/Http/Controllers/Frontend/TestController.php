<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteMail;

class TestController extends Controller
{
    public function testMail()
    {
        try {
            // Sample form data for testing
            $testFormData = [
                'name' => '홍길동',
                'company' => '테스트 회사',
                'email' => 'test@example.com',
                'contact_email' => 'customer@example.com',
                'phone' => '010-1234-5678',
                'fax' => '02-1234-5678',
                'subject' => '테스트 견적 요청',
                'message' => '<p><strong>테스트 견적 요청입니다.</strong></p><p>다음 제품에 대한 견적을 요청드립니다:</p><ul><li>정밀 측정구 - 스트레이트 엣지</li><li>수량: 10개</li><li>납기: 2주</li></ul><p>추가 문의사항이 있으시면 연락 부탁드립니다.</p>',
                'response_method' => 'both',
                'category' => '정밀 측정구',
                'address' => '서울시 강남구 테스트로 123',
                'homepage' => 'https://test-company.com',
                'tags' => '견적요청, 정밀측정구, 긴급',
                'visibility' => 'public',
                'allow_comments' => true,
                'allow_web' => true,
                'attachments' => [],
                'submitted_at' => now(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent()
            ];

            // Test different email types
            $results = [];
            $testEmails = [
                'admin' => 'admin@test.com',
                'customer' => 'customer@test.com',
                'cc' => 'cc@test.com'
            ];

            foreach ($testEmails as $type => $email) {
                try {
                    Mail::to($email)->send(new QuoteMail($testFormData, $type));
                    $results[$type] = "✅ {$type} email sent successfully to {$email}";
                } catch (\Exception $e) {
                    $results[$type] = "❌ {$type} email failed: " . $e->getMessage();
                }
            }

            // Get mail configuration
            $mailConfig = [
                'driver' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'encryption' => config('mail.mailers.smtp.encryption'),
                'username' => config('mail.mailers.smtp.username'),
                'from_address' => config('mail.from.address'),
                'from_name' => config('mail.from.name'),
            ];

            return view('test-mail-results', [
                'results' => $results,
                'mailConfig' => $mailConfig,
                'testFormData' => $testFormData,
                'success' => true
            ]);

        } catch (\Exception $e) {
            return view('test-mail-results', [
                'results' => ['error' => '❌ Mail system error: ' . $e->getMessage()],
                'mailConfig' => [],
                'testFormData' => [],
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function testMailConfig()
    {
        $config = [
            'mail_driver' => config('mail.default'),
            'mail_host' => config('mail.mailers.smtp.host'),
            'mail_port' => config('mail.mailers.smtp.port'),
            'mail_username' => config('mail.mailers.smtp.username'),
            'mail_password' => config('mail.mailers.smtp.password') ? '***설정됨***' : '설정되지 않음',
            'mail_encryption' => config('mail.mailers.smtp.encryption'),
            'mail_from_address' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
            'admin_email' => config('mail.admin_email'),
            'cc_emails' => config('mail.quote_cc_emails'),
        ];

        return response()->json([
            'status' => 'success',
            'message' => 'Mail configuration retrieved',
            'config' => $config,
            'env_check' => [
                'MAIL_MAILER' => env('MAIL_MAILER'),
                'MAIL_HOST' => env('MAIL_HOST'),
                'MAIL_PORT' => env('MAIL_PORT'),
                'MAIL_USERNAME' => env('MAIL_USERNAME') ? '설정됨' : '설정되지 않음',
                'MAIL_PASSWORD' => env('MAIL_PASSWORD') ? '설정됨' : '설정되지 않음',
                'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
                'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
                'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
            ]
        ]);
    }

    public function sendTestEmail(Request $request)
    {
        $email = $request->input('email', 'test@example.com');
        $type = $request->input('type', 'admin');

        try {
            $testData = [
                'name' => '테스트 사용자',
                'company' => '테스트 회사',
                'contact_email' => $email,
                'subject' => '메일 테스트',
                'message' => '<p>이것은 메일 시스템 테스트입니다.</p>',
                'phone' => '010-1234-5678',
                'response_method' => 'email',
                'submitted_at' => now(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'attachments' => []
            ];

            Mail::to($email)->send(new QuoteMail($testData, $type));

            return response()->json([
                'status' => 'success',
                'message' => "테스트 메일이 {$email}로 전송되었습니다.",
                'email' => $email,
                'type' => $type,
                'sent_at' => now()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => '메일 전송 실패: ' . $e->getMessage(),
                'email' => $email,
                'type' => $type,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
