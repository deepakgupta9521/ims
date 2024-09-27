<nav style="background-color: white; padding: 9px;">
    <div style="display: flex; justify-content: center; align-items: center;">
        <!-- Left side elements -->
        <div>
            <a href="{{route('admin.index')}}" style="color: black; text-decoration: none; font-size: 28px; font-weight: bold; margin-right: 110px; font-family:cursive">Dashboard</a>
            <a href="{{route('my.applicants')}}" style="color: black; text-decoration: none; font-size: 28px; font-weight: bold; margin-right: 110px; font-family:cursive">Applications</a>
            <a href="" style="color: black; text-decoration: none; font-size: 28px; font-weight: bold; margin-right: 110px; font-family:cursive">Users</a>
        </div>

        <!-- Right side elements (dropdown for user) -->
        <div class="dropdown" style="position: relative; display: inline-block; margin-left: 25px;">
            <button onclick="toggleDropdown()" style="background: none; border: none; font-size: 28px; font-weight: bold; cursor: pointer; color: black; font-family:cursive">
                {{ Auth::user()->name }} &#x25BC;
            </button>
            <div id="userDropdown" style="display: none; position: absolute; right: 0; background-color: #f9f9f9; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1;">
                <a href="{{ route('profile.edit') }}" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 16px; cursor: pointer; font-size: 16px;">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('userDropdown');
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    }
</script>