<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internship Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin-top: 80px;
            /* Reduced the top margin */
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        nav ul li a {
            color: black;
            text-decoration: none;
            font-size: 24px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .card {
            margin-bottom: 20px;
            /* Reduced bottom margin to reduce the gap between cards */
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 350px;
            /* Set a fixed height for the cards */
            overflow: hidden;
            /* Prevent content overflow */
        }

        .card-body {
            padding: 20px;
            /* Adjust padding as needed */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Distribute space between elements */
        }

        .card-text {
            color: #6c757d;
        }

        .btn-primary {
            background-color: #ff4757;
            border-color: #ff4757;
        }

        .btn-primary:hover {
            background-color: #e84118;
            border-color: #e84118;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: #f8f9fa;
            padding: 10px 0;
            border-top: 1px solid #e9ecef;
        }

        .icon-text {
            display: flex;
            align-items: center;
            margin-top: 5px;
            /* Reduced margin to tighten spacing between icons and text */
        }

        .icon-text i {
            margin-right: 5px;
            /* Reduced spacing between icon and text */
        }

        .text-muted {
            color: #6c757d;
        }




        .container {
            margin-top: 30px;
        }

        .card-detail {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #e9ecef;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h5 {
            margin: 0;
            font-size: 1.5rem;
        }

        .btn-apply {
            background-color: #ff4757;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
            font-size: 1rem;
        }

        .btn-apply:hover {
            background-color: #e84118;
        }

        .card-body {
            padding: 25px;
        }

        .icon-text {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .icon-text i {
            margin-right: 10px;
        }

        .more-internships {
            margin-top: 20px;
        }

        .more-internships h6 {
            margin-bottom: 15px;
        }

        .more-internships .internship-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            width: 100%;
            /* Ensure cards take full width of their container */
        }

        .more-internships .internship-card .card-body {
            padding: 15px;
        }

        .more-internships .internship-card .card-title {
            font-weight: bold;
        }

        /* Ensure the recommendation cards wrap and align properly */
        .recommendation-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
            /* Adding gap between recommendation cards */
        }

        .recommendation-card .col-md-6 {
            flex: 0 0 48%;
            max-width: 48%;
            margin-bottom: 15px;
            /* Ensure consistent space at the bottom */
        }

        /* Add this to your existing CSS or modify accordingly */

        .col-md-6 {
            padding-left: 5px;
            /* Reduced padding to bring content closer to the left side */
        }

        .card-body .row {
            margin-left: 0;
            /* Remove any left margins */
            margin-right: 0;
            /* Remove any right margins */
        }

        p {
            margin-bottom: 5px;
            /* Reduced bottom margin for paragraphs to decrease spacing */
        }

        ul {
            margin-top: 5px;
            /* Reduced top margin for unordered list */
            margin-bottom: 5px;
            /* Reduced bottom margin */
            padding-left: 15px;
            /* Keep padding for list items */
        }

        ul li {
            margin-bottom: 5px;
            /* Reduced margin between list items */
        }

        /* Adjust icon-text styling */
        .icon-text {
            margin-top: 3px;
            /* Further reduce the space between icon-text elements */
            margin-bottom: 3px;
            /* Ensure small space between each row of icon-text */
        }

    </style>
</head>

<body class="hold-transition layout-top-nav" style="margin: 0; padding: 0;">
    @include('layouts.adminNavbar')

    <div class="content-wrapper" style="padding-top: 1rem !important; margin-top: 0 !important;">
        <section class="content" style="padding-top: 0 !important; margin-top: 0 !important;">
            @yield('content')
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
