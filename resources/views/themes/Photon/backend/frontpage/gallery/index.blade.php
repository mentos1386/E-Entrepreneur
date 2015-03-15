<!--
 All data from form will be saved as JSON and then returned to view as JSON or php ARRAY

 Data will be transformed to JSON in a way to act as Elequent Database ARRAY

 form doesn't have to be opened, it wil be opened automagicly xD
-->
<div class="col-md-9">
    <h2 class="sub-header">Create gallery with multiple images.</h2>

    <div class="col-md-4">
        <div class="form-group">
            <input type="text" name="data[header]" class="form-control" placeholder="Enter Header">
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input type="text" name="data[sub_header]" class="form-control" placeholder="Enter Sub Header">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 1
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][1][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][1][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][1][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 2
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][2][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][2][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][2][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 3
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][3][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][3][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][3][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 4
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][4][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][4][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][4][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 5
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][5][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][5][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][5][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 6
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][6][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][6][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][6][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 7
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][7][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][7][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][7][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 8
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][8][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][8][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][8][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Image 9
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Image Url</label>
                    <input type="url" name="data[images][9][url]" class="form-control" placeholder="Enter Image Url">
                </div>
                <div class="form-group">
                    <label>Hover text</label>
                    <input type="text" name="data[images][9][hover]" class="form-control"
                           placeholder="Enter Image Hover Text">
                </div>
                <div class="form-group">
                    <label for="style">Size</label>
                    <select class="form-control" name="data[images][9][size]" data-size="10">
                        <option value="narrow-1col">Narrow</option>
                        <option value="wide-2col">Wide</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">

    <div class="col-md-12">
        <div class="jumbotron">

            <p>Here you can create new galery.</p>

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
        <div class="form-group">
            <button type="submit" class="btn btn-success width-100">Submit</button>
        </div>
    </div>

</div>