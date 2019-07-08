@extends('layout')


@section('title')
Customer List
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Customer List</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="customers" method="POST" class="pb-5">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control">
                <div>{{$errors->first('email')}}</div>
            </div>


            <button class="btn btn-primary" type='submit'>Add Customer</button>
            @csrf
        </form>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-12">
        <ul>
            @foreach ($key as $customer)
            <li>{{$customer->name}}<span class=" text-muted">({{$customer->email}})</span></li>
            @endforeach
        </ul>
    </div>
</div>

@endsection