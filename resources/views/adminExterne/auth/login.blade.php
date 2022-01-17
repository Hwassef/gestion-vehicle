<form action="{{route('AdminExterne.login')}}" method="POST">
    @csrf
    <input type="text" name="email">
    <input type="password" name="password">
    <button>Login</button>
</form>