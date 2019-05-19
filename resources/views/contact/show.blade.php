@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact details of {{ $contactDetails->name }} <a style="float: right" href="/contact">Go Back</a></div>
                <div class="card-body">
                       <h5>Fullname: {{ $contactDetails->name }}</h5>
                       <h5>Email: {{ $contactDetails->email }}</h5>
                       <h5>Email: {{ $contactDetails->job_title }}</h5> 
                       <h5>City: {{ $contactDetails->city }}</h5>
                       <h5>Country: {{ $contactDetails->country }}</h5> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection