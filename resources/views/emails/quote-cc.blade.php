<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>견적 요청 사본 - {{ $formData['subject'] }}</title>
    <style>
        body {
            font-family: 'Malgun Gothic', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .email-container {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 3px solid #6366f1;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h1 {
            color: #6366f1;
            margin: 0;
            font-size: 20px;
        }
        .cc-badge {
            display: inline-block;
            background: #e0e7ff;
            color: #4338ca;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 8px;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 20px 0;
        }
        .summary-item {
            background: #f8fafc;
            padding: 15px;
            border-radius: 6px;
            border-left: 3px solid #6366f1;
        }
        .summary-label {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .summary-value {
            font-weight: bold;
            color: #1f2937;
        }
        .message-preview {
            background: #f8fafc;
            padding: 15px;
            border-radius: 6px;
            border-left: 3px solid #6366f1;
            margin: 15px 0;
            max-height: 200px;
            overflow: hidden;
            position: relative;
        }
        .message-preview::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: linear-gradient(transparent, #f8fafc);
        }
        .footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📋 견적 요청 사본</h1>
            <span class="cc-badge">참조 메일</span>
            <p style="margin: 10px 0 0 0; color: #6b7280; font-size: 14px;">
                {{ $formData['submitted_at'] ?? now() }} | 
                요청자: {{ $formData['name'] }} ({{ $formData['contact_email'] }})
            </p>
        </div>

        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-label">제목</div>
                <div class="summary-value">{{ $formData['subject'] }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">회사명</div>
                <div class="summary-value">{{ $formData['company'] ?? '미입력' }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">연락처</div>
                <div class="summary-value">{{ $formData['phone'] ?? '미입력' }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">답변 방법</div>
                <div class="summary-value">
                    @switch($formData['response_method'])
                        @case('phone') 전화 @break
                        @case('email') 이메일 @break
                        @case('both') 전화 + 이메일 @break
                        @default {{ $formData['response_method'] }}
                    @endswitch
                </div>
            </div>
        </div>

        @if(!empty($formData['attachments']))
        <div style="background: #fef3c7; padding: 15px; border-radius: 6px; margin: 15px 0;">
            <strong>📎 첨부파일:</strong> {{ count($formData['attachments']) }}개
            @foreach($formData['attachments'] as $attachment)
                <div style="margin-left: 15px; font-size: 14px; color: #92400e;">
                    • {{ $attachment['original_name'] }} ({{ number_format($attachment['size'] / 1024, 1) }} KB)
                </div>
            @endforeach
        </div>
        @endif

        <div>
            <h3 style="color: #1f2937; margin-bottom: 10px;">요청 내용 미리보기</h3>
            <div class="message-preview">
                {!! Str::limit(strip_tags($formData['message']), 300) !!}
            </div>
        </div>

        <div class="footer">
            <p><strong>처리 담당자:</strong> 견적 담당팀</p>
            <p><strong>예상 처리 시간:</strong> 영업일 기준 1-2일</p>
            <hr style="margin: 15px 0; border: none; border-top: 1px solid #e5e7eb;">
            <p style="text-align: center;">
                이 메일은 견적 요청 사본으로 자동 발송되었습니다.<br>
                © {{ date('Y') }} Company Name. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
