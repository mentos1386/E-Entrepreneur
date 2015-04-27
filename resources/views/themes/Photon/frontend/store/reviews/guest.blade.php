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
{!! Themes::form_open('reviews',$store['id']) !!}
<div class="row uniform" id="review">
    <h3 class="header" style="width:100%;">Post without Account</h3>

    <div style="width:50%;"><input name="name" placeholder="Name" type="text"></div>
    <div style="width:50%;"><input name="email" placeholder="Email-Won't be published" type="email"></div>
    <div style="width:100%;">
        Put
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star-half-full"></span>
        here
    </div>
    <div style="width:100%;"><textarea name="review" placeholder="Message" rows="4"></textarea></div>
    <div style="width:100%;">
        <ul class="actions">
            <li><input value="Post Review" class="special" type="submit"></li>
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

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>