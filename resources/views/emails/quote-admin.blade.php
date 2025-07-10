<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>견적 요청 - {{ $formData['subject'] }}</title>
    <style>
        body {
            font-family: 'Malgun Gothic', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
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
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
            font-size: 24px;
        }
        .header .quote-id {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section h2 {
            color: #1f2937;
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e5e7eb;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        .info-item {
            display: flex;
            padding: 10px;
            background: #f8fafc;
            border-radius: 4px;
        }
        .info-label {
            font-weight: bold;
            color: #374151;
            min-width: 100px;
            margin-right: 10px;
        }
        .info-value {
            color: #6b7280;
            flex: 1;
        }
        .message-content {
            background: #f8fafc;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #2563eb;
            margin: 15px 0;
        }
        .attachments {
            background: #fef3c7;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #f59e0b;
        }
        .attachment-item {
            display: flex;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #fde68a;
        }
        .attachment-item:last-child {
            border-bottom: none;
        }
        .attachment-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            background: #f59e0b;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
        }
        .priority-high {
            background: #fef2f2;
            border-left-color: #ef4444;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            background: #dbeafe;
            color: #1d4ed8;
        }
        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .email-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🎯 새로운 견적 요청</h1>
            <div class="quote-id">
                요청 ID: Q{{ date('Ymd') }}{{ rand(1000, 9999) }} | 
                접수일시: {{ $formData['submitted_at'] ?? now() }}
            </div>
            <div style="margin-top: 10px;">
                <span class="status-badge">신규 요청</span>
            </div>
        </div>

        <div class="section">
            <h2>👤 고객 정보</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">이름:</span>
                    <span class="info-value">{{ $formData['name'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">회사명:</span>
                    <span class="info-value">{{ $formData['company'] ?? '미입력' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">이메일:</span>
                    <span class="info-value">
                        <a href="mailto:{{ $formData['contact_email'] }}">{{ $formData['contact_email'] }}</a>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">전화번호:</span>
                    <span class="info-value">{{ $formData['phone'] ?? '미입력' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">팩스:</span>
                    <span class="info-value">{{ $formData['fax'] ?? '미입력' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">홈페이지:</span>
                    <span class="info-value">
                        @if($formData['homepage'])
                            <a href="{{ $formData['homepage'] }}" target="_blank">{{ $formData['homepage'] }}</a>
                        @else
                            미입력
                        @endif
                    </span>
                </div>
            </div>
            
            @if($formData['address'])
            <div class="info-item" style="grid-column: 1 / -1;">
                <span class="info-label">주소:</span>
                <span class="info-value">{{ $formData['address'] }}</span>
            </div>
            @endif
        </div>

        <div class="section">
            <h2>📋 요청 상세</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">제목:</span>
                    <span class="info-value"><strong>{{ $formData['subject'] }}</strong></span>
                </div>
                <div class="info-item">
                    <span class="info-label">카테고리:</span>
                    <span class="info-value">{{ $formData['category'] ?? '미분류' }}</span>
                </div>
                <div class="info-item">
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
                <div class="info-item">
                    <span class="info-label">공개 설정:</span>
                    <span class="info-value">{{ $formData['visibility'] === 'public' ? '공개' : '비공개' }}</span>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>💬 요청 내용</h2>
            <div class="message-content">
                {!! $formData['message'] !!}
            </div>
        </div>

        @if(!empty($formData['tags']))
        <div class="section">
            <h2>🏷️ 태그</h2>
            <div style="padding: 10px; background: #f0f9ff; border-radius: 4px;">
                {{ $formData['tags'] }}
            </div>
        </div>
        @endif

        @if(!empty($formData['attachments']))
        <div class="section">
            <h2>📎 첨부파일 ({{ count($formData['attachments']) }}개)</h2>
            <div class="attachments">
                @foreach($formData['attachments'] as $attachment)
                <div class="attachment-item">
                    <div class="attachment-icon">📄</div>
                    <div>
                        <strong>{{ $attachment['original_name'] }}</strong><br>
                        <small>{{ number_format($attachment['size'] / 1024, 1) }} KB | {{ $attachment['mime_type'] }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="section">
            <h2>🔧 기술 정보</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">IP 주소:</span>
                    <span class="info-value">{{ $formData['ip_address'] ?? 'Unknown' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">브라우저:</span>
                    <span class="info-value" style="font-size: 11px;">{{ Str::limit($formData['user_agent'] ?? 'Unknown', 50) }}</span>
                </div>
            </div>
        </div>

        <div class="footer">
            <p><strong>📞 빠른 응답을 위한 안내:</strong></p>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li>긴급한 요청의 경우 직접 전화 연락을 권장합니다.</li>
                <li>첨부파일이 있는 경우 바이러스 검사 후 확인됩니다.</li>
                <li>영업시간: 평일 09:00-18:00 (점심시간 12:00-13:00 제외)</li>
            </ul>
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #e5e7eb;">
            <p style="text-align: center; color: #9ca3af;">
                이 메일은 자동으로 발송된 메일입니다. | 
                © {{ date('Y') }} Company Name. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
