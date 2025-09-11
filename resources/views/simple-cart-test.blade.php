<!DOCTYPE html>
<html>
<head>
    <title>Simple Cart Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .btn { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .log { margin-top: 20px; padding: 10px; background: #f8f9fa; border: 1px solid #dee2e6; }
    </style>
</head>
<body>
    <h1>Simple Cart Test</h1>
    
    @auth
        <p>Logged in as: {{ auth()->user()->ten_nguoidung ?? auth()->user()->email }}</p>
        <button class="btn" onclick="testCart()">Test Add to Cart</button>
    @else
        <p>Not logged in. <a href="/login">Login here</a></p>
    @endauth
    
    <div id="log" class="log">
        <h3>Log:</h3>
        <div id="log-content"></div>
    </div>

    <script>
        function log(message) {
            const logContent = document.getElementById('log-content');
            logContent.innerHTML += '<p>' + new Date().toLocaleTimeString() + ': ' + message + '</p>';
        }

        function testCart() {
            log('Starting cart test...');
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                log('ERROR: CSRF token not found!');
                return;
            }
            
            log('CSRF token found: ' + csrfToken.getAttribute('content').substring(0, 10) + '...');
            
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify({
                    id_sanpham: 1,
                    so_luong: 1
                })
            })
            .then(response => {
                log('Response status: ' + response.status);
                log('Response headers: ' + JSON.stringify([...response.headers.entries()]));
                return response.text();
            })
            .then(text => {
                log('Raw response: ' + text);
                try {
                    const data = JSON.parse(text);
                    log('Parsed JSON: ' + JSON.stringify(data));
                } catch (e) {
                    log('Failed to parse JSON: ' + e.message);
                }
            })
            .catch(error => {
                log('Fetch error: ' + error.message);
            });
        }
    </script>
</body>
</html>
