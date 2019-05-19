@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contact <a style="float: right" href="/contact/create">New Contact</a></div>

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr.no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job Title</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($contactDetails))
                                @php $i = 1; @endphp 
                                @foreach($contactDetails as $contactDetail)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="/contact/{{ $contactDetail->id }}">{{ $contactDetail->name }}</a></td>
                                        <td>{{ $contactDetail->email }}</td>
                                        <td>{{ $contactDetail->job_title }}</td>
                                        <td>{{ $contactDetail->city }}</td>
                                        <td>{{ $contactDetail->country }}</td>
                                        <td>
                                    
                                            <a style="float: left;margin-right: 5px;margin-bottom: 5px;" href="/contact/{{ $contactDetail->id }}/edit" class="btn btn-info btn-sm">Edit</a>
                                            <form method="POST" action="/contact/{{ $contactDetail->id }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onclick="return confirm('Do you really want to delete')" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
   
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection