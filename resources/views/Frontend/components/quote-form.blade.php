<div class="bg-white rounded-lg shadow-sm p-4 sm:p-8">
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ session('success') }}
                    </p>
                    @if(session('quote_id'))
                        <p class="text-sm text-green-700 mt-1">
                            요청 번호: <strong>{{ session('quote_id') }}</strong>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-red-800">
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">입력 오류가 있습니다:</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form id="quoteForm" action="{{ route('quote.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Top row - 4 inline fields -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
           
            
        </div>

        <!-- Subject field -->
        <div class="mb-4">
            <label class="block text-sm text-gray-700 mb-1" data-ko="제목" data-en="Subject" data-vi="Tiêu đề">제목 *</label>
            <input type="text" name="subject" value="{{ old('subject') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('subject') border-red-500 @enderror" required>
            @error('subject')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Checkboxes row -->
        <div class="flex flex-wrap items-center gap-4 sm:gap-6 mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="allow_comments" value="1" {{ old('allow_comments') ? 'checked' : '' }} class="mr-2 text-blue-600 focus:ring-blue-500 rounded">
                <span class="text-sm text-gray-700" data-ko="댓글 허용" data-en="Allow comments" data-vi="Cho phép bình luận">댓글 허용</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="allow_web" value="1" {{ old('allow_web') ? 'checked' : '' }} class="mr-2 text-blue-600 focus:ring-blue-500 rounded">
                <span class="text-sm text-gray-700" data-ko="웹 링크 허용" data-en="Allow web links" data-vi="Cho phép liên kết Web">웹 링크 허용</span>
            </label>
            <label class="flex items-center">
                <input type="radio" name="visibility" value="public" {{ old('visibility', 'public') === 'public' ? 'checked' : '' }} class="mr-2 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700" data-ko="공개" data-en="Public" data-vi="Công khai">공개</span>
            </label>
            <label class="flex items-center">
                <input type="radio" name="visibility" value="private" {{ old('visibility') === 'private' ? 'checked' : '' }} class="mr-2 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700" data-ko="비공개" data-en="Private" data-vi="Riêng tư">비공개</span>
            </label>
        </div>

        <!-- Form fields with labels on left -->

        <div class="space-y-4 mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="이름" data-en="Name" data-vi="Tên">이름 *</label>
                <div class="sm:col-span-10">
                    <input type="text" name="company" value="{{ old('company') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company') border-red-500 @enderror">
                    @error('company')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Company Name -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="회사명" data-en="Company" data-vi="Công ty">회사명</label>
                <div class="sm:col-span-10">
                    <input type="text" name="company" value="{{ old('company') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company') border-red-500 @enderror">
                    @error('company')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Phone Number -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="전화번호" data-en="Phone" data-vi="Điện thoại">전화번호</label>
                <div class="sm:col-span-10 grid grid-cols-3 gap-2">
                    <input type="text" name="phone1" value="{{ old('phone1') }}" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="3" placeholder="010">
                    <input type="text" name="phone2" value="{{ old('phone2') }}" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="4" placeholder="1234">
                    <input type="text" name="phone3" value="{{ old('phone3') }}" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="4" placeholder="5678">
                </div>
            </div>

            <!-- Fax -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="팩스" data-en="Fax" data-vi="Fax">팩스</label>
                <div class="sm:col-span-10 grid grid-cols-3 gap-2">
                    <input type="text" name="fax1" value="{{ old('fax1') }}" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="3" placeholder="02">
                    <input type="text" name="fax2" value="{{ old('fax2') }}" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="4" placeholder="1234">
                    <input type="text" name="fax3" value="{{ old('fax3') }}" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" maxlength="4" placeholder="5678">
                </div>
            </div>

            <!-- Address -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="주소" data-en="Address" data-vi="Địa chỉ">주소</label>
                <div class="sm:col-span-10">
                    <input type="text" name="address" value="{{ old('address') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror">
                    @error('address')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Category -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="카테고리" data-en="Category" data-vi="Danh mục">카테고리</label>
                <div class="sm:col-span-10">
                    <input type="text" name="category" value="{{ old('category') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror">
                    @error('category')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Contact Email field -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="연락처 이메일" data-en="Contact Email" data-vi="Email liên hệ">연락처 이메일 *</label>
                <div class="sm:col-span-6">
                    <input type="email" name="contact_email" value="{{ old('contact_email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('contact_email') border-red-500 @enderror" required>
                    @error('contact_email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Response Method -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 sm:gap-4 items-start sm:items-center">
                <label class="sm:col-span-2 text-sm text-gray-700 font-medium" data-ko="답변 방법" data-en="Response Method" data-vi="Phương thức phản hồi">답변 방법 *</label>
                <div class="sm:col-span-4">
                    <select name="response_method" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('response_method') border-red-500 @enderror" required>
                        <option value="">선택해주세요</option>
                        <option value="phone" {{ old('response_method') === 'phone' ? 'selected' : '' }} data-ko="전화" data-en="Phone" data-vi="Điện thoại">전화</option>
                        <option value="email" {{ old('response_method') === 'email' ? 'selected' : '' }} data-ko="이메일" data-en="Email" data-vi="Email">이메일</option>
                        <option value="both" {{ old('response_method') === 'both' ? 'selected' : '' }} data-ko="전화+이메일" data-en="Phone+Email" data-vi="Điện thoại+Email">전화+이메일</option>
                    </select>
                    @error('response_method')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Quill Rich Text Editor -->
        <div class="mb-6">
            <label class="block text-sm text-gray-700 font-medium mb-2">요청 내용 *</label>
            <div id="quill-toolbar" class="border border-gray-300 rounded-t bg-gray-50">
                <!-- Custom toolbar -->
                <span class="ql-formats">
                    <button class="ql-undo" title="실행 취소">
                        <svg width="18" height="18" viewBox="0 0 18 18"><path d="M6,3 L6,7 L2,7 L7,12 L12,7 L8,7 L8,3 Z" transform="rotate(180 9 9)"/></svg>
                    </button>
                    <button class="ql-redo" title="다시 실행">
                        <svg width="18" height="18" viewBox="0 0 18 18"><path d="M6,3 L6,7 L2,7 L7,12 L12,7 L8,7 L8,3 Z" transform="rotate(0 9 9)"/></svg>
                    </button>
                </span>
                
                <span class="ql-formats">
                    <select class="ql-header" title="제목">
                        <option value="1">제목 1</option>
                        <option value="2">제목 2</option>
                        <option value="3">제목 3</option>
                        <option selected>일반</option>
                    </select>
                    <select class="ql-font" title="글꼴">
                        <option selected>Sans Serif</option>
                        <option value="serif">Serif</option>
                        <option value="monospace">Monospace</option>
                    </select>
                    <select class="ql-size" title="크기">
                        <option value="small">작게</option>
                        <option selected>보통</option>
                        <option value="large">크게</option>
                        <option value="huge">매우 크게</option>
                    </select>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-bold" title="굵게"></button>
                    <button class="ql-italic" title="기울임"></button>
                    <button class="ql-underline" title="밑줄"></button>
                    <button class="ql-strike" title="취소선"></button>
                </span>
                
                <span class="ql-formats">
                    <select class="ql-color" title="글자 색상"></select>
                    <select class="ql-background" title="배경 색상"></select>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-align" value="" title="왼쪽 정렬"></button>
                    <button class="ql-align" value="center" title="가운데 정렬"></button>
                    <button class="ql-align" value="right" title="오른쪽 정렬"></button>
                    <button class="ql-align" value="justify" title="양쪽 정렬"></button>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-list" value="ordered" title="번호 목록"></button>
                    <button class="ql-list" value="bullet" title="글머리 목록"></button>
                    <button class="ql-indent" value="-1" title="내어쓰기"></button>
                    <button class="ql-indent" value="+1" title="들여쓰기"></button>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-blockquote" title="인용"></button>
                    <button class="ql-link" title="링크"></button>
                    <button class="ql-image" title="이미지"></button>
                    <button class="ql-code-block" title="코드 블록"></button>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-clean" title="서식 제거"></button>
                </span>
            </div>
            
            <div id="quill-editor" class="border border-gray-300 border-t-0 rounded-b @error('message') border-red-500 @enderror" style="min-height: 300px;"></div>
            <input type="hidden" name="message" id="message-content" value="{{ old('message') }}">
            @error('message')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- File Upload Section -->
        <div class="mb-6">
            <label class="block text-sm text-gray-700 font-medium mb-2">첨부파일</label>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Upload Area -->
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                    <input type="file" name="attachments[]" multiple class="hidden" id="fileInput" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.txt,.zip">
                    <label for="fileInput" class="cursor-pointer block">
                        <div class="text-gray-400 mb-2">
                            <svg class="mx-auto h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-600">파일을 선택하거나 드래그하세요</p>
                        <p class="text-xs text-gray-500 mt-1">최대 2MB, jpg, png, pdf, doc, txt, zip 파일</p>
                    </label>
                </div>
                
                <!-- File Info -->
                <div class="text-sm text-gray-600 space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">업로드된 파일</span>
                        <button type="button" id="clearFiles" class="text-red-600 hover:text-red-800 text-xs">모두 삭제</button>
                    </div>
                    <div id="fileList" class="space-y-1 max-h-32 overflow-y-auto">
                        <!-- Files will be listed here -->
                    </div>
                    <div class="text-xs text-gray-500 pt-2 border-t">
                        <p>• 파일 크기: <span id="totalSize">0KB</span> / 2MB</p>
                        <p>• 허용 형식: jpg, jpeg, png, pdf, doc, docx, txt, zip</p>
                    </div>
                </div>
            </div>
            @error('attachments.*')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tags Section -->
        <div class="mb-6">
            <label class="block text-sm text-gray-700 font-medium mb-2">태그</label>
            <div class="flex items-center gap-2">
                <span class="text-gray-400">🏷️</span>
                <input type="text" name="tags" value="{{ old('tags') }}" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tags') border-red-500 @enderror" placeholder="태그를 쉼표(,)로 구분하여 입력하세요">
            </div>
            <p class="text-xs text-gray-500 mt-1">예: 견적요청, 긴급, 대량주문</p>
            @error('tags')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
            <button type="button" id="preview-btn" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" data-ko="미리보기" data-en="Preview" data-vi="Xem trước">
                📄 미리보기
            </button>
            <button type="submit" id="submit-btn" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed" data-ko="견적 요청" data-en="Submit Quote" data-vi="Gửi báo giá">
                <span class="submit-text">📨 견적 요청</span>
                <span class="loading-text hidden">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    전송 중...
                </span>
            </button>
        </div>
    </form>
</div>

<!-- Quill.js CSS and JS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill editor
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        modules: {
            toolbar: '#quill-toolbar',
            history: {
                delay: 1000,
                maxStack: 50,
                userOnly: false
            }
        },
        placeholder: '견적 요청 내용을 상세히 입력해 주세요...\n\n예시:\n- 제품명 및 사양\n- 수량\n- 납기 희망일\n- 특별 요구사항',
        formats: [
            'header', 'font', 'size',
            'bold', 'italic', 'underline', 'strike',
            'color', 'background',
            'align', 'list', 'indent',
            'blockquote', 'link', 'image', 'code-block'
        ]
    });

    // Load saved content
    const savedContent = '{{ old("message") }}';
    if (savedContent) {
        quill.root.innerHTML = savedContent;
    }

    // Custom undo/redo functionality
    const undoButton = document.querySelector('.ql-undo');
    const redoButton = document.querySelector('.ql-redo');
    
    undoButton.addEventListener('click', function() {
        quill.history.undo();
    });
    
    redoButton.addEventListener('click', function() {
        quill.history.redo();
    });

    // Image upload handler
    quill.getModule('toolbar').addHandler('image', function() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = function() {
            const file = input.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('이미지 크기는 2MB 이하여야 합니다.');
                    return;
                }

                const formData = new FormData();
                formData.append('image', file);
                formData.append('_token', document.querySelector('input[name="_token"]').value);

                // Show loading
                const range = quill.getSelection();
                quill.insertText(range.index, '이미지 업로드 중...', 'italic', true);

                fetch('{{ route("quote.upload-image") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Remove loading text
                    quill.deleteText(range.index, '이미지 업로드 중...'.length);
                    
                    if (data.success) {
                        quill.insertEmbed(range.index, 'image', data.url);
                    } else {
                        alert(data.message || '이미지 업로드에 실패했습니다.');
                    }
                })
                .catch(error => {
                    quill.deleteText(range.index, '이미지 업로드 중...'.length);
                    alert('이미지 업로드 중 오류가 발생했습니다.');
                });
            }
        };
    });

    // File upload handling
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    const totalSizeSpan = document.getElementById('totalSize');
    const clearFilesBtn = document.getElementById('clearFiles');
    let uploadedFiles = [];

    fileInput.addEventListener('change', function(e) {
        handleFiles(e.target.files);
    });

    // Drag and drop
    const dropZone = fileInput.parentElement;
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('border-blue-400', 'bg-blue-50');
    });

    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-blue-400', 'bg-blue-50');
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-blue-400', 'bg-blue-50');
        handleFiles(e.dataTransfer.files);
    });

    function handleFiles(files) {
        const maxSize = 2 * 1024 * 1024; // 2MB
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain', 'application/zip'];
        
        Array.from(files).forEach(file => {
            if (file.size > maxSize) {
                alert(`${file.name}: 파일 크기가 2MB를 초과합니다.`);
                return;
            }

            if (!allowedTypes.includes(file.type)) {
                alert(`${file.name}: 허용되지 않는 파일 형식입니다.`);
                return;
            }

            uploadedFiles.push(file);
        });

        updateFileList();
        updateFileInput();
    }

    function updateFileList() {
        fileList.innerHTML = '';
        let totalSize = 0;

        uploadedFiles.forEach((file, index) => {
            totalSize += file.size;
            
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center justify-between p-2 bg-gray-50 rounded text-xs';
            fileItem.innerHTML = `
                <div class="flex items-center">
                    <span class="mr-2">${getFileIcon(file.type)}</span>
                    <span class="truncate">${file.name}</span>
                    <span class="ml-2 text-gray-500">(${formatFileSize(file.size)})</span>
                </div>
                <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700 ml-2">×</button>
            `;
            fileList.appendChild(fileItem);
        });

        totalSizeSpan.textContent = formatFileSize(totalSize);
    }

    function updateFileInput() {
        const dt = new DataTransfer();
        uploadedFiles.forEach(file => dt.items.add(file));
        fileInput.files = dt.files;
    }

    window.removeFile = function(index) {
        uploadedFiles.splice(index, 1);
        updateFileList();
        updateFileInput();
    };

    clearFilesBtn.addEventListener('click', function() {
        uploadedFiles = [];
        updateFileList();
        updateFileInput();
    });

    function getFileIcon(mimeType) {
        if (mimeType.startsWith('image/')) return '🖼️';
        if (mimeType === 'application/pdf') return '📄';
        if (mimeType.includes('word')) return '📝';
        if (mimeType === 'text/plain') return '📃';
        if (mimeType === 'application/zip') return '📦';
        return '📎';
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0KB';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + sizes[i];
    }

    // Preview functionality
    document.getElementById('preview-btn').addEventListener('click', function() {
        const content = quill.root.innerHTML;
        if (!content.trim() || content === '<p><br></p>') {
            alert('미리볼 내용이 없습니다.');
            return;
        }

        const previewWindow = window.open('', '_blank', 'width=800,height=600');
        previewWindow.document.write(`
            <!DOCTYPE html>
            <html lang="ko">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>견적 요청 미리보기</title>
                <style>
                    body { 
                        font-family: 'Malgun Gothic', Arial, sans-serif; 
                        padding: 20px; 
                        line-height: 1.6;
                        max-width: 800px;
                        margin: 0 auto;
                    }
                    .preview-header {
                        border-bottom: 2px solid #e5e7eb;
                        padding-bottom: 15px;
                        margin-bottom: 20px;
                    }
                    .preview-content { 
                        border: 1px solid #ddd; 
                        padding: 20px; 
                        border-radius: 8px;
                        background: #f9fafb;
                    }
                    .close-btn {
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        background: #ef4444;
                        color: white;
                        border: none;
                        padding: 10px 15px;
                        border-radius: 5px;
                        cursor: pointer;
                    }
                </style>
            </head>
            <body>
                <button class="close-btn" onclick="window.close()">닫기</button>
                <div class="preview-header">
                    <h2>📄 견적 요청 미리보기</h2>
                    <p style="color: #6b7280; margin: 0;">작성일: ${new Date().toLocaleString('ko-KR')}</p>
                </div>
                <div class="preview-content">${content}</div>
            </body>
            </html>
        `);
        previewWindow.document.close();
    });

    // Form submission
    document.getElementById('quoteForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get Quill content
        const content = quill.root.innerHTML;
        document.getElementById('message-content').value = content;
        
        // Validate form
        if (!content.trim() || content === '<p><br></p>') {
            alert('요청 내용을 입력해주세요.');
            quill.focus();
            return;
        }

        // Show loading state
        const submitBtn = document.getElementById('submit-btn');
        const submitText = submitBtn.querySelector('.submit-text');
        const loadingText = submitBtn.querySelector('.loading-text');
        
        submitBtn.disabled = true;
       
        loadingText.classList.remove('hidden');

        // Submit form
        this.submit();
    });

    // Auto-save functionality
    let autoSaveTimeout;
    quill.on('text-change', function() {
        const content = quill.root.innerHTML;
        document.getElementById('message-content').value = content;
        
        // Auto-save to localStorage with debounce
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(() => {
            localStorage.setItem('quote-form-content', content);
        }, 1000);
    });

    // Load auto-saved content on page load
    const autoSavedContent = localStorage.getItem('quote-form-content');

    // Clear auto-save on successful submission
    if (document.querySelector('.bg-green-50')) {
        localStorage.removeItem('quote-form-content');
    }

    // Phone number formatting
    const phoneInputs = document.querySelectorAll('input[name^="phone"], input[name^="fax"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });
});
</script>

<style>
/* Custom Quill styling */
.ql-toolbar {
    border: 1px solid #d1d5db !important;
    border-bottom: none !important;
    background: #f9fafb !important;
    border-radius: 0.375rem 0.375rem 0 0 !important;
    padding: 8px !important;
}

.ql-container {
    border: 1px solid #d1d5db !important;
    border-top: none !important;
    border-radius: 0 0 0.375rem 0.375rem !important;
    font-size: 14px !important;
}

.ql-editor {
    min-height: 300px !important;
    padding: 15px !important;
    font-family: 'Malgun Gothic', Arial, sans-serif !important;
}

.ql-toolbar .ql-formats {
    margin-right: 8px !important;
}

.ql-toolbar button {
    padding: 4px 6px !important;
    margin: 1px !important;
    border-radius: 3px !important;
}

.ql-toolbar button:hover {
    background: #e5e7eb !important;
}

.ql-toolbar button.ql-active {
    background: #dbeafe !important;
    color: #1d4ed8 !important;
}

.ql-toolbar select {
    font-size: 12px !important;
    padding: 2px 4px !important;
    margin: 1px !important;
    border-radius: 3px !important;
}

/* Error state styling */
.border-red-500 .ql-toolbar {
    border-color: #ef4444 !important;
}

.border-red-500 .ql-container {
    border-color: #ef4444 !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .ql-toolbar {
        padding: 6px !important;
        flex-wrap: wrap;
    }
    
    .ql-toolbar .ql-formats {
        margin-right: 4px !important;
        margin-bottom: 4px;
    }
    
    .ql-toolbar button {
        padding: 3px 5px !important;
    }
    
    .ql-editor {
        padding: 12px !important;
        min-height: 250px !important;
    }
}

/* Loading animation */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* File upload styling */
.border-dashed:hover {
    border-color: #3b82f6;
    background-color: #eff6ff;
}

/* Success/Error message styling */
.bg-green-50 {
    animation: slideDown 0.3s ease-out;
}

.bg-red-50 {
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
