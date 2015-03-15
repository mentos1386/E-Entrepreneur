<!--
 All data from form will be saved as JSON and then returned to view as JSON

 Data will be transformed to JSON

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<div class="col-md-9">
    <h2 class="sub-header">Add Text Block</h2>

    <div class="form-group">
        <label>Header [Optional]</label>
        <input type="text" name="data[header]" class="form-control" placeholder="Enter Header">
    </div>
    <div class="form-group">
        <label>Sub-Header [Optional]</label>
        <input name="data[sub_header]" class="form-control" placeholder="Enter Content">
    </div>
    <div class="form-group">
        <label>Location</label>
        <input name="data[address]" class="form-control" placeholder="Enter Location Address">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

<div class="col-md-3">

    <div class="col-md-12">
        <div class="jumbotron">

            <p>Here you can create new maps builder.</p>

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