<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        <!-- Sidebar -->
        @include('frontend.components.process-sidebar', ['activePage' => $activePage])
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
                                <span data-ko="제품안내" data-en="Products" data-vi="Sản phẩm">제품안내</span>
                                <span>></span>
                                <span class="text-blue-600" data-ko="{{ $pageTitle ?? '제품안내' }}" data-en="{{ $pageTitleEn ?? 'Products' }}" data-vi="{{ $pageTitleVi ?? 'Sản phẩm' }}">{{ $pageTitle ?? '제품안내' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Header -->
                <div class="px-6 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-900"
                            data-ko="{{ $process->process_name_ko }}"
                            data-en="{{ $process->process_name_en }}"
                            data-vi="{{ $process->process_name_vi }}">
                            {{ $process->process_name_ko }}
                        </h2>
                    </div>
                    @if(isset($process['subtitle']))
                    <p class="text-gray-600"
                        data-ko="{{ $process['subtitle_ko'] ?? '' }}"
                        data-en="{{ $process['subtitle_en'] ?? '' }}"
                        data-vi="{{ $process['subtitle_vi'] ?? '' }}">
                        {{ $process['subtitle_ko'] ?? $process['subtitle'] }}
                    </p>
                    @endif
                </div>

                <!-- Product Content -->
                <div class="px-6 py-8">
                    <div class="grid mb-8">
                        <!-- Product Image -->

                        @if(isset($process->image) || isset($process->link))
                        <img
                            src="{{ url($process->image) }}"
                            alt="{{ $process->process_name_ko }}"
                            class="w-80 h-auto rounded-lg shadow-lg">
                        @else
                        <div class="lg:grid-span-2 w-80 h-60 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                            <img src="{{$process->image}}" alt="No Image Available" class="w-full h-full object-cover">
                        </div>
                        @endif


                        <!-- Product Description -->
                    </div>
                    <div class="space-y-6">
                        {!! $process->content !!}
                        <!-- Technical Specifications Table -->
                    </div>
                </div>

                <!-- Related Products -->
                @if(isset($relatedProcesses) && count($relatedProcesses) > 0)
                <div class="mt-8">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-6" data-ko="관련 제품" data-en="Related Products" data-vi="Sản phẩm liên quan">관련 제품</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                            @foreach($relatedProcesses as $relatedProcess)
                            <a href="{{ route('process.detail', ['slug' => $relatedProcess['slug']]) }}">
                                <div class=" text-center group cursor-pointer">
                                    <div class="bg-gray-50 rounded-lg p-4 mb-3 group-hover:bg-blue-50 transition-colors">
                                        @if(isset($relatedProcess['image']) || isset($relatedProcess['link']))
                                        <img src="{{ url($relatedProcess['image']) }}"
                                            alt="{{ $relatedProcess['process_name_ko'] }}"
                                            class="w-full h-16 object-contain mx-auto">
                                        @elseif($category === 'precision' && isset($relatedProcess['icon']))
                                        <div class="h-16 flex items-center justify-center">
                                            @include('frontend.components.process-icons.' . $relatedProcess['icon'])
                                        </div>
                                        @else
                                        <div class="w-full h-16 bg-gradient-to-r from-gray-400 to-gray-600 rounded flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">{{ substr($relatedProcess['ko'], 0, 2) }}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <h4 class="text-sm font-medium text-gray-900 group-hover:text-blue-600 transition-colors"
                                        data-ko="{{ $relatedProcess['process_name_ko'] }}"
                                        data-en="{{ $relatedProcess['process_name_en'] }}"
                                        data-vi="{{ $relatedProcess['process_name_vi'] }}">
                                        {{ $relatedProcess['process_name_ko'] }}
                                    </h4>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Navigation Buttons -->
                <div class="mt-8 flex justify-between">
                    <button onclick="history.back()" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                        <span data-ko="← 이전 페이지" data-en="← Previous Page" data-vi="← Trang trước">← 이전 페이지</span>
                    </button>
                    <a href="{{ route('processes.category', ['category' => $activePage]) }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <span data-ko="목록으로" data-en="Back to List" data-vi="Về danh sách">목록으로</span>
                    </a>
                </div>
            </div>
        </div>