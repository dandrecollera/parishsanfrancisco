@extends('admin.components.modal')



@section('content')

@if (!empty($query))
<hr>
<h5>
    {{ \Carbon\Carbon::create($query['year'], $query['month'], $query['day'])->format('F j, Y') }} Schedule
</h5>
@else

@endif
@endsection