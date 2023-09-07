@extends('public_layout')

@section('styles')
<style>
    .card-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        /* Limit to 2 lines */
        overflow: hidden;
    }
</style>
@endsection

@section('content')
<main style="min-height: 100vh">
    <center>
        <h1 class="pt-5 text-dark mb-3">News Section</h1>
    </center>
    <div class="container-xl">


        @php
        $count = DB::table('articles')
        ->where('status', 'active')
        ->count();

        $dbr = DB::table('articles')
        ->where('status', 'active')
        ->orderBy('id', 'desc')
        ->get()
        ->toArray();
        @endphp

        @if ($count > 0)

        <div class="row">
            @foreach ($dbr as $db)
            <div class="col-lg-4 mb-4">
                <div class="card ">
                    <img src="{{asset('storage/articles/' .$db->image  )}}" class="card-img-top"
                        style="max-height: 200px; object-fit:cover" />
                    <div class="card-body">
                        <h5 class="card-title">{{$db->title}}</h5>
                        <p class="card-text">
                            {{$db->content}}</p>
                        <a href="/newsarticle?id={{$db->id}}" class="btn btn-sm btn-primary">See More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</main>



@endsection