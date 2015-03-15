<!--
 All data from form will be saved as JSON and then returned to view as JSON

 Data will be transformed to JSON

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<div class="col-md-9">
    <h2 class="sub-header">Add Text Block</h2>
    <div class="form-group">
        <label>Header</label>
        <input type="text" name="data[title]" class="form-control" placeholder="Enter Header">
    </div>
    <div class="form-group">
        <label>Text</label>
        <textarea name="data[text]" class="form-control" placeholder="Enter Content"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

<div class="col-md-3">

    <div class="col-md-12">
        <div class="jumbotron">

            <p>Here you can create new text builder.</p>

        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="style">Enter Image Url [Optional]</label>
            <input type="url" class="form-control" name="data[image]" placeholder="Enter Image Url">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="style">Select Style Type</label>
            <select class="form-control" name="data[style]" data-size="10">
                <option value="1">Style 1</option>
                <option value="2">Style 2</option>
            </select>
        </div>
    </div>

</div>