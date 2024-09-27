<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Nepal - About Us</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
        }

        .section {
            margin: 40px 0;
        }

        .header {
            font-size: 40px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(90deg, #50a1f3, #3a88ee);
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 40px;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 3px solid #50a1f3;
            display: inline-block;
            padding-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
            text-align: justify;
        }

        /* About Us Section */
        .about-us {
            background-color: #f0f9ff;
            padding: 40px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        .about-us h2, .about-us p {
            text-align: center;
        }

        .about-us p {
            font-size: 18px;
            margin: 0 auto;
            max-width: 800px;
        }

        /* Our Vision Section */
        .vision {
            background-color: #f9fcff;
            padding: 40px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .vision img {
            width: 50%;
            border-radius: 8px;
            margin-right: 20px;
        }

        .vision .text {
            flex: 1;
        }

        /* What We Offer Section */
        .offers {
            background-color: #fff7f0;
            padding: 40px 20px;
            border-radius: 8px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .offer-box {
            background-color: #fffae5;
            padding: 30px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .offer-box:hover {
            transform: translateY(-10px);
        }

        .offer-box h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
        }

        .offer-box p {
            font-size: 16px;
            color: #666;
        }

        /* Buttons */
        .cta-button {
            background-color: #50a1f3;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #3a88ee;
        }

        /* Footer */
        .footer {
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 40px;
            text-align: center;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Button styles */
        .contact-button {
            background-color: #e0e0e0; /* Subtle background color */
            color: #333;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .contact-button:hover {
            background-color: #d0d0d0; /* Slightly darker on hover */
        }

        .contact-button i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header">Internship Nepal</div>

        <!-- About Us Section -->
        <div class="section about-us">
            <h2>About Us</h2>
            <p>Welcome to Internship Nepal, your gateway to valuable internship opportunities. At Internship Nepal, we specialize in connecting talented students and young professionals with leading companies across various industries. Our mission is to empower the next generation by providing meaningful internship experiences that foster growth, learning, and career development.</p>
        </div>

        <!-- Our Vision Section -->
        <div class="section vision">
            <img src="images/Interns.jpg" alt="Our Vision">
            <div class="text">
                <h2>Our Vision</h2>
                <p>Our vision is to be the premier platform where interns find enriching opportunities that align with their career aspirations. We aim to bridge the gap between education and industry by facilitating valuable connections and practical learning experiences.</p>
                <a href="#" class="cta-button">Learn More</a>
            </div>
        </div>

        <!-- What We Offer Section -->
        <div class="section offers">
            <div class="offer-box">
                <h3>Technology Internships</h3>
                <p>Gain hands-on experience in tech fields such as software development, data science, and IT support with our carefully curated internship programs.</p>
            </div>
            <div class="offer-box">
                <h3>Finance Internships</h3>
                <p>Explore the world of finance through internships that provide exposure to accounting, investment banking, and financial analysis.</p>
            </div>
            <div class="offer-box">
                <h3>Marketing Internships</h3>
                <p>Get a head start in digital marketing, SEO, and brand management with our comprehensive marketing internship offers.</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Email: <a href="mailto:info@internshipnepal.com">info@internshipnepal.com</a></p>
            <p>Phone: <a href="tel:+9771234567890" class="contact-button"><i class="fas fa-phone-alt"></i> +977 (123) 456-7890</a></p>
            <p>Address: 123 Internship Way, Kathmandu, Nepal</p>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
