<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Danh sách Vấn Đề</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
		<div class="container-fluid">
			<a class="navbar-brand h1" href="{{ route('issues.index') }}">CRUD Issues</a>
			<div class="justify-end">
				<div class="col">
					<a class="btn btn-sm btn-success" href="{{ route('issues.create') }}">Thêm vấn đề mới</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Issues</b></h2>
						</div>
					</div>
				</div>
				@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Mã vấn đề</th>
							<th>Tên máy tính</th>
							<th>Tên phiên bản</th>
							<th>Người báo cáo sự cố</th>
							<th>Thời gian báo cáo</th>
							<th>Mức độ sự cố</th>
							<th>Trạng thái hiện tại</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($issues as $issue)
							<tr>
								<td>{{ $issue->id }}</td>
								<td>{{ $issue->computer->computer_name }}</td>
								<td>{{ $issue->computer->model }}</td>
								<td>{{ $issue->reported_by }}</td>
								<td>{{ $issue->reported_date }}</td>
								<td>{{ $issue->urgency }}</td>
								<td>{{ $issue->status }}</td>
								<td>
									<a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary">Sửa</a>
			
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $issue->id }}">
										Xóa
									</button>
									<div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Bạn có chắc chắn muốn xóa vấn đề này không?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
													<form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger">Xóa</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
				</table>

				<div class="d-flex justify-content-center">
					{{ $issues->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>        
	</div>

</body>
</html>