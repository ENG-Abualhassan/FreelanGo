@extends('layout.master')
@section('content')

	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3 ">جدول المسؤولون</div>
		<div class="ms-auto">
			<div class="btn-group">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
					<i class="bi bi-plus fs-5"></i> اضافة مسؤول
				</button>
			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="row mt-3 mb-4 filter-box">

		<div class="col-md-3">
			<label class="form-label">الاسم</label>
			<div class="input-icon">
				<i class="bi bi-person"></i>
				<input type="text" id="filter_name" class="form-control filter-input" placeholder="ابحث بالاسم">
			</div>
		</div>

		<div class="col-md-3">
			<label class="form-label">البريد الإلكتروني</label>
			<div class="input-icon">
				<i class="bi bi-envelope"></i>
				<input type="text" id="filter_email" class="form-control filter-input" placeholder="ابحث بالبريد">
			</div>
		</div>

		<!-- <div class="col-md-3">
								<label class="form-label">الرتبة</label>
								<div class="input-icon-select">
									<i class="bi bi-award"></i>
									<select id="filter_role" class="form-select filter-input">
										<option value="">الكل</option>
										<option value="super-admin">Super Admin</option>
										<option value="admin">Admin</option>
									</select>
								</div>
							</div> -->

		<!-- <div class="col-md-3">
								<label class="form-label">الحالة</label>
								<div class="input-icon-select">
									<i class="bi bi-toggle-on"></i>
									<select id="filter_status" class="form-select filter-input">
										<option value="">الكل</option>
										<option value="active">نشط</option>
										<option value="inactive">غير نشط</option>
									</select>
								</div>
							</div> -->
		<div class="col-md-2 mt-3 d-flex gap-2 justify-content-center align-items-center">
			<button type="button" id="apply-filter" class="btn btn-primary w-100">
				<i class="bi bi-funnel-fill"></i> فلتر
			</button>
			<button type="button" id="reset-filter" class="btn btn-secondary w-100">
				<i class="bi bi-arrow-counterclockwise"></i> حذف
			</button>
		</div>


	</div>

	<hr />
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="dataTable" class="table table-striped table-bordered" style="width:100%" dir="rtl">
					<thead>
						<tr>
							<th>#</th>
							<th>الاسم</th>
							<th>الايميل</th>
							<th>تاريخ الانضمام</th>
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
	<!-- Create Model Start -->
	<div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="createForm">
					<div class="modal-header">
						<h5 class="modal-title">انشاء مسؤول جديد</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="mb-3">
							<label for="new_name" class="mb-2">الاسم كامل</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="الاسم كامل">
						</div>
						<div class="mb-3">
							<label for="new_stage" class="mb-2">الايميل الشخصي</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="الايميل">
						</div>
						<div class="mb-3">
							<label for="new_stage" class="mb-2">كلمة مرور</label>
							<input type="password" name="password" id="password" class="form-control"
								placeholder="اضف كلمة مرور قوية">
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
	<!-- Edit Model Start -->
	<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="editForm">
					<div class="modal-header">
						<h5 class="modal-title">تعديل المسؤول </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" id="id">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="mb-3">
							<label for="new_name" class="mb-2">الاسم كامل</label>
							<input type="text" name="editname" id="editname" class="form-control" placeholder="الاسم كامل">
						</div>
						<div class="mb-3">
							<label for="new_stage" class="mb-2">الايميل الشخصي</label>
							<input type="email" name="editemail" id="editemail" class="form-control" placeholder="الايميل">
						</div>
						<div class="mb-3">
							<label for="new_stage" class="mb-2">كلمة مرور</label>
							<input type="password" name="editpassword" id="editpassword" class="form-control"
								placeholder="اضف كلمة مرور قوية">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-purple">تعديل</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Model End -->
	<!-- delete modal Start -->
	<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="deleteForm">
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
	<!-- View modal Start -->
	<div class="modal fade" id="view" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="viewForm">
					<div class="modal-header">
						<h5 class="card-title mb-3 text-center fw-bold text-primary">
							بيانات المسؤول
						</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" id="view_id">
						<div id="view-data"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">عرض البروفايل </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- View modal End -->


	<!--end page main-->

@endsection
@section('js')
	<script>
		$(document).ready(function () {
			var table = $('#dataTable').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				ajax: {
					url: '{{ route('admins.getAdminData') }}',
					data: function (data) {
						data.name = $('#filter_name').val().trim();
						data.email = $('#filter_email').val().trim();
					},
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
					{ data: 'name', name: 'name' },
					{ data: 'email', name: 'email' },
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
			$('#apply-filter').on('click', function () {
				table.ajax.reload();
			});
			$('#reset-filter').on('click', function () {
				$('#filter_name').val('');
				$('#filter_email').val('');
				table.search('').columns().search('').draw();
			});
		});
		$('#createForm').on('submit', function (e) {
			e.preventDefault();
			let formData = {
				name: $('#name').val().trim(),
				email: $('#email').val().trim(),
				password: $('#password').val(),
				_token: '{{ csrf_token() }}',
			};
			$.ajax({
				url: '{{ route("admins.createAdmin") }}',
				type: 'post',
				data: formData,
				success: function () {
					notyf.success('تم انشاء مسؤول بنجاح');
					$('#create').modal('hide');
					$('#dataTable').DataTable().ajax.reload();
				},
				error: function (xhr) {
					$('.error-text').remove();
					if (xhr.status === 422) {
						let errors = xhr.responseJSON.errors;
						$.each(errors, function (key, value) {
							$('#' + key).after('<span class="error-text" style="color:red;">' + value[0] + '</span>');
							$('#' + key).next('.error-text').fadeIn(300);
						});
					}
				},
			});
		});
		$(document).on('click', '.edit', function (e) {
			let id = $(this).data('id');
			$.get(`/admins/showAdminInfo/${id}`, function (data) {
				const admin = data.admin;
				$('#id').val(admin.id);
				$('#editname').val(admin.name);
				$('#editemail').val(admin.email);
				$('#editpassword').val();
				$('#edit').modal('show');
			});
		});
		$('#editForm').on('submit', function (e) {
			e.preventDefault();
			let id = $('#id').val();
			let formData = {
				id: $('#id').val(),
				editname: $('#editname').val().trim(),
				editemail: $('#editemail').val().trim(),
				editpassword: $('#editpassword').val(),
				_token: '{{ csrf_token() }}'
			};
			$.ajax({
				url: '{{ route('admins.editAdmin') }}',
				type: 'post',
				data: formData,
				success: function () {
					notyf.success('تم تعديل المسؤول بنجاح');
					$('#edit').modal('hide');
					$('#dataTable').DataTable().ajax.reload();
				},
				error: function (xhr) {
					$('.error-text').remove();
					if (xhr.status === 422) {
						let errors = xhr.responseJSON.errors;
						$.each(errors, function (key, value) {
							$('#' + key).after('<span class="error-text" style="color:red;">' + value[0] + '</span>');
							$('#' + key).next('.error-text').fadeIn(300);
						});
					}
				},
			});
		});
		$(document).on('click', '.delete', function (e) {
			let id = $(this).data('id');
			$.get(`/admins/showAdminInfo/${id}`, function (data) {
				let admin = data.admin;
				$('#delete_id').val(admin.id);
				$('#text').html('هل أنت متأكد من رغبة حذف ' + '<strong><u>' + admin.name + '</u></strong>' + "؟");
				$('#delete').modal('show');
			});
		});
		$('#deleteForm').on('submit', function (e) {
			e.preventDefault();
			let formData = {
				id: $('#delete_id').val(),
				_token: '{{ csrf_token() }}'
			};
			$.ajax({
				url: '{{ route('admins.deleteAdmin') }}',
				type: 'post',
				data: formData,
				success: function (responce) {
					if (responce.message) {
						notyf.error(responce.message);
						$('#delete').modal('hide');
					} else {
						notyf.success('تم حذف المسؤول بنجاح');
						$('#delete').modal('hide');
						$('#dataTable').DataTable().ajax.reload();
					}
				},
				error: function (xhr) {
					$('.error-text').remove();
					if (xhr.status === 422) {
						let errors = xhr.responseJSON.errors;
						$.each(errors, function (key, value) {
							$('#' + key).after('<span class="error-text" style="color:red;">' + value[0] + '</span>');
							$('#' + key).next('.error-text').fadeIn(300);
						});
					}
				},
			});
		});
		$(document).on('click', '.view', function (e) {
			let id = $(this).data('id');
			$.get(`/admins/showAdminInfo/${id}`, function (data) {
				let admin = data.admin;
				$('#view_id').val(admin.id);
				$('#view-data').html(`
									<div class="card shadow-sm border-0" style="border-radius: 18px;">
										<div class="card-body text-center">

											<!-- صورة البروفايل -->
											<div class="mb-1">
												<img src="{{ asset('assets/images/avatars/avatar-1.png') }}" 
													 alt="Profile"
													 class="rounded-circle shadow"
													 style="width: 110px; height: 110px; object-fit: cover; border: 3px solid #eee;">
											</div>
											<div class="text-start px-3">

												<div class="mb-3">
													<label class="fw-bold text-muted">الاسم كامل:</label>
													<div class="text-dark">${admin.name}</div>
												</div>

												<div class="mb-3">
													<label class="fw-bold text-muted">البريد الإلكتروني:</label>
													<div class="text-dark">${admin.email}</div>
												</div>

												<div class="mb-3">
													<label class="fw-bold text-muted">تاريخ الانضمام:</label>
													<div class="text-dark">${admin.created_at}</div>
												</div>

												<div class="mb-3">
													<label class="fw-bold text-muted">تاريخ آخر تعديل:</label>
													<div class="text-dark">${admin.updated_at}</div>
												</div>

											</div>

										</div>
									</div>
								`);
				$('#view').modal('show');
			});
		});

	</script>
@endsection