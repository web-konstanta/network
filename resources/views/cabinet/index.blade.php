<p>Hello, {{ Auth::user()->name }}</p>
<form action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    <button>Logout</button>
</form>
