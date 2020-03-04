@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">

        @if(session()->get('success'))
        <div class="alert alert-success">
            <p class="succ-msg">
                <font color="#fff" style="font-size: 14px;">{{ session()->get('success') }}</font>
            </p>

        </div>
        @endif
    </div>
    <div>
        <a style="margin: 19px; float:right;" href="{{ route('contacts.create')}}" class="btn btn-primary button">New
            contact</a>
    </div>
    <div class="col-sm-12">
        <h1 class="display-3">Contacts</h1>
        <table class="table table-striped" id="customers">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Job Title</th>
                    <th>City</th>
                    <th>Country</th>
                    <th colspan=2>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->job_title}}</td>
                    <td>{{$contact->city}}</td>
                    <td>{{$contact->country}}</td>
                    <td>
                        <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger button" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>
        </div>
        @endsection