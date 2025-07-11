<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    AuthController,
    CandidateController,
    EmployerController,
    JobController,
    NewsController,
    ContactController,
    HomeController,
    JobDetailController,
    QuoteController
};
use App\Mail\QuoteMail;
use Illuminate\Support\Facades\Mail;

require __DIR__ . '/admin.php';

Route::get('/', function () {
    return view('Frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('Frontend.about');
})->name('about');

Route::get('/about', function () {
    return view('Frontend.about');
})->name('about');

Route::get('/about/greeting', function () {
    return view('Frontend.about');
})->name('about.greeting');


Route::get('/about/technology', function () {
    return view('Frontend.technology-status');
})->name('about.technology');

Route::get('/about/directions', function () {
    return view('Frontend.directions');
})->name('about.directions');

Route::get('/products', function () {
    return view('Frontend.products-main');
})->name('products');


Route::get('/quote', function () {
    return view('Frontend.quote');
})->name('quote');

Route::post('/quote', function () {
    // Handle quote form submission
    return redirect()->route('quote')->with('success', '견적 요청이 성공적으로 전송되었습니다.');
})->name('quote.submit');

Route::get('/technology', function () {
    return view('Frontend.technology');
})->name('technology');

Route::get('/support', function () {
    return view('Frontend.support');
})->name('support');

Route::get('/products', function () {
    return view('Frontend.products-main');
})->name('products');

Route::get('/products/general', function () {
    return view('Frontend.products-main');
})->name('products.general');
Route::get('/products/precision', function () {
    $precisionTools = [
        [
            'ko' => '스트레이트 엣지',
            'en' => 'Straight Edge',
            'vi' => 'Thước thẳng',
            'icon' => 'straight-edge',
            'description_ko' => '직선도 측정용 정밀 도구',
            'description_en' => 'Precision tool for straightness measurement',
            'description_vi' => 'Công cụ chính xác để đo độ thẳng',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/370/040/170x130.crop.jpg'
        ],
        [
            'ko' => '파라렐바',
            'en' => 'Parallel Bar',
            'vi' => 'Thanh song song',
            'icon' => 'parallel-bar',
            'description_ko' => '평행도 측정 및 설정용',
            'description_en' => 'For parallelism measurement and setup',
            'description_vi' => 'Để đo và thiết lập độ song song',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/366/040/170x130.crop.jpg'
        ],
        [
            'ko' => '직각정반(삼각)',
            'en' => 'Right Angle Plate (Triangle)',
            'vi' => 'Bàn vuông góc (tam giác)',
            'icon' => 'triangle',
            'description_ko' => '직각도 검사용 삼각 정반',
            'description_en' => 'Triangle plate for right angle inspection',
            'description_vi' => 'Bàn tam giác để kiểm tra góc vuông',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/362/040/170x130.crop.jpg'
        ],
        [
            'ko' => '직각정반(사각)',
            'en' => 'Right Angle Plate (Square)',
            'vi' => 'Bàn vuông góc (vuông)',
            'icon' => 'square',
            'description_ko' => '직각도 검사용 사각 정반',
            'description_en' => 'Square plate for right angle inspection',
            'description_vi' => 'Bàn vuông để kiểm tra góc vuông',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/356/040/170x130.crop.jpg'
        ],
        [
            'ko' => '석재 다이얼볼파라미터',
            'en' => 'Stone Dial Ball Parameter',
            'vi' => 'Thông số bóng quay đá',
            'icon' => 'dial-ball',
            'description_ko' => '정밀 측정용 다이얼 게이지',
            'description_en' => 'Dial gauge for precision measurement',
            'description_vi' => 'Đồng hồ so để đo chính xác',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/351/040/170x130.crop.jpg'
        ],
        [
            'ko' => '브이블럭',
            'en' => 'V-Block',
            'vi' => 'Khối V',
            'icon' => 'v-block',
            'description_ko' => '원형 부품 고정 및 측정용',
            'description_en' => 'For holding and measuring round parts',
            'description_vi' => 'Để giữ và đo các bộ phận tròn',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/345/040/170x130.crop.jpg'
        ]
    ];

    return view('Frontend.product-category', [
        'activePage' => 'precision',
        'pageTitle' => '정밀 측정구',
        'pageTitleEn' => 'Precision Measuring Tools',
        'pageTitleVi' => 'Dụng cụ đo chính xác',
        'products' => $precisionTools
    ]);
})->name('products.precision');

Route::get('/products/custom', function () {
    $customFopProducts = [
        [
            'ko' => '검사장비',
            'en' => 'Large FOP Surface Plate',
            'vi' => 'Bàn FOP lớn',
            'description_ko' => '대형 장비용 맞춤 제작 정반',
            'description_en' => 'Custom large surface plate for heavy equipment',
            'description_vi' => 'Bàn tùy chỉnh lớn cho thiết bị nặng',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/061/041/170x130.crop.jpg'
        ],
        [
            'ko' => '검사장비',
            'en' => 'Special FOP Surface Plate',
            'vi' => 'Bàn FOP đặc biệt',
            'description_ko' => '특수 용도 맞춤 설계 정반',
            'description_en' => 'Custom designed plate for special applications',
            'description_vi' => 'Bàn thiết kế tùy chỉnh cho ứng dụng đặc biệt',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/057/041/170x130.crop.jpg'
        ],
        [
            'ko' => '칼라강판 코팅장비',
            'en' => 'Precision FOP Surface Plate',
            'vi' => 'Bàn FOP chính xác',
            'description_ko' => '초정밀 측정용 FOP 정반',
            'description_en' => 'Ultra-precision FOP plate for measurement',
            'description_vi' => 'Bàn FOP siêu chính xác để đo lường',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/053/041/170x130.crop.jpg'
        ],
        [
            'ko' => '공정 자동화 장비',
            'en' => 'Modular FOP Surface Plate',
            'vi' => 'Bàn FOP mô-đun',
            'description_ko' => '조립식 모듈형 FOP 정반',
            'description_en' => 'Modular assembly FOP surface plate',
            'description_vi' => 'Bàn FOP lắp ráp mô-đun',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/048/041/170x130.crop.jpg'
        ],
        [
            'ko' => 'Grinding Stage',
            'en' => 'Portable FOP Surface Plate',
            'vi' => 'Bàn FOP di động',
            'description_ko' => '이동 가능한 소형 FOP 정반',
            'description_en' => 'Portable compact FOP surface plate',
            'description_vi' => 'Bàn FOP nhỏ gọn di động',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/489/040/170x130.crop.jpg'
        ],
        [
            'ko' => 'Grinding Stage',
            'en' => 'Industrial FOP Surface Plate',
            'vi' => 'Bàn FOP công nghiệp',
            'description_ko' => '산업 현장용 내구성 FOP 정반',
            'description_en' => 'Durable FOP plate for industrial sites',
            'description_vi' => 'Bàn FOP bền cho các địa điểm công nghiệp',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/486/040/170x130.crop.jpg'
        ]
    ];

    return view('Frontend.product-category', [
        'activePage' => 'custom',
        'pageTitle' => '주문형 FOP 정반',
        'pageTitleEn' => 'Custom FOP Surface Plate',
        'pageTitleVi' => 'Bàn FOP tùy chỉnh',
        'products' => $customFopProducts
    ]);
})->name('products.custom');

Route::get('/products/air-bearing', function () {
    $airBearingStages = [
        [
            'ko' => '다기능측정기',
            'en' => 'Precision Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing chính xác',
            'description_ko' => '초정밀 위치 제어 스테이지',
            'description_en' => 'Ultra-precision positioning stage',
            'description_vi' => 'Sân khấu định vị siêu chính xác',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/494/040/170x130.crop.jpg'
        ],
        [
            'ko' => 'Gantry Air bearing Stage(7G)',
            'en' => 'Large Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing lớn',
            'description_ko' => '대형 부품 가공용 스테이지',
            'description_en' => 'Stage for large part processing',
            'description_vi' => 'Sân khấu để xử lý bộ phận lớn',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/328/040/170x130.crop.jpg'
        ],
        [
            'ko' => 'Sprit type Air Bearing Stage',
            'en' => 'High Speed Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing tốc độ cao',
            'description_ko' => '고속 이송 전용 스테이지',
            'description_en' => 'High-speed transfer dedicated stage',
            'description_vi' => 'Sân khấu chuyên dụng truyền tốc độ cao',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/191/170x130.crop.jpg'
        ],
        [
            'ko' => '다축 Air Bearing Stage',
            'en' => 'Multi-Axis Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing đa trục',
            'description_ko' => '다축 동시 제어 스테이지',
            'description_en' => 'Multi-axis simultaneous control stage',
            'description_vi' => 'Sân khấu điều khiển đồng thời đa trục',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/179/170x130.crop.jpg'
        ],
        [
            'ko' => '회전형 Air Bearing Stage',
            'en' => 'Rotary Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing quay',
            'description_ko' => '회전 운동 전용 스테이지',
            'description_en' => 'Rotary motion dedicated stage',
            'description_vi' => 'Sân khấu chuyên dụng chuyển động quay',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/176/170x130.crop.jpg'
        ],
        [
            'ko' => '진공 Air Bearing Stage',
            'en' => 'Vacuum Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing chân không',
            'description_ko' => '진공 환경용 스테이지',
            'description_en' => 'Stage for vacuum environment',
            'description_vi' => 'Sân khấu cho môi trường chân không',
            'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/173/170x130.crop.jpg'
        ]
    ];

    return view('Frontend.product-category', [
        'activePage' => 'air-bearing',
        'pageTitle' => 'Air Bearing Stage',
        'pageTitleEn' => 'Air Bearing Stage',
        'pageTitleVi' => 'Air Bearing Stage',
        'products' => $airBearingStages
    ]);
})->name('products.air-bearing');
Route::get('/process', function () {
    return redirect()->route('process.material');
})->name('process');

Route::get('/process/material', function () {
    $materialProcesses = [
        [
            'ko' => 'O-RING 용 가공',
            'en' => 'O-RING Processing',
            'vi' => 'Gia công O-RING',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/446/040/170x130.crop.jpg',
            'description_ko' => 'O-링 제작을 위한 정밀 가공',
            'description_en' => 'Precision processing for O-ring manufacturing',
            'description_vi' => 'Gia công chính xác để sản xuất O-ring'
        ],
        [
            'ko' => '압도공정',
            'en' => 'Pressure Process',
            'vi' => 'Quy trình áp lực',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/494/040/170x130.crop.jpg',
            'description_ko' => '고압을 이용한 성형 공정',
            'description_en' => 'Forming process using high pressure',
            'description_vi' => 'Quy trình tạo hình sử dụng áp suất cao'
        ],
        [
            'ko' => '압도공정',
            'en' => 'Pressure Process',
            'vi' => 'Quy trình áp lực',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/379/170x130.crop.jpg',
            'description_ko' => '고압을 이용한 성형 공정',
            'description_en' => 'Forming process using high pressure',
            'description_vi' => 'Quy trình tạo hình sử dụng áp suất cao'
        ],
        [
            'ko' => '압도공정',
            'en' => 'Pressure Process',
            'vi' => 'Quy trình áp lực',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/486/040/170x130.crop.jpg',
            'description_ko' => '고압을 이용한 성형 공정',
            'description_en' => 'Forming process using high pressure',
            'description_vi' => 'Quy trình tạo hình sử dụng áp suất cao'
        ],
        [
            'ko' => '절삭가공정(중국)',
            'en' => 'Cutting Process (China)',
            'vi' => 'Quy trình cắt (Trung Quốc)',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/269/170x130.crop.jpg',
            'description_ko' => '중국 공장의 절삭 가공 공정',
            'description_en' => 'Cutting process at China factory',
            'description_vi' => 'Quy trình cắt tại nhà máy Trung Quốc'
        ],
        [
            'ko' => '절삭가공정(중국)',
            'en' => 'Cutting Process (China)',
            'vi' => 'Quy trình cắt (Trung Quốc)',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/266/170x130.crop.jpg',
            'description_ko' => '중국 공장의 절삭 가공 공정',
            'description_en' => 'Cutting process at China factory',
            'description_vi' => 'Quy trình cắt tại nhà máy Trung Quốc'
        ],
        [
            'ko' => '절삭가공정(중국)',
            'en' => 'Cutting Process (China)',
            'vi' => 'Quy trình cắt (Trung Quốc)',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/263/170x130.crop.jpg',
            'description_ko' => '중국 공장의 절삭 가공 공정',
            'description_en' => 'Cutting process at China factory',
            'description_vi' => 'Quy trình cắt tại nhà máy Trung Quốc'
        ],
        [
            'ko' => '대형절삭 제작 (중국공정)',
            'en' => 'Large Cutting Manufacturing (China Process)',
            'vi' => 'Sản xuất cắt lớn (Quy trình Trung Quốc)',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/260/170x130.crop.jpg',
            'description_ko' => '대형 부품의 절삭 제작 공정',
            'description_en' => 'Large part cutting manufacturing process',
            'description_vi' => 'Quy trình sản xuất cắt bộ phận lớn'
        ],
        [
            'ko' => '절단 및 외곽곡절절삭(중국공정)',
            'en' => 'Cutting & Outer Edge Processing (China Process)',
            'vi' => 'Cắt & Gia công cạnh ngoài (Quy trình Trung Quốc)',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/257/170x130.crop.jpg',
            'description_ko' => '절단 및 외곽 가공 공정',
            'description_en' => 'Cutting and outer edge processing',
            'description_vi' => 'Cắt và gia công cạnh ngoài'
        ]
    ];

    return view('Frontend.process', [
        'activePage' => 'material',
        'pageTitle' => '소재 지원',
        'pageTitleEn' => 'Material Support',
        'pageTitleVi' => 'Hỗ trợ vật liệu',
        'processes' => $materialProcesses
    ]);
})->name('process.material');

Route::get('/process/order', function () {
    $orderProcesses = [
        [
            'ko' => '주문 접수',
            'en' => 'Order Reception',
            'vi' => 'Tiếp nhận đơn hàng',
            'description_ko' => '고객 주문 접수 및 검토',
            'description_en' => 'Customer order reception and review',
            'description_vi' => 'Tiếp nhận và xem xét đơn hàng của khách hàng',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/044/041/170x130.crop.jpg'
        ],
        [
            'ko' => '설계 검토',
            'en' => 'Design Review',
            'vi' => 'Xem xét thiết kế',
            'description_ko' => '제품 설계 및 사양 검토',
            'description_en' => 'Product design and specification review',
            'description_vi' => 'Xem xét thiết kế và thông số kỹ thuật sản phẩm',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/399/170x130.crop.jpg'
        ],
        [
            'ko' => '정밀 측정',
            'en' => 'Precision Measurement',
            'vi' => 'Đo lường chính xác',
            'description_ko' => '고정밀 측정 및 품질 검사',
            'description_en' => 'High precision measurement and quality inspection',
            'description_vi' => 'Đo lường độ chính xác cao và kiểm tra chất lượng',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/299/170x130.crop.jpg'
        ],
        [
            'ko' => '품질 관리',
            'en' => 'Quality Control',
            'vi' => 'Kiểm soát chất lượng',
            'description_ko' => '전 공정 품질 관리 시스템',
            'description_en' => 'Full process quality control system',
            'description_vi' => 'Hệ thống kiểm soát chất lượng toàn quy trình',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/296/170x130.crop.jpg'
        ],
        [
            'ko' => '최종 검사',
            'en' => 'Final Inspection',
            'vi' => 'Kiểm tra cuối cùng',
            'description_ko' => '출하 전 최종 품질 검사',
            'description_en' => 'Final quality inspection before shipment',
            'description_vi' => 'Kiểm tra chất lượng cuối cùng trước khi giao hàng',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/293/170x130.crop.jpg'
        ],
        [
            'ko' => '포장 및 출하',
            'en' => 'Packaging & Shipment',
            'vi' => 'Đóng gói & Giao hàng',
            'description_ko' => '안전한 포장 및 배송',
            'description_en' => 'Safe packaging and delivery',
            'description_vi' => 'Đóng gói an toàn và giao hàng',
            'image' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/290/170x130.crop.jpg'
        ]
    ];

    return view('Frontend.process', [
        'activePage' => 'order',
        'pageTitle' => '주문 및 측정',
        'pageTitleEn' => 'Order & Measurement',
        'pageTitleVi' => 'Đặt hàng & Đo lường',
        'processes' => $orderProcesses
    ]);
})->name('process.order');
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

// Quote routes
Route::get('/quote', [QuoteController::class, 'index'])->name('quote');
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.submit');
Route::post('/quote/preview', [QuoteController::class, 'preview'])->name('quote.preview');
Route::post('/quote/upload-image', [QuoteController::class, 'uploadImage'])->name('quote.upload-image');

// Customer Support routes
Route::get('/support', function () {
    return redirect()->route('support.consultation');
})->name('support');

Route::get('/support/notices', function () {
    return view('frontend.support-notices');
})->name('support.notices');

Route::get('/support/consultation', function () {
    return view('frontend.customer-support');
})->name('support.consultation');
Route::get('/test-mail', function () {
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

        // Test email addresses
        $testAdminEmail = 'admin@test.com';
        $testCustomerEmail = 'customer@test.com';

        // Send test emails
        $results = [];

        // Test Admin Email
        try {
            Mail::to($testAdminEmail)->send(new QuoteMail($testFormData, 'admin'));
            $results['admin'] = '✅ Admin email sent successfully';
        } catch (\Exception $e) {
            $results['admin'] = '❌ Admin email failed: ' . $e->getMessage();
        }

        // Test Customer Email
        try {
            Mail::to($testCustomerEmail)->send(new QuoteMail($testFormData, 'customer'));
            $results['customer'] = '✅ Customer email sent successfully';
        } catch (\Exception $e) {
            $results['customer'] = '❌ Customer email failed: ' . $e->getMessage();
        }

        // Test CC Email
        try {
            Mail::to('cc@test.com')->send(new QuoteMail($testFormData, 'cc'));
            $results['cc'] = '✅ CC email sent successfully';
        } catch (\Exception $e) {
            $results['cc'] = '❌ CC email failed: ' . $e->getMessage();
        }

        // Mail configuration info
        $mailConfig = [
            'driver' => config('mail.default'),
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            'encryption' => config('mail.mailers.smtp.encryption'),
            'username' => config('mail.mailers.smtp.username'),
            'from_address' => config('mail.from.address'),
            'from_name' => config('mail.from.name'),
        ];

        return response()->view('test-mail-results', [
            'results' => $results,
            'mailConfig' => $mailConfig,
            'testFormData' => $testFormData
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Mail test failed',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
})->name('test.mail');

Route::get('/test-mail-1', function () {
    Mail::raw('Đây là email test gửi từ hệ thống Laravel.', function ($message) {
        $message->to('huutran96hy@gmail.com')
                ->subject('Test gửi mail Laravel');
    });

    return 'Đã gửi thử mail!';
});

Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Đăng ký, đăng nhập
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
