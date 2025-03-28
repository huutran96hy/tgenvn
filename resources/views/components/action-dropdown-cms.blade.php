<div class="dropdown">
    <a href="#" class="text-body" data-bs-toggle="dropdown">
        <i class="ph-list"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route($editRoute, $id) }}">
                <i class="ph-pencil me-2"></i> Sửa
            </a>
        </li>
        <li>
            <form action="{{ route($deleteRoute, $id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger">
                    <i class="ph-trash me-2"></i> Xóa
                </button>
            </form>
        </li>
    </ul>
</div>