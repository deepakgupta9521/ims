<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Internship Nepal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: url('images/p.jpg') no-repeat center center fixed; /* Background image */
            background-size: cover; /* Cover the entire page */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Center content vertically */
            min-height: 100vh; /* Full viewport height */
            padding: 50px;
        }

        h2 {
            color: #ffffff; /* Change header color for contrast */
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            width: 90%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .column {
            flex: 1;
            min-width: 250px;
            padding: 10px;
        }

        .column h3 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #567221;
            padding-bottom: 5px;
        }

        .column p {
            margin-bottom: 10px;
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }

        .social-icons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons img {
            width: 40px;
            height: 40px;
            transition: transform 0.3s;
        }

        .social-icons img:hover {
            transform: scale(1.1);
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
            font-size: 0.85em;
        }
    </style>
</head>
<body>

    <h2>Contact Us</h2>

    <div class="container">
        <div class="row">
            <div class="column">
                <h3>Address and General Enquiries</h3>
                <p>Internship Nepal Pvt. Ltd.<br>
                Kathmandu, Nepal<br>
                PO Box 12345</p>
                <p>Tel: +977 (01) 1234567<br>
                +977 (01) 7654321</p>
                <p>Please use the above address for general enquiries.</p>
            </div>
            
            <div class="column">
                <h3>Internship and Job Opportunities</h3>
                <p>For information on internship and job opportunities, please contact our HR department.</p>
                <p>Find available positions through the job portal below.</p>
            </div>
        </div>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><img src="images/fb.png" alt="Facebook"></a>
            <a href="https://www.instagram.com" target="_blank"><img src="images/insta.webp" alt="Instagram"></a>
            <a href="https://www.linkedin.com" target="_blank"><img src="images/link.png" alt="LinkedIn"></a>
        </div>
    </div>

 

</body>
</html>
