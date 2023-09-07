@extends('admin.components.modal')

@section('content')
<form method="POST" action="/adminarticle_add_process" target="_parent" enctype="multipart/form-data">
    @csrf


    <div class="form-outline mb-3">
        <input type="text" class="form-control" name="title" id="title" required>
        <label for="title" class="form-label">Title*</label>
    </div>

    <div class="form-outline mb-3">
        <textarea class="form-control" name="content" id="content" rows="5"></textarea>
        <label class="form-label" for="content">Content*</label>
    </div>

    <label for="InputGroupFile01" class="form-label">image:</label>
    <div class="input-group mb-3">
        <input type="file" name="image" class="form-control" id="image" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3 float-end">Add Article</button>
</form>
@endsection

@push('jsscripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#show1').on('click', function() {
            if($('#password').attr('type') == "text"){
                $('#password').attr('type', 'password');
                $('#eye1').addClass( "fa-eye-slash" );
                $('#eye1').removeClass( "fa-eye" );
            } else{
                $('#password').attr('type', 'text');
                $('#eye1').addClass( "fa-eye" );
                $('#eye1').removeClass( "fa-eye-slash" );
            }
        });
        $('#show2').on('click', function() {
            if($('#password2').attr('type') == "text"){
                $('#password2').attr('type', 'password');
                $('#eye2').addClass( "fa-eye-slash" );
                $('#eye2').removeClass( "fa-eye" );
            } else{
                $('#password2').attr('type', 'text');
                $('#eye2').addClass( "fa-eye" );
                $('#eye2').removeClass( "fa-eye-slash" );
            }
        });
        $('#province').change(function() {
            $('#munhide').removeAttr('hidden');
            var value1 = $('#province').val();
            $.get('/getMunicipality/' + encodeURIComponent(value1), function(data) {
                var options = '<option selected hidden value="">Municipality*</option>';
                var sortedData = Object.entries(data).sort((a, b) => a[1].localeCompare(b[1]));

                $.each(sortedData, function(key, value) {
                    options += '<option value="' + value[0] + '">' + value[1] + '</option>';
                });

                $('#municipality').html(options);
            });
        });
    });
</script>
@endpush