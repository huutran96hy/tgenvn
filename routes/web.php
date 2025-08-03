<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    ProductController,
    QuoteController,
    ProductCategoryController,
    ProcessController,
    ProcessCategoryController
};
use App\Mail\QuoteMail;
use App\Models\ProcessCategory;
use App\Models\Product;
use App\Models\ProductsCategory;
use Illuminate\Support\Facades\App;
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

Route::get('/equipment', function () {
    $processCategories = ProcessCategory::all();
    $activePage = "equipment";
    $pageTitle = "보유 장비";
    $pageTitleEn = "Available equipment";
    $pageTitleVi = "Thiết bị hiện có";
    return view('Frontend.equipment', compact('processCategories', 'activePage', 'pageTitle', 'pageTitleEn', 'pageTitleVi'));
})->name('equipment');

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
    return redirect()->route('products.general');
})->name('products');

Route::get('/products/general', function () {
    $productCategories = ProductsCategory::all();
    return view('Frontend.products-main', compact('productCategories'));
})->name('products.general');
Route::get('/products/precision', function () {
    $precisionTools = [
        [
            'ko' => '스트레이트 엣지',
            'en' => 'Straight Edge',
            'vi' => 'Thước thẳng',
            'icon' => 'straight-edge',
            'slug' => 'straight-edge',
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
            'slug' => 'parallel-bar',
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
            'slug' => 'right-angle-plate-triangle',
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
            'slug' => 'right-angle-plate-square',
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
            'slug' => 'stone-dial-ball-parameter',
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
            'slug' => 'v-block',
            'description_ko' => '원형 부품 고정 및 측정용',
            'description_en' => 'For holding and measuring round parts',
            'description_vi' => 'Để giữ và đo các bộ phận tròn',
            'link'=>'http://tg-enc.co.kr/xe/files/cache/thumbnails/345/040/170x130.crop.jpg'
        ]
    ];

    return view('frontend.product-category', [
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
            'ko' => '대형 FOP 정반',
            'en' => 'Large FOP Surface Plate',
            'vi' => 'Bàn FOP lớn',
            'slug' => 'large-fop-surface-plate',
            'description_ko' => '대형 장비용 맞춤 제작 정반',
            'description_en' => 'Custom large surface plate for heavy equipment',
            'description_vi' => 'Bàn tùy chỉnh lớn cho thiết bị nặng'
        ],
        [
            'ko' => '특수형 FOP 정반',
            'en' => 'Special FOP Surface Plate',
            'vi' => 'Bàn FOP đặc biệt',
            'slug' => 'special-fop-surface-plate',
            'description_ko' => '특수 용도 맞춤 설계 정반',
            'description_en' => 'Custom designed plate for special applications',
            'description_vi' => 'Bàn thiết kế tùy chỉnh cho ứng dụng đặc biệt'
        ],
        [
            'ko' => '정밀 FOP 정반',
            'en' => 'Precision FOP Surface Plate',
            'vi' => 'Bàn FOP chính xác',
            'slug' => 'precision-fop-surface-plate',
            'description_ko' => '초정밀 측정용 FOP 정반',
            'description_en' => 'Ultra-precision FOP plate for measurement',
            'description_vi' => 'Bàn FOP siêu chính xác để đo lường'
        ],
        [
            'ko' => '모듈형 FOP 정반',
            'en' => 'Modular FOP Surface Plate',
            'vi' => 'Bàn FOP mô-đun',
            'slug' => 'modular-fop-surface-plate',
            'description_ko' => '조립식 모듈형 FOP 정반',
            'description_en' => 'Modular assembly FOP surface plate',
            'description_vi' => 'Bàn FOP lắp ráp mô-đun'
        ],
        [
            'ko' => '휴대용 FOP 정반',
            'en' => 'Portable FOP Surface Plate',
            'vi' => 'Bàn FOP di động',
            'slug' => 'portable-fop-surface-plate',
            'description_ko' => '이동 가능한 소형 FOP 정반',
            'description_en' => 'Portable compact FOP surface plate',
            'description_vi' => 'Bàn FOP nhỏ gọn di động'
        ],
        [
            'ko' => '산업용 FOP 정반',
            'en' => 'Industrial FOP Surface Plate',
            'vi' => 'Bàn FOP công nghiệp',
            'slug' => 'industrial-fop-surface-plate',
            'description_ko' => '산업 현장용 내구성 FOP 정반',
            'description_en' => 'Durable FOP plate for industrial sites',
            'description_vi' => 'Bàn FOP bền cho các địa điểm công nghiệp'
        ]
    ];

    return view('frontend.product-category', [
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
            'ko' => '정밀 Air Bearing Stage',
            'en' => 'Precision Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing chính xác',
            'slug' => 'precision-air-bearing-stage',
            'description_ko' => '초정밀 위치 제어 스테이지',
            'description_en' => 'Ultra-precision positioning stage',
            'description_vi' => 'Sân khấu định vị siêu chính xác'
        ],
        [
            'ko' => '대형 Air Bearing Stage',
            'en' => 'Large Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing lớn',
            'slug' => 'large-air-bearing-stage',
            'description_ko' => '대형 부품 가공용 스테이지',
            'description_en' => 'Stage for large part processing',
            'description_vi' => 'Sân khấu để xử lý bộ phận lớn'
        ],
        [
            'ko' => '고속 Air Bearing Stage',
            'en' => 'High Speed Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing tốc độ cao',
            'slug' => 'high-speed-air-bearing-stage',
            'description_ko' => '고속 이송 전용 스테이지',
            'description_en' => 'High-speed transfer dedicated stage',
            'description_vi' => 'Sân khấu chuyên dụng truyền tốc độ cao'
        ],
        [
            'ko' => '다축 Air Bearing Stage',
            'en' => 'Multi-Axis Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing đa trục',
            'slug' => 'multi-axis-air-bearing-stage',
            'description_ko' => '다축 동시 제어 스테이지',
            'description_en' => 'Multi-axis simultaneous control stage',
            'description_vi' => 'Sân khấu điều khiển đồng thời đa trục'
        ],
        [
            'ko' => '회전형 Air Bearing Stage',
            'en' => 'Rotary Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing quay',
            'slug' => 'rotary-air-bearing-stage',
            'description_ko' => '회전 운동 전용 스테이지',
            'description_en' => 'Rotary motion dedicated stage',
            'description_vi' => 'Sân khấu chuyên dụng chuyển động quay'
        ],
        [
            'ko' => '진공 Air Bearing Stage',
            'en' => 'Vacuum Air Bearing Stage',
            'vi' => 'Sân khấu Air Bearing chân không',
            'slug' => 'vacuum-air-bearing-stage',
            'description_ko' => '진공 환경용 스테이지',
            'description_en' => 'Stage for vacuum environment',
            'description_vi' => 'Sân khấu cho môi trường chân không'
        ]
    ];

    return view('frontend.product-category', [
        'activePage' => 'air-bearing',
        'pageTitle' => 'Air Bearing Stage',
        'pageTitleEn' => 'Air Bearing Stage',
        'pageTitleVi' => 'Air Bearing Stage',
        'products' => $airBearingStages
    ]);
})->name('products.air-bearing');

Route::get('/products/{category}', [ProductCategoryController::class, 'detail'])->name('products.category');
Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('product.detail');
// // Product Detail Routes
// Route::get('/products/{category}/{slug}', function ($category, $slug) {
//     // Get all products data
//     $allProducts = [];
//     $categoryTitle = '';
    
//     if ($category === 'precision') {
//         $categoryTitle = '정밀 측정구';
//         $allProducts = [
//             [
//                 'ko' => '스트레이트 엣지',
//                 'en' => 'Straight Edge',
//                 'vi' => 'Thước thẳng',
//                 'icon' => 'straight-edge',
//                 'slug' => 'straight-edge',
//                 'description_ko' => '직선도 측정용 정밀 도구',
//                 'description_en' => 'Precision tool for straightness measurement',
//                 'description_vi' => 'Công cụ chính xác để đo độ thẳng',
//                 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/370/040/170x130.crop.jpg'
//             ],
//             [
//                 'ko' => '파라렐바',
//                 'en' => 'Parallel Bar',
//                 'vi' => 'Thanh song song',
//                 'icon' => 'parallel-bar',
//                 'slug' => 'parallel-bar',
//                 'description_ko' => '평행도 측정 및 설정용',
//                 'description_en' => 'For parallelism measurement and setup',
//                 'description_vi' => 'Để đo và thiết lập độ song song',
//                 'detailed_description_ko' => '파라렐바는 기계 부품의 평행도를 정확하게 측정하고 설정하기 위한 정밀 도구입니다. 높은 정밀도와 안정성을 제공하여 품질 관리에 필수적입니다.',
//                 'detailed_description_en' => 'Parallel Bar is a precision tool for accurately measuring and setting parallelism of machine parts. It provides high precision and stability, essential for quality control.',
//                 'detailed_description_vi' => 'Thanh song song là công cụ chính xác để đo và thiết lập độ song song của các bộ phận máy một cách chính xác. Nó cung cấp độ chính xác và ổn định cao, cần thiết cho kiểm soát chất lượng.',
//                 'features' => [
//                     ['ko' => '정밀 평행도 측정', 'en' => 'Precision parallelism measurement', 'vi' => 'Đo độ song song chính xác'],
//                     ['ko' => '안정적인 구조', 'en' => 'Stable structure', 'vi' => 'Cấu trúc ổn định'],
//                     ['ko' => '쉬운 조작', 'en' => 'Easy operation', 'vi' => 'Vận hành dễ dàng'],
//                     ['ko' => '다목적 사용', 'en' => 'Multi-purpose use', 'vi' => 'Sử dụng đa mục đích']
//                 ],
//                 'specifications' => [
//                     ['label_ko' => '길이', 'label_en' => 'Length', 'label_vi' => 'Chiều dài', 'value' => '200mm - 1000mm'],
//                     ['label_ko' => '정확도', 'label_en' => 'Accuracy', 'label_vi' => 'Độ chính xác', 'value' => '±0.003mm'],
//                     ['label_ko' => '소재', 'label_en' => 'Material', 'label_vi' => 'Vật liệu', 'value' => 'Hardened Steel'],
//                     ['label_ko' => '경도', 'label_en' => 'Hardness', 'label_vi' => 'Độ cứng', 'value' => 'HRC 58-62']
//                 ]
//             ]
//         ];
//     } elseif ($category === 'custom') {
//         $categoryTitle = '주문형 FOP 정반';
//         $allProducts = [
//             [
//                 'ko' => '대형 FOP 정반',
//                 'en' => 'Large FOP Surface Plate',
//                 'vi' => 'Bàn FOP lớn',
//                 'slug' => 'large-fop-surface-plate',
//                 'description_ko' => '대형 장비용 맞춤 제작 정반',
//                 'description_en' => 'Custom large surface plate for heavy equipment',
//                 'description_vi' => 'Bàn tùy chỉnh lớn cho thiết bị nặng',
//                 'detailed_description_ko' => '대형 FOP 정반은 대형 장비 및 부품의 정밀 측정을 위해 특별히 설계된 맞춤형 솔루션입니다. 뛰어난 평면도와 안정성을 제공합니다.',
//                 'detailed_description_en' => 'Large FOP Surface Plate is a custom solution specially designed for precision measurement of large equipment and parts. It provides excellent flatness and stability.',
//                 'detailed_description_vi' => 'Bàn FOP lớn là giải pháp tùy chỉnh được thiết kế đặc biệt để đo lường chính xác các thiết bị và bộ phận lớn. Nó cung cấp độ phẳng và ổn định tuyệt vời.',
//                 'features' => [
//                     ['ko' => '대형 크기 지원', 'en' => 'Large size support', 'vi' => 'Hỗ trợ kích thước lớn'],
//                     ['ko' => '맞춤형 설계', 'en' => 'Custom design', 'vi' => 'Thiết kế tùy chỉnh'],
//                     ['ko' => '높은 평면도', 'en' => 'High flatness', 'vi' => 'Độ phẳng cao'],
//                     ['ko' => '내구성 보장', 'en' => 'Durability guaranteed', 'vi' => 'Đảm bảo độ bền']
//                 ],
//                 'specifications' => [
//                     ['label_ko' => '크기', 'label_en' => 'Size', 'label_vi' => 'Kích thước', 'value' => '맞춤 제작 / Custom'],
//                     ['label_ko' => '평면도', 'label_en' => 'Flatness', 'label_vi' => 'Độ phẳng', 'value' => '±0.01mm'],
//                     ['label_ko' => '소재', 'label_en' => 'Material', 'label_vi' => 'Vật liệu', 'value' => 'Cast Iron / Granite'],
//                     ['label_ko' => '표면 처리', 'label_en' => 'Surface Treatment', 'label_vi' => 'Xử lý bề mặt', 'value' => 'Precision Ground']
//                 ]
//             ]
//         ];
//     } elseif ($category === 'air-bearing') {
//         $categoryTitle = 'Air Bearing Stage';
//         $allProducts = [
//             [
//                 'ko' => '정밀 Air Bearing Stage',
//                 'en' => 'Precision Air Bearing Stage',
//                 'vi' => 'Sân khấu Air Bearing chính xác',
//                 'slug' => 'precision-air-bearing-stage',
//                 'description_ko' => '초정밀 위치 제어 스테이지',
//                 'description_en' => 'Ultra-precision positioning stage',
//                 'description_vi' => 'Sân khấu định vị siêu chính xác',
//                 'detailed_description_ko' => '정밀 Air Bearing Stage는 마찰 없는 공기 베어링 기술을 사용하여 나노미터 수준의 정밀도로 위치 제어가 가능한 첨단 스테이지입니다.',
//                 'detailed_description_en' => 'Precision Air Bearing Stage is an advanced stage that enables position control with nanometer-level precision using frictionless air bearing technology.',
//                 'detailed_description_vi' => 'Sân khấu Air Bearing chính xác là một sân khấu tiên tiến cho phép điều khiển vị trí với độ chính xác cấp nanometer bằng công nghệ ổ khí không ma sát.',
//                 'features' => [
//                     ['ko' => '나노미터 정밀도', 'en' => 'Nanometer precision', 'vi' => 'Độ chính xác nanometer'],
//                     ['ko' => '마찰 없는 동작', 'en' => 'Frictionless operation', 'vi' => 'Hoạt động không ma sát'],
//                     ['ko' => '고속 응답', 'en' => 'High-speed response', 'vi' => 'Phản hồi tốc độ cao'],
//                     ['ko' => '긴 수명', 'en' => 'Long lifespan', 'vi' => 'Tuổi thọ dài']
//                 ],
//                 'specifications' => [
//                     ['label_ko' => '정밀도', 'label_en' => 'Precision', 'label_vi' => 'Độ chính xác', 'value' => '±10nm'],
//                     ['label_ko' => '이동 범위', 'label_en' => 'Travel Range', 'label_vi' => 'Phạm vi di chuyển', 'value' => '100mm x 100mm'],
//                     ['label_ko' => '최대 속도', 'label_en' => 'Max Speed', 'label_vi' => 'Tốc độ tối đa', 'value' => '500mm/s'],
//                     ['label_ko' => '공기 압력', 'label_en' => 'Air Pressure', 'label_vi' => 'Áp suất khí', 'value' => '0.4-0.6 MPa']
//                 ]
//             ]
//         ];
//     }
    
//     // Find the specific product
//     $product = collect($allProducts)->firstWhere('slug', $slug);
    
//     if (!$product) {
//         abort(404);
//     }
    
//     // Get related products (exclude current product)
//     $relatedProducts = collect($allProducts)->where('slug', '!=', $slug)->take(3)->toArray();
    
//     return view('frontend.product-detail', [
//         'product' => $product,
//         'category' => $category,
//         'categoryTitle' => $categoryTitle,
//         'relatedProducts' => $relatedProducts
//     ]);
// })->name('product.detail');
Route::get('/process', function () {
    $category = ProcessCategory::first();
    return redirect()->route('processes.category', ['category' => $category->slug]);
})->name('process');

Route::get('/processes/{category}', [ProcessCategoryController::class, 'detail'])->name('processes.category');
Route::get('/process/{slug}', [ProcessController::class, 'detail'])->name('process.detail');
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
