<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h4, h5 {
            color: #333;
        }
        p {
            color: #666;
            text-align: justify; 
        }
        cite {
            display: block;
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>TradiTour Team, you got a message from {{ $data['email'] }}</h4>

        <div>
            <h5>Hello, TradiTour Team</h5>
            <p>{{ $data['message'] }}</p>
        </div>

        <cite>- {{ $data['name'] }}</cite>
    </div>
</body>
</html>
