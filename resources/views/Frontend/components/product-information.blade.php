<div class="space-y-6">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="border-b border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-blue-600" data-ko="제품정보" data-en="Product Info" data-vi="Thông tin sản phẩm">제품정보</h3>
                <div class="flex items-center text-sm text-gray-500">
                    <span>PRODUCT VIEW</span>
                    <a class="ml-2 text-blue-600 hover:text-blue-800" href="{{ route('products') }}" data-ko="더보기" data-en="View More" data-vi="Xem thêm">
                        MORE →
                    </a>
                </div>
            </div>
        </div>
        <div class="p-4">
            <!-- Fixed Product Image Slider -->
            <div class="mb-4 relative">
                <div class="w-full h-58 bg-gray-200 rounded-lg overflow-hidden relative" id="productSliderContainer">
                    <!-- Slide Images Container -->
                    <div class="slider-wrapper h-62 h-full relative">
                        <div class="slider-track flex h-62 transition-transform duration-500 ease-in-out" id="productSlider">
                            <div class="slide w-full flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture2.jpg') }}" alt="Product 1" class="max-w-full  rounded-lg">
                            </div>
                            <div class="slide w-full flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture7.jpg') }}" alt="Product 2" class="max-w-full   rounded-lg">
                            </div>
                            <div class="slide w-full flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture3.jpg') }}" alt="Product 3" class="max-w-full   rounded-lg">
                            </div>
                            <div class="slide w-full  flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture4.jpg') }}" alt="Product 2" class="max-w-full   rounded-lg">
                            </div>
                            <div class="slide w-full flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture5.jpg') }}" alt="Product 3" class="max-w-full  rounded-lg">
                            </div>
                            <div class="slide w-full flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture6.jpg') }}" alt="Product 2" class="max-w-full  rounded-lg">
                            </div>
                            <div class="slide w-full flex-shrink-0 flex items-center justify-center">
                                <img src="{{ asset('assets/images/products/Picture1.jpg') }}" alt="Product 3" class="max-w-full   rounded-lg">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slider Dots -->
                    <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                        <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="0"></button>
                        <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="1"></button>
                        <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-200" data-slide="2"></button>
                    </div>
                </div>
            </div>
            
            <div class="space-y-2">
                <h4 class="font-bold text-blue-600" data-ko="티지이엔씨 제품정보" data-en="TGEN VN Product Information" data-vi="Thông tin sản phẩm TGEN VN">티지이엔씨 제품정보</h4>
                <p class="text-sm text-gray-600" data-ko="티지이엔씨에서는<br>다양한 제품을<br>판매 및 제작하여 수<br>있습니다." data-en="TGEN VN offers<br>various products<br>for sale and<br>manufacturing." data-vi="TGEN VN cung cấp<br>các sản phẩm<br>đa dạng để bán<br>và sản xuất.">
                    티지이엔씨에서는<br>
                    다양한 제품을<br>
                    판매 및 제작하여 수<br>
                    있습니다.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sliderTrack = document.getElementById('productSlider');
    const dots = document.querySelectorAll('.slider-dot');
    const container = document.getElementById('productSliderContainer');
    
    let currentSlide = 0;
    const totalSlides = 7;
    let autoSlideInterval;

    function updateSlider() {
        // Calculate the exact translation needed
        const slideWidth = container.offsetWidth;
        const translateX = -(currentSlide * slideWidth);
        
        // Apply the transform
        sliderTrack.style.transform = `translateX(${translateX}px)`;
        
        // Update dots appearance
        dots.forEach((dot, index) => {
            dot.classList.remove('bg-white', 'bg-opacity-100');
            dot.classList.add('bg-opacity-50');
            
            if (index === currentSlide) {
                dot.classList.remove('bg-opacity-50');
                dot.classList.add('bg-white', 'bg-opacity-100');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function goToSlide(index) {
        if (index >= 0 && index < totalSlides) {
            currentSlide = index;
            updateSlider();
            resetAutoSlide();
        }
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Event listeners for dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', (e) => {
            e.preventDefault();
            goToSlide(index);
        });
    });

    // Pause auto-slide on hover
    container.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });

    container.addEventListener('mouseleave', () => {
        startAutoSlide();
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        updateSlider();
    });

    // Initialize slider
    updateSlider();
    startAutoSlide();
});
</script>

<style>
.slider-wrapper {
    position: relative;
    overflow: hidden;
}

.slider-track {
    width: 300%; /* 3 slides × 100% */
    height: 100%;
}

.slide {
    width: 33.333333%; /* 100% / 3 slides */
    height: 100%;
}

.slider-dot.bg-opacity-100 {
    background-color: rgba(255, 255, 255, 1) !important;
}

.slider-dot.bg-opacity-50 {
    background-color: rgba(255, 255, 255, 0.5) !important;
}

/* Ensure images don't overflow */
.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
