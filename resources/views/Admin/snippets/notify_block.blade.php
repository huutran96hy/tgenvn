{{-- Notification --}}
@if (session('success'))
    <div class="alert alert-success" style="margin: 10px">
        {{ session('success') }}
    </div>
@elseif (session('error'))
    <div class="alert alert-danger" style="margin: 10px">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
