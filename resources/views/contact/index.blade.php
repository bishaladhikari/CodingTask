@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row m-t-40">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <a href="{{route('contact.create')}}" class="btn btn-primary pull-right">Create New Contact</a>
                </div>

                <div class="row m-t-20">
                    <div class="panel">
                        <div class="panel-heading">
                            <b>List of all the clients</b>
                            <span class="pull-right">
                                <a href="{{route('file.export')}}" class="btn btn-outlined">Export File</a>

                            </span>

                        </div>
                        <div class="panel-body  table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email</td>
                                    <td>Gender</td>
                                    <td>Phone</td>
                                    <td>Address</td>
                                    <td>Nationality</td>
                                    <td>Education Background</td>
                                    <td>Mode of Contact</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>



                                @if(!empty($contacts))
                                    @foreach($contacts as $index=>$contact)
                                        <tr>
                                            <td>@if($contact->firstname){{$contact->firstname}}@else N/A @endif</td>
                                            <td>{{$contact->lastname}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->gender?$contact->gender:'N/A'}}</td>
                                            <td>{{$contact->phone?$contact->phone:'N/A'}}</td>
                                            <td>{{$contact->address?$contact->address:'N/A'}}</td>
                                            <td>{{$contact->nationality?$contact->nationality:'N/A'}}</td>
                                            <td>{{$contact->education_background?$contact->education_background:'N/A'}}</td>
                                            <td>{{$contact->mode_of_contact?$contact->mode_of_contact:'N/A'}}</td>
                                            <td><a href="#" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection