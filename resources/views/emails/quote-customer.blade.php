<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>견적 요청 접수 완료</title>
    <style>
        body {
            font-family: 'Malgun Gothic', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .email-container {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #10b981;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #10b981;
            margin: 0;
            font-size: 24px;
        }
        .success-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .quote-id {
            background: #ecfdf5;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #10b981;
            margin: 20px 0;
            text-align: center;
        }
        .quote-id strong {
            color: #065f46;
            font-size: 18px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section h2 {
            color: #1f2937;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .info-box {
            background: #f8fafc;
            padding: 20px;
            border-radius: 6px;
            margin: 15px 0;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #374151;
        }
        .info-value {
            color: #6b7280;
        }
        .next-steps {
            background: #fef3c7;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #f59e0b;
        }
        .next-steps h3 {
            color: #92400e;
            margin-top: 0;
        }
        .next-steps ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        .next-steps li {
            margin-bottom: 8px;
        }
        .contact-info {
            background: #dbeafe;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
        }
        .contact-info h3 {
            color: #1d4ed8;
            margin-top: 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="success-icon">✅</div>
            <h1>견적 요청이 접수되었습니다</h1>
            <p style="color: #6b7280; margin: 10px 0;">고객님의 견적 요청을 성공적으로 받았습니다.</p>
        </div>

        <div class="quote-id">
            <p style="margin: 0; color: #065f46;">요청 번호</p>
            <strong>Q{{ date('Ymd') }}{{ rand(1000, 9999) }}</strong>
            <p style="margin: 5px 0 0 0; font-size: 14px; color: #6b7280;">
                접수일시: {{ $formData['submitted_at'] ?? now() }}
            </p>
        </div>

        <div class="section">
            <h2>📋 접수된 요청 정보</h2>
            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">제목:</span>
                    <span class="info-value">{{ $formData['subject'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">요청자:</span>
                    <span class="info-value">{{ $formData['name'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">회사명:</span>
                    <span class="info-value">{{ $formData['company'] ?? '미입력' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">연락처:</span>
                    <span class="info-value">{{ $formData['contact_email'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">답변 방법:</span>
                    <span class="info-value">
                        @switch($formData['response_method'])
                            @case('phone') 전화 @break
                            @case('email') 이메일 @break
                            @case('both') 전화 + 이메일 @break
                            @default {{ $formData['response_method'] }}
                        @endswitch
                    </span>
                </div>
                @if(!empty($formData['attachments']))
                <div class="info-row">
                    <span class="info-label">첨부파일:</span>
                    <span class="info-value">{{ count($formData['attachments']) }}개 파일</span>
                </div>
                @endif
            </div>
        </div>

        <div class="next-steps">
            <h3>📞 다음 단계 안내</h3>
            <ul>
                <li><strong>검토 시간:</strong> 영업일 기준 1-2일 내 검토 완료</li>
                <li><strong>답변 방법:</strong> 선택하신 방법({{ 
                    $formData['response_method'] === 'phone' ? '전화' : 
                    ($formData['response_method'] === 'email' ? '이메일' : '전화 + 이메일') 
                }})으로 연락드립니다</li>
                <li><strong>추가 문의:</strong> 아래 연락처로 언제든 문의 가능합니다</li>
                <li><strong>견적서 발송:</strong> 검토 완료 후 상세 견적서를 발송해드립니다</li>
            </ul>
        </div>

        <div class="contact-info">
            <h3>📞 문의 연락처</h3>
            <p><strong>전화:</strong> 02-1234-5678</p>
            <p><strong>이메일:</strong> quote@company.com</p>
            <p><strong>영업시간:</strong> 평일 09:00-18:00 (점심시간 12:00-13:00 제외)</p>
        </div>

        <div style="background: #f0f9ff; padding: 15px; border-radius: 6px; margin: 20px 0;">
            <p style="margin: 0; text-align: center; color: #1e40af;">
                <strong>💡 빠른 처리를 위한 팁</strong><br>
                추가 자료나 상세 요구사항이 있으시면 이 메일에 회신해 주세요.
            </p>
        </div>

        <div class="footer">
            <p><strong>감사합니다!</strong></p>
            <p>고객님의 견적 요청에 최선을 다해 답변드리겠습니다.</p>
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #e5e7eb;">
            <p>
                이 메일은 자동으로 발송된 확인 메일입니다.<br>
                © {{ date('Y') }} Company Name. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
