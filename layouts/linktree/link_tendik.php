<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan Pelanggan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4e73df, #bdc3c7);
            /* Menggunakan kombinasi warna biru dan abu-abu */
            overflow: hidden;
            position: relative;
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
            transition: background-position 2s;
        }


        @keyframes gradient {
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

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            /* Dark overlay */
            z-index: 1;
        }

        .container {
            text-align: center;
            width: 90%;
            max-width: 350px;
            padding: 20px 15px;
            background: rgba(255, 255, 255, 0.7);
            /* Warna putih dengan kecerahan 70% */
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
            /* Menambahkan transisi untuk warna latar belakang */
            overflow: hidden;
            position: relative;
            z-index: 2;
        }

        .container:hover {
            background-color: rgba(255, 255, 255, 0.8);
            /* Warna putih dengan kecerahan 80% saat dihover */
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(240, 96, 255, 0.3), rgba(72, 127, 243, 0.3));
            z-index: -1;
            transition: opacity 0.5s;
        }


        .profile-img {
            width: 100px;
            /* Reduced size */
            height: 100px;
            /* Reduced size */
            border-radius: 50%;
            margin-bottom: 15px;
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.6s, box-shadow 0.3s;
        }

        .profile-img:hover {
            transform: rotate(360deg);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .profile h1 {
            font-size: 24px;
            /* Adjusted font size */
            margin-bottom: 10px;
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        .profile p {
            font-size: 14px;
            /* Adjusted font size */
            color: #555;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out 0.5s;
        }

        .links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Reduced gap */
        }

        .link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background-color: rgba(0, 123, 255, 0.7);
            /* Menggunakan warna latar belakang transparan */
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.5s ease-in-out;
        }

        .link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s;
        }

        .link:hover::before {
            left: 100%;
        }

        .link:hover {
            background-color: rgba(0, 123, 255, 0.9);
            /* Mengubah warna latar belakang pada hover */
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 123, 255, 0.4);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile">
            <img src="../../dist/img/LogoPolinema.png" alt="Profile Picture" class="profile-img">
            <h1>Survey Kepuasan Tendik</h1>
        </div>
        <div class="links">
            <a href="../../form_biodata.php?bio=tendik" class="link">Mulai</a>
        </div>
    </div>
</body>

</html>