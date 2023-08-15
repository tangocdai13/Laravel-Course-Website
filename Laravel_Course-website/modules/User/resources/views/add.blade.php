@extends('layouts.backend')
@section('content')
    <form action="" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name...">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email...">
        </div>

        <div class="form-group">
            <label for="">Group</label>
            <select name="" id="" class="form-select">
                <option value="">All Group</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password...">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
