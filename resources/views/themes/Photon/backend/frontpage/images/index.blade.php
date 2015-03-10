<!--
 All data from form will be saved as JSON and then returned to view as JSON or php ARRAY

 Data will be transformed to JSON in a way to act as Elequent Database ARRAY

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<h2 class="sub-header">Add 3 images with title, text, and button.</h2>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="title[]" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="text" name="text[]" class="form-control" placeholder="Enter text">
    </div>
    <div class="form-group">
        <input type="url" name="image[]" class="form-control" placeholder="Enter url">
    </div>
    <div class="form-group">
        <input type="text" name="btn_text[]" class="form-control" placeholder="Enter button text">
    </div>
    <div class="form-group">
        <input type="text" name="btn_url_custom_1" class="form-control" placeholder="Enter button url">
        {!! Themes::html_posts_pages_drop_down('btn_url_1') !!}
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="title[]" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="text" name="text[]" class="form-control" placeholder="Enter text">
    </div>
    <div class="form-group">
        <input type="url" name="image[]" class="form-control" placeholder="Enter url">
    </div>
    <div class="form-group">
        <input type="text" name="btn_text[]" class="form-control" placeholder="Enter button text">
    </div>
    <div class="form-group">
        <input type="text" name="btn_url_custom_2" class="form-control" placeholder="Enter button url">
        {!! Themes::html_posts_pages_drop_down('btn_url_2') !!}
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="title[]" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="text" name="text[]" class="form-control" placeholder="Enter text">
    </div>
    <div class="form-group">
        <input type="url" name="image[]" class="form-control" placeholder="Enter url">
    </div>
    <div class="form-group">
        <input type="text" name="btn_text[]" class="form-control" placeholder="Enter button text">
    </div>
    <div class="form-group">
        <input type="text" name="btn_url_custom_3" class="form-control" placeholder="Enter button url">
        {!! Themes::html_posts_pages_drop_down('btn_url_3') !!}
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button>
</div>