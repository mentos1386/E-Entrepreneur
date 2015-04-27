{!! Themes::form_open('reviews',$store['id']) !!}
<div class="row uniform">
    <div style="width:100%;"><textarea name="review" placeholder="Message" rows="4"></textarea></div>
    <div style="width:100%;">
        <ul class="actions">
            <li><input value="Post Review" class="special" type="submit"></li>
        </ul>
    </div>
</div>
{!! Themes::form_close() !!}