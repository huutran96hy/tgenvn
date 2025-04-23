<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .error-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
        }

        .error-code {
            font-size: 7rem;
            font-weight: 700;
            color: #007bff;
        }

        .error-message {
            font-size: 1.5rem;
            margin-top: 1rem;
            color: #333;
        }

        .error-subtext {
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .btn-home {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>

    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Không tìm thấy trang</div>
        <div class="error-subtext">Trang bạn đang tìm có thể đã bị xóa hoặc chưa bao giờ tồn tại.</div>
        <a href="{{ route('index') }}" class="btn btn-primary btn-home">
            <i class="bi bi-house-door-fill me-1"></i> Về trang chủ
        </a>
    </div>

</body>

</html>
