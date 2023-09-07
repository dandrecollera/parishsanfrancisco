@extends('public_layout')

@section('content')
<main style="min-height: 100vh">
    <div class="container-xl">
        <a href="/news" class="btn btn-sm btn-primary float-start mt-3 d-inline-block">Back</a>

        <center>
            <h1 class="pt-5 text-dark mb-4">{{$db->title}}</h1>
            <img src="{{asset('storage/articles/' .$db->image  )}}"
                style="max-height: 400px; object-fit:cover; border-radius:30px; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);"
                class="img-fluid" />
            <p class=" pt-4 text-wrap text-break">{{$db->content}}</p>
        </center>

    </div>
</main>



@endsection