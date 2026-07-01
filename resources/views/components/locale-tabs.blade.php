@props([
    'namePrefix' => 'product_name',
    'descPrefix' => 'description',
    'entity' => null,
    'requiredLocales' => ['vi', 'en'],
    'slugSourceLocale' => 'vi',
    'nameLabel' => 'Tên sản phẩm',
    'descLabel' => 'Mô tả ngắn',
    'sectionTitle' => 'Nội dung theo ngôn ngữ',
    'sectionHint' => 'Mỗi tab nhập nội dung đúng ngôn ngữ tương ứng.',
    'namePlaceholders' => [
        'vi' => 'Nhập tên bằng tiếng Việt',
        'en' => 'Enter name in English',
        'ko' => '한국어로 이름을 입력하세요',
    ],
    'descPlaceholders' => [
        'vi' => 'Nhập mô tả bằng tiếng Việt',
        'en' => 'Enter description in English',
        'ko' => '한국어로 설명을 입력하세요',
    ],
])

@php
    $locales = [
        'vi' => ['label' => 'Tiếng Việt', 'badge' => 'VI'],
        'en' => ['label' => 'English', 'badge' => 'EN'],
        'ko' => ['label' => '한국어', 'badge' => 'KO'],
    ];
    $tabPrefix = str_replace('_', '-', $namePrefix);
@endphp

<div class="locale-tabs-wrapper border rounded p-3 bg-light bg-opacity-50">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div>
            <h6 class="mb-1">{{ $sectionTitle }}</h6>
            <p class="text-muted mb-0 fs-sm">{{ $sectionHint }}</p>
        </div>
    </div>

    <ul class="nav nav-tabs nav-tabs-highlight mb-0" role="tablist">
        @foreach ($locales as $code => $locale)
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link {{ $loop->first ? 'active' : '' }}"
                    id="locale-tab-{{ $tabPrefix }}-{{ $code }}"
                    data-bs-toggle="tab"
                    data-bs-target="#locale-pane-{{ $tabPrefix }}-{{ $code }}"
                    type="button"
                    role="tab"
                    aria-controls="locale-pane-{{ $tabPrefix }}-{{ $code }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                >
                    <span class="badge bg-secondary bg-opacity-10 text-body me-1">{{ $locale['badge'] }}</span>
                    {{ $locale['label'] }}
                    @if (in_array($code, $requiredLocales, true))
                        <span class="text-danger">*</span>
                    @endif
                </button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content border border-top-0 rounded-bottom bg-white p-3">
        @foreach ($locales as $code => $locale)
            @php
                $nameField = "{$namePrefix}_{$code}";
                $descField = "{$descPrefix}_{$code}";
                $nameValue = old($nameField, $entity?->{$nameField} ?? '');
                $descValue = old($descField, $entity?->{$descField} ?? '');
                $isRequired = in_array($code, $requiredLocales, true);
            @endphp

            <div
                class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                id="locale-pane-{{ $tabPrefix }}-{{ $code }}"
                role="tabpanel"
                aria-labelledby="locale-tab-{{ $tabPrefix }}-{{ $code }}"
            >
                <div class="mb-3">
                    <label class="form-label" for="{{ $nameField }}">
                        {{ $nameLabel }}
                        @if ($isRequired)
                            <span class="text-danger">*</span>
                        @endif
                    </label>
                    <input
                        type="text"
                        id="{{ $nameField }}"
                        name="{{ $nameField }}"
                        class="form-control {{ $code === $slugSourceLocale ? 'slug-source' : '' }}"
                        value="{{ $nameValue }}"
                        placeholder="{{ $namePlaceholders[$code] ?? '' }}"
                        @if ($isRequired) required @endif
                    >
                    @error($nameField)
                        <div class="text-danger fs-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label class="form-label" for="{{ $descField }}">{{ $descLabel }}</label>
                    <textarea
                        id="{{ $descField }}"
                        name="{{ $descField }}"
                        class="form-control"
                        rows="4"
                        placeholder="{{ $descPlaceholders[$code] ?? '' }}"
                    >{{ $descValue }}</textarea>
                    @error($descField)
                        <div class="text-danger fs-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
</div>
