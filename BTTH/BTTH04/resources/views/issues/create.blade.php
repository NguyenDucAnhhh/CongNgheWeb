<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Vấn Đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Thêm Vấn đề mới</h3>
                <form action="{{ route('issues.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên máy tính - Tên phiên bản</label>
                        <select class="form-control" id="computer_id" name="computer_id" required>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
                        <input type="text" class="form-control" name="reported_by" id="reported_by" required>
                    </div>
                    <div class="mb-3">
                        <label for="reported_date" class="form-label">Thời gian báo cáo</label>
                        <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Mô tả chi tiết vấn đề</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="urgency" class="form-label">Mức độ sự cố</label>
                        <select name="urgency" id="urgency" class="form-select">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái hiện tại</label>
                        <select name="status" id="status" class="form-select">
                            <option value="Open">Open</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</body>