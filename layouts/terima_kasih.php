<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <!-- Sertakan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0c2461, #3498db, #bdc3c7);
            background-size: 500% 500%;
            animation: gradientBG 15s ease infinite;
            color: #fff;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            text-align: center;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 48px;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        p {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 20px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 30px;
            }

            h1 {
                font-size: 36px;
            }

            p {
                font-size: 20px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 16px;
            }

            .icon {
                font-size: 60px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <!-- Ganti icon dengan ikon Font Awesome -->
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>Terima Kasih Telah Mengisi Survey!</h1>
            <p>Kami sangat menghargai waktu dan partisipasi Anda.</p>
        </div>
    </div>
</body>
</html>