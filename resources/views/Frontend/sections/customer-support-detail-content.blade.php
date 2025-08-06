<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        <!-- Sidebar -->
        @include('Frontend.components.support-sidebar', ['activePage' => 'notices'])
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
                                <h1 class="text-lg font-bold text-blue-600 text-center" data-ko="{{ $pageTitle ?? '제품안내' }}" data-en="{{ $pageTitleEn ?? 'notices' }}" data-vi="{{ $pageTitleVi ?? 'Sản phẩm' }}">{{ $pageTitle ?? '제품안내' }}</h1>
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
                                    <h1 class="text-2xl lg:text-3xl font-bold text-blue-600 mr-0 lg:mr-4" data-ko="{{ $pageTitle ?? '공지 사항' }}" data-en="{{ $pageTitleEn ?? 'Notices' }}" data-vi="{{ $pageTitleVi ?? 'Thông báo' }}">{{ $pageTitle ?? '공지 사항' }}</h1>
                                </div>
                                <span class="text-gray-400 text-sm lg:text-lg">Technical Granite Stage Technology</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs lg:text-sm text-gray-500 flex-wrap">
                                <span data-ko="HOME" data-en="HOME" data-vi="TRANG CHỦ">HOME</span>
                                <span>></span>
                                <span data-ko="공지 사항" data-en="Notices" data-vi="Thông báo">공지 사항</span>
                                <span>></span>
                                <span class="text-blue-600" data-ko="{{ $pageTitle ?? '공지 사항' }}" data-en="{{ $pageTitleEn ?? 'Notices' }}" data-vi="{{ $pageTitleVi ?? 'Thông báo' }}">{{ $pageTitle ?? '공지 사항' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- notice Header -->
                <div class="px-6 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-900"
                            data-ko="{{ $notice->title_ko }}"
                            data-en="{{ $notice->title_en }}"
                            data-vi="{{ $notice->title_vi }}">
                            {{ $notice->title_ko }}
                        </h2>
                    </div>
                </div>

                <!-- notice Content -->
                <div class="px-6 py-8">
                    <div class="space-y-6" data-vi="{!!$notice->content_vi!!}" data-en="{!!$notice->content_en!!}" data-ko="{!!$notice->content_ko!!}">
                        {!! $notice->content_ko !!}
                        <!-- Technical Specifications Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>