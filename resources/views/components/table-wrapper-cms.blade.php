<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @if ($showCheckbox ?? false)
                    <th>
                        <label style="display: flex; gap: 6px; cursor: pointer;width: 100px;">
                            <input type="checkbox" id="check-all">
                            <span>Chọn tất cả</span>
                        </label>
                    </th>
                @endif
                @foreach ($headers as $header)
                    <th style="white-space: nowrap;">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
