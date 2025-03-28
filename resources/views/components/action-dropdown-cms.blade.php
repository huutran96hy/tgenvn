<div class="d-flex">
    <a href="{{ route($editRoute, $id) }}" class="me-3">
        <i class="ph-pencil"></i>
    </a>
    <form action="{{ route($deleteRoute, $id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-danger" style="background: unset;border: none;">
            <i class="ph-trash"></i>
        </button>
    </form>
</div>
