@if ($errors->any())
    <!-- Validator errors !-->
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <strong>Woops!</strong> Change a few things:
        @foreach($errors->all('<li>:message</li>') as $error)
            {!! $error !!}
        @endforeach
    </div>
@endif

@if (\Illuminate\Support\Facades\Session::get('message_danger') !== null)
    <!-- Danger messages !-->
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! Session::get('message_danger') !!}
    </div>
@endif

@if (\Illuminate\Support\Facades\Session::get('message_warning') !== null)
    <!-- Warning messages !-->
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! Session::get('message_warning') !!}
    </div>
@endif

@if (\Illuminate\Support\Facades\Session::get('message_info') !== null)
    <!-- Info messages !-->
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! Session::get('message_info') !!}
    </div>
@endif

@if (\Illuminate\Support\Facades\Session::get('message_success') !== null)
    <!-- Success messages !-->
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {!! Session::get('message_success') !!}
    </div>
@endif