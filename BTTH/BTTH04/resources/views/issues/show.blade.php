<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Vấn Đề</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
		<div class="container-fluid">
			<a class="navbar-brand h1" href="{{ route('issues.index') }}">CRUD Issues</a>
			<div class="justify-end">
				<div class="col">
					<a class="btn btn-success" href="{{ route('issues.create') }}">Thêm vấn đề mới</a>
				</div>
			</div>
		</div>
	</nav>
    <div class="container h-100 mt-5">
        <h2>Issue Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>Issue ID</th>
                <td>{{ $issue->id }}</td>
            </tr>
            <tr>
                <th>Computer ID</th>
                <td>{{ $issue->computer_id }}</td>
            </tr>
            <tr>
                <th>Reported By</th>
                <td>{{ $issue->reported_by }}</td>
            </tr>
            <tr>
                <th>Reported Date</th>
                <td>{{ $issue->reported_date }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $issue->description }}</td>
            </tr>
            <tr>
                <th>Urgency</th>
                <td>{{ $issue->urgency }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $issue->status }}</td>
            </tr>
        </table>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Back</a>
    </div>
</body>

</html>