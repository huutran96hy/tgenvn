@extends('Admin.layouts.master')

@section('pageTitle', 'Danh sách Liên Hệ')

@section('content')
    @include('Admin.snippets.page_header')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Danh sách Liên Hệ</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.contacts.index') }}" method="GET" class="mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-md-4">
                            <input type="text" name="search" class="form-control"
                                placeholder="Tìm kiếm theo tên hoặc email" value="{{ request('search') }}">
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <x-table-wrapper-cms :headers="['ID', 'Họ & Tên', 'Email', 'Điện thoại', 'Chủ đề', 'Hành động']">
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->contact_id }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone ?? 'Không có' }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td class="text-center">
                                <x-action-dropdown editRoute="admin.contacts.show" deleteRoute="admin.contacts.destroy"
                                    :id="$contact->contact_id" />
                            </td>
                        </tr>
                    @endforeach
                </x-table-wrapper-cms>

                <x-pagination-links-cms :paginator="$contacts" />
            </div>
        </div>
    </div>
@endsection
