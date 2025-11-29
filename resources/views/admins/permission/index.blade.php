@extends('layout.master')
@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 ">جدول الصلاحيات</div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    <i class="bi bi-plus fs-5"></i> اضافة صلاحية
                </button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%" dir="rtl">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الصلاحية</th>
                            <th>نوع المستخدم</th>
                            <th>وصف الصلاحية</th>
                            <th>تاريخ الانشاء</th>
                            <th>تاريخ اخر تعديل</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end page main-->
    <!-- Create Model Start -->
    <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="createForm" action="{{ route('admins.permission.createPermission') }}">
                    <div class="modal-header">
                        <h5 class="modal-title">انشاء صلاحية جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mb-3">
                            <label for="new_name" class="mb-2">اسم الصلاحية</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="اسم الصلاحية">
                        </div>
                        <div class="mb-3">
                            <label for="new_name" class="mb-2">وصف الصلاحية</label>
                            <textarea name="permission_description" id="permission_description" placeholder="وصف الصلاحية"
                                class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="new_stage" class="mb-2">نوع المستخدم</label>
                            <select name="guard_name" id="guard_name" class="form-control">
                                <option value="" disabled selected>اختر المستخدم</option>
                                @foreach ($guards as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="new_stage" class="mb-2">نوع الصلاحية</label>
                            <select name="group_permission" id="group_permission" class="form-control">
                                <option value="" disabled selected>اختر المستخدم</option>
                                @foreach ($models as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">انشاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Create Model End -->
    <!-- View modal Start -->
    <div class="modal fade" id="view" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="viewForm">
                    <div class="modal-header">
                        <h5 class="card-title mb-3 text-center fw-bold text-primary">
                            بيانات الصلاحية
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="view_id">
                        <div id="view-data"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- View modal End -->
     <!-- delete modal Start -->
	<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="deleteForm" action="{{ route('admins.permission.deletePermission') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-header">
						<h5 class="modal-title">حذف مسؤول</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" id="delete_id">
						<div id="text"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">حذف</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- delete modal End -->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ route('admins.permission.getPermissionData') }}',
                    dataSrc: 'data',
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'guard_name', name: 'guard_name' },
                    { data: 'permission_description', name: 'permission_description' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' },
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json'
                },
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
            });
        });
        $(document).on('click', '.view', function (e) {
            let id = $(this).data('id');
            $.get(`/admins/permission/showPermissionInfo/${id}`, function (data) {
                let permission = data.permission;
              
                if(permission.guard_name == 'admins') permission.guard_name = 'مسؤول';
                else if(permission.guard_name == 'freelancers') permission.guard_name = 'مستقل';
                else permission.guard_name = 'عميل';
                
                if(!permission.permission_description) permission.permission_description = 'لا يوجد';
                $('#view_id').val(permission.id);
                $('#view-data').html(`
                     <div class="card shadow-sm border-0" style="border-radius: 18px;">
                        <div class="card-body text-center">
                                     <div class="text-start px-3">
                                             <div class="mb-3">
                                                     <label class="fw-bold text-muted">اسم الصلاحية:</label>
                                                    <div class="text-dark">${permission.name}</div>
                                            </div>
                                             <div class="mb-3">
                                                     <label class="fw-bold text-muted">نوع المستخدم:</label>
                                                    <div class="text-dark">${permission.guard_name}</div>
                                            </div>
                                            <div class="mb-3">
                                                 <label class="fw-bold text-muted">وصف الصلاحية:</label>
                                                <div class="text-dark">${permission.permission_description}</div>
                                            </div>
                                            <div class="mb-3">
                                                 <label class="fw-bold text-muted">تاريخ الانشاء:</label>
                                                <div class="text-dark">${permission.created_at}</div>
                                            </div>

                                            <div class="mb-3">
                                                 <label class="fw-bold text-muted">تاريخ آخر تعديل:</label>
                                                <div class="text-dark">${permission.updated_at}</div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                                        `);
                $('#view').modal('show');
            });
        });
        $(document).on('click', '.delete', function (e) {
			let id = $(this).data('id');
			$.get(`/admins/permission/showPermissionInfo/${id}`, function (data) {
				let permission = data.permission;
				$('#delete_id').val(permission.id);
				$('#text').html('هل أنت متأكد من رغبة حذف ' + '<strong><u>' + permission.name + '</u></strong>' + "؟");
				$('#delete').modal('show');
			});
		});
        $(document).on('click', '.edit', function (e) {
			let id = $(this).data('id');
			$.get(`/admins/showPermissionInfo/${id}`, function (data) {
				const admin = data.permission;
				$('#id').val(admin.id);
				$('#editname').val(admin.name);
				$('#editemail').val(admin.email);
				$('#editpassword').val();
				$('#edit').modal('show');
			});
		});

    </script>
@endsection