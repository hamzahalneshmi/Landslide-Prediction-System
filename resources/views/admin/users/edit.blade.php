@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('lang.Manage') }}</div>
                <div class="card-body">
                <form action="/admin/users/{{$user->id}}" method = "POST">
                    @csrf
                    {{method_field('PUT')}}
                    @foreach($roles as $role)
                        <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{$role->id}}"
                            {{$user->hasAnyRole($role->name)?'checked':''}}>
                            <label>{{ $role->name}}</label>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">
                            {{ __('lang.Update') }}
                        </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection