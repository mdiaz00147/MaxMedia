<form class="navbar-form navbar-right" method="POST" action="{{ route('sing') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <input type="text" placeholder="Email" name="email"  class="form-control">
    </div>
    <div class="form-group">
        <input type="password" placeholder="Password" name="password" class="form-control">
    </div>
    <div class="form-group">

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
    </div>

    <button type="submit" class="btn btn-success">Login</button>
</form>