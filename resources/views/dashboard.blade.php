@extends(Auth::user()->mutationActive()->department->id == 1 ? 'layouts.admin' : 'layouts.employee')
@section('title')
   Dashboard - FIMZ Cemerlang Bangsa
@endsection
@section('content')
@endsection
