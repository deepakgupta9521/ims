<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Provider</title>
</head>

<body style="background-image: url('images/homep.png'); background-size: 100% auto; background-position: center; background-repeat: no-repeat; min-height: 100vh; margin: 1; padding: 50;">
<nav style="padding: 10px;">
    <div style="display: flex; justify-content: flex-end; align-items: center;">
        <div>
            <a href="{{ route('home') }}" style="color: black; text-decoration: none; font-size: 24px; font-weight: bold; margin-right: 50px; font-family:cursive">Home</a>
            <a href="{{ route('about.view') }}" style="color: black; text-decoration: none; font-size: 24px; font-weight: bold; margin-right: 50px; font-family:cursive">About</a>
            <a href="{{ route('search.internships') }}" style="color: black; text-decoration: none; font-size: 24px; font-weight: bold; margin-right: 50px; font-family:cursive">Internships</a>
            <a href="{{ route('contact.view') }}" style="color: black; text-decoration: none; font-size: 24px; font-weight: bold; margin-right: 50px; font-family:cursive">Contact</a>
        </div>
        <div class="dropdown" style="position: relative; display: inline-block; margin-left: 25px;">
            <button onclick="toggleDropdown()" style="background: none; border: none; font-size: 24px; font-weight: bold; cursor: pointer; font-family:cursive; display: flex; align-items: center;">
                {{ Auth::user()->name }}
                <span style="margin-left: 5px;">&#9660;</span> <!-- Down arrow icon -->
            </button>
            <div id="userDropdown" style="display: none; position: absolute; right: 0; background-color: #f9f9f9; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1;">
                <a href="{{ route('profile.edit') }}" style="color: black; padding: 12px 16px; text-decoration: none; display: block; font-family:cursive;">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 16px; cursor: pointer; font-size: 16px; font-family:cursive">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
    <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; height: 100vh; text-align: left; padding-left: 50px;">
        <h1 style="font-size: 4em; font-weight: bold; margin: 0; color: black; ">Need an <br> Internship?</h1>
        <p style="font-size: 1.4em; margin: 20px 0; color: black; font-family:cursive">Start Your Career Journey with Internship Nepal Today! <br>
            Unlock a world of opportunities by signing up now.<br>
            and connect with the internships that are tailored to your  <br>
            skills and goals, helping you gain valuable real-world experience.</p>

        @if(Auth::check())
        <a href="{{route('search.internships') }}" style="padding: 10px 30px; font-size: 1em; background-color: black; color: white; border: 2px solid #007BFF; border-radius: 30px; cursor: pointer; margin-left: 10px; text-decoration: none; display: inline-block;">Search</a>
        @else
        <a href="{{ url('/login') }}" style="padding: 10px 30px; font-size: 1em; background-color: black; color: white; border: 2px solid #007BFF; border-radius: 30px; cursor: pointer; margin-left: 10px; text-decoration: none; display: inline-block;">Login to Search</a>
        @endif
    </div>
    </div>
</body>
<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("userDropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>
{{-- @include('footer'); --}}

</html>