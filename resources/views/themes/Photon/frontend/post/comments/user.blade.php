{!! Themes::form_open('comments',$post['id']) !!}
<div class="row uniform">
    <div style="width:100%;"><textarea name="comment" placeholder="Message" rows="4"></textarea></div>
    <div style="width:100%;">
        <ul class="actions">
            <li><input value="Post Comment" class="special" type="submit"></li>
        </ul>
    </div>
</div>
{!! Themes::form_close() !!}