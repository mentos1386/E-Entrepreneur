<!--
 All data from form will be saved as JSON and then returned to view as JSON

 Data will be transformed to JSON

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<div class="col-md-9">
    <h2 class="sub-header">Add Buttons</h2>

    <div class="form-group">
        <label>Header</label>
        <input type="text" name="data[header]" class="form-control" placeholder="Enter Header">
    </div>
    <div class="form-group">
        <label>Sub Header</label>
        <input type="text" name="data[sub_header]" class="form-control" placeholder="Enter Sub Header">
    </div>
    <!-- TODO: Make button "Add more buttons" with js to add more button fields -->
    <div class="col-md-4">
        <label>Button 1</label>

        <div class="form-group">
            <input type="text" name="data[buttons][1][text]" class="form-control" placeholder="Enter button text">
        </div>
        <div class="form-group">
            <label>Icon</label>
            {!! Themes::icon_picker_search_box('button_icon_1', 'data[buttons][1][icon]')!!}
        </div>
        <div class="form-group">
            <label for="style">Button url</label>
            <input type="text" name="data[buttons][1][custom_url]" class="form-control" placeholder="Enter button url">
            {!! Themes::html_posts_pages_drop_down('data[buttons][1][url]') !!}
        </div>
        <div class="form-group">
            <label for="style">Special style</label>
            <select class="form-control" name="data[buttons][1][special]" data-size="10">
                <option value="">No</option>
                <option value="special">Yes</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <label>Button 2</label>

        <div class="form-group">
            <input type="text" name="data[buttons][2][text]" class="form-control" placeholder="Enter button text">
        </div>
        <div class="form-group">
            <label>Icon</label>
            {!! Themes::icon_picker_search_box('button_icon_2', 'data[buttons][2][icon]')!!}
        </div>
        <div class="form-group">
            <label for="style">Button url</label>
            <input type="text" name="data[buttons][2][custom_url]" class="form-control" placeholder="Enter button url">
            {!! Themes::html_posts_pages_drop_down('data[buttons][2][url]') !!}
        </div>
        <div class="form-group">
            <label for="style">Special style</label>
            <select class="form-control" name="data[buttons][2][special]" data-size="10">
                <option value="">No</option>
                <option value="special">Yes</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <label>Button 3</label>

        <div class="form-group">
            <input type="text" name="data[buttons][3][text]" class="form-control" placeholder="Enter button text">
        </div>
        <div class="form-group">
            <label>Icon</label>
            {!! Themes::icon_picker_search_box('button_icon_3', 'data[buttons][3][icon]')!!}
        </div>
        <div class="form-group">
            <label for="style">Button url</label>
            <input type="text" name="data[buttons][3][custom_url]" class="form-control" placeholder="Enter button url">
            {!! Themes::html_posts_pages_drop_down('data[buttons][3][url]') !!}
        </div>
        <div class="form-group">
            <label for="style">Special style</label>
            <select class="form-control" name="data[buttons][3][special]" data-size="10">
                <option value="">No</option>
                <option value="special">Yes</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

<div class="col-md-3">

    <div class="col-md-12">
        <div class="jumbotron">

            <p>Here you can create new Buttons builder.<br><br>
                3 buttons max, but you dont have to make all of them, just as many as you need.</p>

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

@section('scripts')
    {!! Themes::icon_picker_script('button_icon_1')!!}
    {!! Themes::icon_picker_script('button_icon_2')!!}
    {!! Themes::icon_picker_script('button_icon_3')!!}
@endsection