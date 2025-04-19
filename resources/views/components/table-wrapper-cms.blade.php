<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
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
