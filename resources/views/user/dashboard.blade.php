user
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">
    Logout
</button>
