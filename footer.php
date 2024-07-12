<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .footer {
            background-color: #2c2c2c;
            color: #ffffff;
            padding: 40px 0;
            text-align: center;
        }
        .footer .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .footer h3 {
            font-family: 'Brush Script MT', cursive;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .footer .column {
            flex: 1;
            min-width: 250px;
            margin: 10px;
        }
        .footer .column p {
            margin: 10px 0;
        }
        .footer .column a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 5px;
            font-size: 20px;
        }
        .footer .bottom-bar {
            border-top: 1px solid #444444;
            margin-top: 20px;
            padding-top: 10px;
            font-size: 14px;
        }

        .social-icon {
            font-size: 2rem; /* adjust as needed */
            margin-right: 20px; /* Add space between icons */
        }

    </style>
</head>
<body>
    <footer class="footer">
        <div class="container">
            <div class="column">
                <h3>Kontak Kami</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Yon Zikon 14 No.20</p>
                <p><i class="fas fa-phone"></i> Call +62 85832100546</p>
                <p><i class="fas fa-envelope"></i> RossBakery7@gmail.com</p>
            </div>
            <div class="column">
                <h3>Social Media</h3>
                <p>Mari ikuti kami di berbagai platform media social untuk update mengenai toko Ross Bakery</p>
                <div>
                    <a href="https://wa.me/6285832100546"><i class="fab fa-whatsapp fa-2x social-icon"></i></a>
                    <a href="https://www.instagram.com/rossbakery13/"><i class="fab fa-instagram fa-2x social-icon"></i></a>
                </div>
            </div>
            <div class="column">
                <h3>Jam Operasioan</h3>
                <p>Setiap Hari</p>
                <p>07.00 WIB - 21.00 WIB</p>
            </div>
        </div>
        <div class="bottom-bar">
            &copy; 2024 Ross'Bakery<br>
        </div>
    </footer>
</body>
</html>
