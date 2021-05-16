@auth('admin')
    <p>
        Welcome, {{ auth()->guard('admin')->user()->name }} <br>
    In the Admin Dashboard.....
    </p>
    <p>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </p>
@endauth

@guest('admin')
    <a href="{{ route('admin.login') }}">Login</a>
@endguest