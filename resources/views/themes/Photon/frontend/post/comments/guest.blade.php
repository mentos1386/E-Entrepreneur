@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Themes::form_open('comments',$post['id']) !!}
<div class="row uniform" id="comment">
    <h3 class="header" style="width:100%;">Post without Account</h3>

    <div style="width:50%;"><input name="name" placeholder="Name" type="text"></div>
    <div style="width:50%;"><input name="email" placeholder="Email-Won't be published" type="email"></div>
    <div style="width:100%;"><textarea name="comment" placeholder="Message" rows="4"></textarea></div>
    <div style="width:100%;">
        <ul class="actions">
            <li><input value="Post Comment" class="special" type="submit"></li>
        </ul>
    </div>
</div>
{!! Themes::form_close() !!}
<div class="middle">
    <p>Or</p>
</div>
{!! Themes::form_open('login') !!}
<div class="row uniform" id="login">
    <h3 class="header">Sign in with you Account</h3>

    <div style="width:100%;"><input name="email" placeholder="Email" type="email"></div>
    <div style="width:100%;"><input name="password" placeholder="Password" type="password"></div>
    <div style="width:100%;">
        <ul class="actions">
            <li><input value="Sign in" class="special" type="submit"></li>
            <li><a href="{{ route('register') }}" class=" button">Register</a></li>
        </ul>
    </div>
</div>
{!! Themes::form_close() !!}