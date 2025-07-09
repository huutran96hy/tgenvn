<div class="bg-white rounded-lg shadow-sm p-8">
    <form id="quoteForm" action="#" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Top row - 4 inline fields -->
        <div class="grid grid-cols-4 gap-3 mb-4">
            <div>
                <label class="inline-block text-sm text-gray-700 mr-2" data-ko="Người gửi" data-en="Name" data-vi="Người gửi">Người gửi</label>
                <input type="text" name="name" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="inline-block text-sm text-gray-700 mr-2" data-ko="Mật khẩu" data-en="Password" data-vi="Mật khẩu">Mật khẩu</label>
                <input type="password" name="password" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="inline-block text-sm text-gray-700 mr-2">Email</label>
                <input type="email" name="email" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="inline-block text-sm text-gray-700 mr-2" data-ko="Trang chủ" data-en="Homepage" data-vi="Trang chủ">Trang chủ</label>
                <input type="url" name="homepage" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>
        </div>

        <!-- Subject field -->
        <div class="mb-4">
            <label class="inline-block text-sm text-gray-700 mr-2" data-ko="Tiêu đề" data-en="Subject" data-vi="Tiêu đề">Tiêu đề</label>
            <input type="text" name="subject" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" required>
        </div>

        <!-- Checkboxes row -->
        <div class="flex items-center gap-6 mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="allow_comments" value="1" checked class="mr-2 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700" data-ko="Cho phép bình luận" data-en="Allow comments" data-vi="Cho phép bình luận">Cho phép bình luận</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="allow_web" value="1" class="mr-2 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700" data-ko="Cho phép liên kết Web" data-en="Allow web links" data-vi="Cho phép liên kết Web">Cho phép liên kết Web</span>
            </label>
            <label class="flex items-center">
                <input type="radio" name="visibility" value="public" checked class="mr-2 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700" data-ko="Public" data-en="Public" data-vi="Public">Public</span>
            </label>
        </div>

        <!-- Form fields with labels on left -->
        <div class="space-y-4 mb-6">
            <!-- Company Name -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="회사명" data-en="Company" data-vi="Công ty">회사명</label>
                <div class="col-span-10">
                    <input type="text" name="company" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <!-- Phone Number -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="전화번호 *" data-en="Phone *" data-vi="Điện thoại *">전화번호 *</label>
                <div class="col-span-10 grid grid-cols-3 gap-2">
                    <input type="text" name="phone1" class="px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" maxlength="3">
                    <input type="text" name="phone2" class="px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" maxlength="4">
                    <input type="text" name="phone3" class="px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" maxlength="4">
                </div>
            </div>

            <!-- Fax -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="팩스" data-en="Fax" data-vi="Fax">팩스</label>
                <div class="col-span-10 grid grid-cols-3 gap-2">
                    <input type="text" name="fax1" class="px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" maxlength="3">
                    <input type="text" name="fax2" class="px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" maxlength="4">
                    <input type="text" name="fax3" class="px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" maxlength="4">
                </div>
            </div>

            <!-- Address -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="주소" data-en="Address" data-vi="Địa chỉ">주소</label>
                <div class="col-span-10">
                    <input type="text" name="address" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <!-- Category -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="구직" data-en="Category" data-vi="Danh mục">구직</label>
                <div class="col-span-10">
                    <input type="text" name="category" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <!-- Email field -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="이메일 *" data-en="Email *" data-vi="Email *">이메일 *</label>
                <div class="col-span-6">
                    <input type="email" name="contact_email" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <!-- Response Method -->
            <div class="grid grid-cols-12 gap-4 items-center">
                <label class="col-span-2 text-sm text-gray-700" data-ko="답변 방법" data-en="Response Method" data-vi="Phương thức phản hồi">답변 방법</label>
                <div class="col-span-4">
                    <select name="response_method" class="w-full px-2 py-1 border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="phone" data-ko="전화" data-en="Phone" data-vi="Điện thoại">전화</option>
                        <option value="email" data-ko="이메일" data-en="Email" data-vi="Email">이메일</option>
                        <option value="both" data-ko="전화+이메일" data-en="Phone+Email" data-vi="Điện thoại+Email">전화+이메일</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Quill Rich Text Editor -->
        <div class="mb-6">
            <div id="quill-toolbar" class="border border-gray-300 rounded-t bg-gray-50">
                <!-- Custom toolbar -->
                <span class="ql-formats">
                    <button class="ql-undo" title="Undo">
                        <svg width="18" height="18" viewBox="0 0 18 18"><path d="M6,3 L6,7 L2,7 L7,12 L12,7 L8,7 L8,3 Z" transform="rotate(180 9 9)"/></svg>
                    </button>
                    <button class="ql-redo" title="Redo">
                        <svg width="18" height="18" viewBox="0 0 18 18"><path d="M6,3 L6,7 L2,7 L7,12 L12,7 L8,7 L8,3 Z" transform="rotate(0 9 9)"/></svg>
                    </button>
                </span>
                
                <span class="ql-formats">
                    <select class="ql-header" title="Tiêu đề">
                        <option value="1">Heading 1</option>
                        <option value="2">Heading 2</option>
                        <option value="3">Heading 3</option>
                        <option selected>Normal</option>
                    </select>
                    <select class="ql-font" title="Kiểu chữ">
                        <option selected>Sans Serif</option>
                        <option value="serif">Serif</option>
                        <option value="monospace">Monospace</option>
                    </select>
                    <select class="ql-size" title="Cỡ chữ">
                        <option value="small">Small</option>
                        <option selected>Normal</option>
                        <option value="large">Large</option>
                        <option value="huge">Huge</option>
                    </select>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-bold" title="Bold"></button>
                    <button class="ql-italic" title="Italic"></button>
                    <button class="ql-underline" title="Underline"></button>
                    <button class="ql-strike" title="Strikethrough"></button>
                    <button class="ql-script" value="super" title="Superscript"></button>
                    <button class="ql-script" value="sub" title="Subscript"></button>
                </span>
                
                <span class="ql-formats">
                    <select class="ql-color" title="Text Color"></select>
                    <select class="ql-background" title="Background Color"></select>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-align" value="" title="Align Left"></button>
                    <button class="ql-align" value="center" title="Align Center"></button>
                    <button class="ql-align" value="right" title="Align Right"></button>
                    <button class="ql-align" value="justify" title="Justify"></button>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-list" value="ordered" title="Numbered List"></button>
                    <button class="ql-list" value="bullet" title="Bullet List"></button>
                    <button class="ql-indent" value="-1" title="Decrease Indent"></button>
                    <button class="ql-indent" value="+1" title="Increase Indent"></button>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-blockquote" title="Quote"></button>
                    <button class="ql-link" title="Link"></button>
                    <button class="ql-image" title="Image"></button>
                    <button class="ql-video" title="Video"></button>
                    <button class="ql-code-block" title="Code Block"></button>
                </span>
                
                <span class="ql-formats">
                    <button class="ql-clean" title="Remove Formatting"></button>
                </span>
                
                <!-- Custom buttons -->
                <span class="ql-formats">
                    <button id="extension-btn" class="ql-extension" title="Thành phần mở rộng">
                        <span style="font-size: 11px; padding: 2px 4px; background: #dbeafe; color: #1d4ed8; border-radius: 3px;">Thành phần mở rộng</span>
                    </button>
                    <button id="html-btn" class="ql-html" title="Kiểu HTML">
                        <span style="font-size: 11px; padding: 2px 4px; background: #dcfce7; color: #166534; border-radius: 3px;">Kiểu HTML</span>
                    </button>
                </span>
            </div>
            
            <div id="quill-editor" class="border border-gray-300 border-t-0 rounded-b" style="height: 300px;"></div>
            <input type="hidden" name="message" id="message-content">
        </div>

        <!-- File Upload Section -->
        <div class="mb-6">
            <div class="grid grid-cols-2 gap-4">
                <!-- Upload Area -->
                <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                    <input type="file" name="attachments[]" multiple class="hidden" id="fileInput">
                    <label for="fileInput" class="cursor-pointer block">
                        <div class="text-gray-400 mb-2">📎</div>
                        <p class="text-xs text-gray-600">파일을 선택하거나 드래그하세요</p>
                    </label>
                </div>
                
                <!-- File Info -->
                <div class="text-xs text-gray-600 space-y-1">
                    <div class="flex items-center">
                        <span class="text-blue-600 mr-2">🗑️</span>
                        <a href="#" class="text-blue-600 hover:underline">Delete Selected</a>
                        <a href="#" class="text-blue-600 hover:underline ml-4">Chọn vào bài viết</a>
                    </div>
                    <p>Dung lượng file đính kèm : 0Byte/ 2.00MB</p>
                    <p>Dung lượng tối đa : 2.00MB (Chỉ được phép đính kèm những File có đuôi được liệt kê trong danh sách. : *.* )</p>
                </div>
            </div>
        </div>

        <!-- Tags Section -->
        <div class="mb-6">
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-600">🏷️</span>
                <input type="text" name="tags" class="flex-1 px-2 py-1 border border-gray-300 rounded text-xs focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>
            <p class="text-xs text-gray-500 mt-1">Bạn có thể thêm vào nhiều Tag bằng cách đặt dấu(,) giữa mỗi Tag.</p>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-center gap-4">
            <button type="button" id="preview-btn" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors text-sm" data-ko="Xem trước" data-en="Preview" data-vi="Xem trước">
                Xem trước
            </button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors text-sm" data-ko="Gửi" data-en="Submit" data-vi="Gửi">
                Gửi
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
        placeholder: '견적 요청 내용을 상세히 입력해 주세요...',
        formats: [
            'header', 'font', 'size',
            'bold', 'italic', 'underline', 'strike', 'script',
            'color', 'background',
            'align', 'list', 'indent',
            'blockquote', 'link', 'image', 'video', 'code-block'
        ]
    });

    // Custom undo/redo functionality
    const undoButton = document.querySelector('.ql-undo');
    const redoButton = document.querySelector('.ql-redo');
    
    undoButton.addEventListener('click', function() {
        quill.history.undo();
    });
    
    redoButton.addEventListener('click', function() {
        quill.history.redo();
    });

    // Custom extension button
    document.getElementById('extension-btn').addEventListener('click', function() {
        alert('Thành phần mở rộng feature');
    });

    // HTML mode toggle
    let htmlMode = false;
    document.getElementById('html-btn').addEventListener('click', function() {
        if (!htmlMode) {
            // Switch to HTML mode
            const htmlContent = quill.root.innerHTML;
            quill.root.innerHTML = `<pre style="white-space: pre-wrap; font-family: monospace; font-size: 12px;">${htmlContent.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</pre>`;
            quill.disable();
            htmlMode = true;
            this.querySelector('span').textContent = 'Visual Mode';
        } else {
            // Switch back to visual mode
            const htmlText = quill.root.textContent;
            quill.enable();
            quill.root.innerHTML = htmlText.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
            htmlMode = false;
            this.querySelector('span').textContent = 'Kiểu HTML';
        }
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
                const reader = new FileReader();
                reader.onload = function(e) {
                    const range = quill.getSelection();
                    quill.insertEmbed(range.index, 'image', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        };
    });

    // File upload handling
    const fileInput = document.getElementById('fileInput');
    
    fileInput.addEventListener('change', function(e) {
        console.log('Files selected:', e.target.files);
        // Handle file upload logic here
    });

    // Preview functionality
    document.getElementById('preview-btn').addEventListener('click', function() {
        const content = quill.root.innerHTML;
        const previewWindow = window.open('', '_blank');
        previewWindow.document.write(`
            <html>
                <head>
                    <title>Preview</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        .preview-content { border: 1px solid #ddd; padding: 20px; }
                    </style>
                </head>
                <body>
                    <h2>Preview Content</h2>
                    <div class="preview-content">${content}</div>
                </body>
            </html>
        `);
    });

    // Form submission
    document.getElementById('quoteForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get Quill content
        const content = quill.root.innerHTML;
        document.getElementById('message-content').value = content;
        
        // Validate form
        if (!content.trim() || content === '<p><br></p>') {
            alert('Vui lòng nhập nội dung tin nhắn');
            return;
        }
        
        // Submit form logic here
        console.log('Form data:', new FormData(this));
        alert('Form submitted successfully!');
    });

    // Auto-save functionality (optional)
    quill.on('text-change', function() {
        const content = quill.root.innerHTML;
        document.getElementById('message-content').value = content;
        // Auto-save to localStorage
        localStorage.setItem('quote-form-content', content);
    });

    // Load saved content on page load
    const savedContent = localStorage.getItem('quote-form-content');
    if (savedContent) {
        quill.root.innerHTML = savedContent;
    }
});
</script>

<style>
/* Custom Quill styling to match the design */
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
    padding: 12px !important;
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

/* Custom button styling */
.ql-extension, .ql-html {
    background: none !important;
    border: 1px solid #d1d5db !important;
    border-radius: 3px !important;
    padding: 2px 4px !important;
}

.ql-extension:hover, .ql-html:hover {
    background: #f3f4f6 !important;
}

/* Hide default Quill snow theme buttons we don't want */
.ql-toolbar .ql-header .ql-picker-label::before {
    content: 'Tiêu đề' !important;
}

.ql-toolbar .ql-font .ql-picker-label::before {
    content: 'Kiểu chữ' !important;
}

.ql-toolbar .ql-size .ql-picker-label::before {
    content: 'Cỡ chữ' !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .ql-toolbar {
        padding: 4px !important;
    }
    
    .ql-toolbar .ql-formats {
        margin-right: 4px !important;
    }
    
    .ql-toolbar button {
        padding: 2px 4px !important;
    }
}
</style>
