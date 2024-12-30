<form action="{{ route('loginv2') }}" method="post">
    @csrf
    @error('email')
        <p style="color: red">{{ $errors->first('email') }}</p>
    @enderror
    <input type="email" name="email" placeholder="Pochtangizni kiriting"><br>
    <input type="password" name="password" placeholder="Parolingizni kiriting"><br>

    <input type="submit" value="Kirish">
</form>
