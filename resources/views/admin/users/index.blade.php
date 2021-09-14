@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                 
                     <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">role</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                  
                                <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                 <a href=" {{ route('admin.users.edit', $user->id)}} "> <button type="button" class="btn btn-primary" class="float-left">Edit</button></a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left"> 
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning">Delet</button>
                                </form>
                                
                                </td>
                                </tr>
                                @endforeach
                                
                                <tr>
                                
                            </tbody>
                            </table>

                                            <div class="card-body">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection