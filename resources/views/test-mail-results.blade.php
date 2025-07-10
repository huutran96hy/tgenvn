<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메일 테스트 결과</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .success { color: #10b981; }
        .error { color: #ef4444; }
        .code-block {
            background: #1f2937;
            color: #f9fafb;
            padding: 1rem;
            border-radius: 0.5rem;
            font-family: 'Courier New', monospace;
            font-size: 0.875rem;
            overflow-x: auto;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">📧 메일 테스트 결과</h1>
                <p class="text-gray-600">Quote Form 메일 시스템 테스트 결과입니다.</p>
                <div class="mt-4 text-sm text-gray-500">
                    테스트 시간: {{ now()->format('Y-m-d H:i:s') }}
                </div>
            </div>

            <!-- Test Results -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">🎯 테스트 결과</h2>
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach($results as $type => $result)
                        <div class="p-4 border rounded-lg {{ strpos($result, '✅') !== false ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                            <h3 class="font-semibold text-gray-800 mb-2 capitalize">
                                @switch($type)
                                    @case('admin') 👨‍💼 관리자 메일 @break
                                    @case('customer') 👤 고객 메일 @break
                                    @case('cc') 👥 참조 메일 @break
                                    @default {{ $type }}
                                @endswitch
                            </h3>
                            <p class="{{ strpos($result, '✅') !== false ? 'success' : 'error' }}">
                                {{ $result }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Mail Configuration -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">⚙️ 메일 설정 정보</h2>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <strong>드라이버:</strong> {{ $mailConfig['driver'] ?? 'Not set' }}
                        </div>
                        <div>
                            <strong>호스트:</strong> {{ $mailConfig['host'] ?? 'Not set' }}
                        </div>
                        <div>
                            <strong>포트:</strong> {{ $mailConfig['port'] ?? 'Not set' }}
                        </div>
                        <div>
                            <strong>암호화:</strong> {{ $mailConfig['encryption'] ?? 'Not set' }}
                        </div>
                        <div>
                            <strong>사용자명:</strong> {{ $mailConfig['username'] ? '설정됨' : 'Not set' }}
                        </div>
                        <div>
                            <strong>발신자:</strong> {{ $mailConfig['from_address'] ?? 'Not set' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Test Data -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">📋 테스트 데이터</h2>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div><strong>이름:</strong> {{ $testFormData['name'] }}</div>
                        <div><strong>회사:</strong> {{ $testFormData['company'] }}</div>
                        <div><strong>이메일:</strong> {{ $testFormData['contact_email'] }}</div>
                        <div><strong>전화:</strong> {{ $testFormData['phone'] }}</div>
                        <div><strong>제목:</strong> {{ $testFormData['subject'] }}</div>
                        <div><strong>답변방법:</strong> {{ $testFormData['response_method'] }}</div>
                    </div>
                    <div class="mt-4">
                        <strong>메시지 내용:</strong>
                        <div class="mt-2 p-3 bg-white border rounded text-sm">
                            {!! $testFormData['message'] !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Environment Variables Guide -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">🔧 환경 변수 설정 가이드</h2>
                <p class="text-gray-600 mb-4">메일이 제대로 전송되지 않는다면 .env 파일에 다음 설정을 확인하세요:</p>
                <div class="code-block">
# 메일 기본 설정
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls

# 발신자 정보
MAIL_FROM_ADDRESS=noreply@company.com
MAIL_FROM_NAME="Company Name"

# 견적 메일 설정
MAIL_ADMIN_EMAIL=admin@company.com
MAIL_QUOTE_CC_EMAILS=manager@company.com,sales@company.com
                </div>
            </div>

            <!-- Troubleshooting -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">🔍 문제 해결</h2>
                <div class="space-y-4">
                    <div class="p-4 border-l-4 border-yellow-400 bg-yellow-50">
                        <h3 class="font-semibold text-yellow-800">Gmail 사용 시</h3>
                        <p class="text-yellow-700 text-sm mt-1">
                            2단계 인증을 활성화하고 앱 비밀번호를 생성해야 합니다.<br>
                            Google 계정 → 보안 → 2단계 인증 → 앱 비밀번호
                        </p>
                    </div>
                    
                    <div class="p-4 border-l-4 border-blue-400 bg-blue-50">
                        <h3 class="font-semibold text-blue-800">로컬 개발 환경</h3>
                        <p class="text-blue-700 text-sm mt-1">
                            Mailtrap, MailHog 등의 개발용 메일 서비스를 사용하거나<br>
                            MAIL_MAILER=log로 설정하여 로그 파일로 확인할 수 있습니다.
                        </p>
                    </div>
                    
                    <div class="p-4 border-l-4 border-red-400 bg-red-50">
                        <h3 class="font-semibold text-red-800">일반적인 오류</h3>
                        <ul class="text-red-700 text-sm mt-1 list-disc list-inside">
                            <li>SMTP 인증 실패: 사용자명/비밀번호 확인</li>
                            <li>연결 시간 초과: 방화벽/포트 확인</li>
                            <li>SSL/TLS 오류: 암호화 설정 확인</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('test.mail') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    🔄 다시 테스트
                </a>
                <a href="{{ route('quote') }}" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    📝 견적 폼으로 이동
                </a>
                <a href="{{ route('home') }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    🏠 홈으로 이동
                </a>
            </div>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t text-center text-sm text-gray-500">
                <p>이 페이지는 개발/테스트 목적으로만 사용하세요.</p>
                <p>운영 환경에서는 이 라우트를 제거하거나 접근을 제한하세요.</p>
            </div>
        </div>
    </div>
</body>
</html>
