@extends('layout.master')
@section('content')

	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3 ">جدول العملاء</div>
		<div class="ms-auto">
			<div class="btn-group">
				<button type="button" class="btn btn-primary">الاعدادات</button>
				<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
					data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
				</button>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
						href="javascript:;">Action</a>
					<a class="dropdown-item" href="javascript:;">Another action</a>
					<a class="dropdown-item" href="javascript:;">Something else here</a>
					<div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
				</div>
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
							<th>الاسم</th>
							<th>الايميل</th>
							<th>تاريخ الانضمام</th>
							<th>تاريخ اخر تعديل</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--end page main-->

@endsection
@section('js')
	<script>
		$(document).ready(function () {
			$('#dataTable').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				ajax: {
					url: '{{ route('admins.getUserData') }}',
					dataSrc: 'data',
				},
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
					{ data: 'name', name: 'name' },
					{ data: 'email', name: 'email' },
					{ data: 'created_at', name: 'created_at' },
					{ data: 'updated_at', name: 'updated_at' },
				],
				language: {
					url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json'
				},
				pageLength: 10,
				lengthMenu: [5, 10, 25, 50],
			});
		});

	</script>
@endsection