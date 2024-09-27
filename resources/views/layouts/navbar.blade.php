<header>
    <nav>
        <nav style="position: fixed; top: 0; width: 100%; background-color: white; z-index: 1000;">
            <ul style="list-style-type: none; padding: 10px 0; margin: 0; display: flex; justify-content: center; align-items: center;">
                <li style="margin-left: 30px;"><a href="{{ route('home') }}">Home</a></li>
                <li style="margin-left: 30px;"><a href="{{ route('about.view') }}">About</a></li>
                <li style="margin-left: 30px;"><a href="{{ route('search.internships') }}">Internships</a></li>
                <li style="margin-left: 30px;"><a href="{{ route('contact.view') }}">Contact</a></li>
                <li style="margin-left: 30px;">
                    <form method="GET" action="{{ route('search.internships') }}" class="form-inline">
                        <input type="text" name="query" class="form-control mr-sm-2" id="searchInput" placeholder="Search internships" aria-label="Search" value="{{ request('query') }}">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>


                <!-- Button to view user's applications -->
                @auth
                <li style="margin-left: 30px;">
                    <a href="{{ route('applications.my') }}" class="btn btn-success" style="color: white;">My Applications</a>
                </li>
                @endauth
                <li>
                    <div class="dropdown" style="position: relative; display: inline-block; margin-left: 25px;">
                        <button onclick="toggleDropdown()" style="background: none; border: none; font-size: 24px;  cursor: pointer; font-family:cursive; display: flex; align-items: center;">
                            {{ Auth::user()->name }}
                            <span style="margin-left: 5px;">&#9660;</span> <!-- Down arrow icon -->
                        </button>
                        <div id="userDropdown" style="display: none; position: absolute; right: 0; background-color: #f9f9f9; min-width: 16px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1;">
                            <a href="{{ route('profile.edit') }}" style="color: black; padding: 12px 16px; font-size: 16px; text-decoration: none; display: block; font-family:cursive;">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 16px; cursor: pointer; font-size: 16px; font-family:cursive">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
</header>
<script>
        function searchInternships() {
        const query = document.getElementById('searchInput').value;
        if (query) {
            window.location.href = "{{ route('search.internships') }}?query=" + encodeURIComponent(query);
        } else {
            alert('Please enter a search term.');
        }
    }


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