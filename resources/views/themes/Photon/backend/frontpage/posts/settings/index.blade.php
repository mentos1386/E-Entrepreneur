<!--
 All data from form will be saved as JSON and then returned to view as JSON

 Data will be transformed to JSON

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<div class="col-md-9">
    <h2 class="sub-header">Posts Settings</h2>

    <div class="col-md-4">
        <div class="form-group">
            <label for="style">Posts Order</label>
            <select class="form-control" name="data[posts][order]" data-size="10">
                <option value="dec">New First</option>
                <option value="asc">Old First</option>
            </select>
        </div>
    </div>


</div>

<div class="col-md-3">

    <div class="col-md-12">
        <div class="jumbotron">

            <p>Here you can edit some settings how posts are shown.</p>

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

    <div class="col-md-12">
        <button type="submit" class="btn btn-success width-100">Submit</button>
    </div>

</div>

{!! Form::hidden('rewrite', 'true') !!}