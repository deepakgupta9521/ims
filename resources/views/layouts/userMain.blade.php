<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internship Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 80px;
            /* Reduced the top margin */
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        nav ul li a {
            color: black;
            font-size: 24px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #e84118;
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
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>


    </div>
    @include('layouts.footer')
</body>