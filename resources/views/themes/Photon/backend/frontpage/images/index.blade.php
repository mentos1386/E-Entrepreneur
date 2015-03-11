<!--
 All data from form will be saved as JSON and then returned to view as JSON or php ARRAY

 Data will be transformed to JSON in a way to act as Elequent Database ARRAY

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<h2 class="sub-header">Add 3 images with title, text, and button.</h2>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="data[header]" class="form-control" placeholder="Enter Header">
    </div>
</div>
<div class="col-md-5">
    <div class="form-group">
        <input type="text" name="data[sub_header]" class="form-control" placeholder="Enter Sub Header">
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="data[images][1][title]" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][1][text]" class="form-control" placeholder="Enter text">
    </div>
    <div class="form-group">
        <input type="url" name="data[images][1][url]" class="form-control" placeholder="Enter Image Url">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][1][btn_text]" class="form-control" placeholder="Enter button text">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][1][btn_custom_url]" class="form-control" placeholder="Enter button url">
        {!! Themes::html_posts_pages_drop_down('data[images][1][btn_url]') !!}
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="data[images][2][title]" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][2][text]" class="form-control" placeholder="Enter text">
    </div>
    <div class="form-group">
        <input type="url" name="data[images][2][url]" class="form-control" placeholder="Enter url">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][2][btn_text]" class="form-control" placeholder="Enter button text">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][2][btn_custom_url]" class="form-control" placeholder="Enter button url">
        {!! Themes::html_posts_pages_drop_down('data[images][2][btn_url]') !!}
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <input type="text" name="data[images][3][title]" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][3][text]" class="form-control" placeholder="Enter text">
    </div>
    <div class="form-group">
        <input type="url" name="data[images][3][url]" class="form-control" placeholder="Enter url">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][3][btn_text]" class="form-control" placeholder="Enter button text">
    </div>
    <div class="form-group">
        <input type="text" name="data[images][3][btn_custom_url]" class="form-control" placeholder="Enter button url">
        {!! Themes::html_posts_pages_drop_down('data[images][3][btn_url]') !!}
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button>
</div>