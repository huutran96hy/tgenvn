<div class="d-flex justify-content-center mt-3">
    {{ $paginator->appends(request()->query())->links('Admin.pagination.custom') }}
</div>
