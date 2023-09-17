@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('lang.Manage') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">{{ __('lang.ID') }}</th>
                            <th scope="col">{{ __('lang.Name') }}</th>
                            <th scope="col">{{ __('lang.Email') }}</th>
                            <th scope="col">{{ __('lang.Email_V') }}</th>
                            <th scope="col">{{ __('lang.Roles') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th> {{$user->id}}</th>
                                <th> {{$user->name}}</th>
                                <th> {{$user->email}}</th>
                                <th> {{$user->email_verified_at}}</th>
                                <th>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                <th>
                                    <a href="/admin/users/{{$user->id}}/edit" class="float-left">
                                        <button type="button" class="btn btn-primary btn-sm">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="admin/users/{{$user->id}}" method="POST" class="float-left">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="subit" class="btn btn-danger btn-sm">{{ __('lang.Delete') }}</button>
                                </form>
                                </th>
                            <tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                      {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


