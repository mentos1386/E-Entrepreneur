<div id="review" class="post-comment width-100 block post-comment-user">
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
    <div class="row uniform width-100">
        <div class="width-70 block"><textarea name="comment" placeholder="Message" rows="4"></textarea></div>
        <div class="width-30 block">
            <h3>Rate item:</h3>
            @include('themes.Photon.frontend.store.partial.rate-stars')
        </div>
        <div class="width-100 block">
            <ul class="actions">
                <li><input value="Post Review" class="special" type="submit"></li>
            </ul>
        </div>
    </div>
    {!! Themes::form_close() !!}
</div>