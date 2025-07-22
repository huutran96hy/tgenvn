<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        <!-- Sidebar -->
        @include('Frontend.components.process-sidebar', ['activePage' => $activePage])
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-sm">
                <!-- Breadcrumb -->
                <div class="mb-6 lg:mb-8">
                    <!-- Mobile Header -->
                    <div class="block lg:hidden">
                        <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
                            <div class="flex items-center justify-center mb-2">
                                <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                                <h1 class="text-lg font-bold text-blue-600 text-center" data-ko="{{ $pageTitle ?? '제품안내' }}" data-en="{{ $pageTitleEn ?? 'Products' }}" data-vi="{{ $pageTitleVi ?? 'Sản phẩm' }}">{{ $pageTitle ?? '제품안내' }}</h1>
                            </div>
                            <p class="text-center text-xs text-gray-500">Technical Granite Stage Technology</p>
                        </div>
                    </div>

                    <!-- Desktop Header -->
                    <div class="hidden lg:block">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between pb-4 border-b-2 border-gray-200">
                            <div class="flex flex-col lg:flex-row lg:items-center mb-4 lg:mb-0">
                                <div class="flex items-center mb-2 lg:mb-0">
                                    <span class="w-3 h-3 bg-blue-600 rounded-full mr-3"></span>
                                    <h1 class="text-2xl lg:text-3xl font-bold text-blue-600 mr-0 lg:mr-4" data-ko="{{ $pageTitle ?? '제품안내' }}" data-en="{{ $pageTitleEn ?? 'Products' }}" data-vi="{{ $pageTitleVi ?? 'Sản phẩm' }}">{{ $pageTitle ?? '제품안내' }}</h1>
                                </div>
                                <span class="text-gray-400 text-sm lg:text-lg">Technical Granite Stage Technology</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs lg:text-sm text-gray-500 flex-wrap">
                                <span data-ko="HOME" data-en="HOME" data-vi="TRANG CHỦ">HOME</span>
                                <span>></span>
                                <span class="text-blue-600" data-ko="{{ $pageTitle ?? '제품안내' }}" data-en="{{ $pageTitleEn ?? 'Products' }}" data-vi="{{ $pageTitleVi ?? 'Sản phẩm' }}">{{ $pageTitle ?? '제품안내' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Header -->
                
                    <div class="space-y-6">
                       
                        <img src="{{ asset('assets/images/equipment.jpg') }}" alt="Equipment Header" class="w-full">
                    </div>
                </div>

                <!-- Related Products -->
                

                <!-- Navigation Buttons -->
            </div>
        </div>