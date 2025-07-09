<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($processes as $index => $process)
            <div class="product-card bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 cursor-pointer">
                {{-- Image Container with correct aspect ratio --}}
                <div class="bg-gray-50 flex items-center justify-center p-1 border-b border-gray-100 image-container">
                    @if(isset($process['image']))
                        <img
                            src="{{ $process['image'] }}"
                            alt="{{ $process['ko'] }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm text-gray-500" data-ko="이미지 준비중" data-en="Image Loading" data-vi="Đang tải hình">이미지 준비중</span>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- Content Container --}}
                <div class="p-4">
                    <h3
                        class="text-lg font-medium text-blue-600 text-center leading-relaxed"
                        data-ko="{{ $process['ko'] }}"
                        data-en="{{ $process['en'] }}"
                        data-vi="{{ $process['vi'] }}"
                    >
                        {{ $process['ko'] }}
                    </h3>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .product-card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    
    .product-card:hover {
        transform: translateY(-2px);
    }
    
    .product-card img {
        transition: transform 0.3s ease-in-out;
    }
    
    .product-card:hover img {
        transform: scale(1.05);
    }
    
    /* Set aspect ratio for image container */
    .image-container {
        aspect-ratio: 4 / 3;
        width: 100%;
        min-height: 200px;
    }
    
    /* Responsive adjustments */
    @media (min-width: 768px) {
        .image-container {
            min-height: 180px;
        }
    }
    
    @media (min-width: 1024px) {
        .image-container {
            min-height: 200px;
        }
    }
</style>
