<!--
 All data from form will be saved as JSON and then returned to view as JSON or php ARRAY

 Data will be transformed to JSON in a way to act as Elequent Database ARRAY

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<h2 class="sub-header">Add 3 images with title, text, and button.</h2>
<div class="col-md-9">
    <div class="form-group">
        <label>Header</label>
        <input type="text" name="data[title]" class="form-control" placeholder="Enter Header">
    </div>
    <div class="form-group">
        <label>Text</label>
        <textarea name="data[text]" class="form-control"></textarea>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" name="data[image]['url']" class="form-control" placeholder="Enter Image Url">
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button>
</div>