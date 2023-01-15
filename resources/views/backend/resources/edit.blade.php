@extends('backend.layouts.master')
@section('title', 'Resources')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Resources</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>            
            <li class="active"><strong>Resources</strong></li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins DueDays">
    <div class="ibox-title">
        <div class="titleWrap">
            <h5>Edit page</h5>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-md-9">
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                    
                </div>
                @endif
            </div>
        </div>
       
        <form action="{{ route('resources.update', $page) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row col-md-9">

                 <div class="row">
                    <div class="col-md-10">                        
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title">Title</label>
                            <input type='text' name="title" class="form-control" value="{{ $page->title }}"/>
                            @error('title')
                            <div class="inline-errors">{{ $message }}</div>
                            @enderror                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="position">Order</label>

                            <input type='number' name="position" class="form-control" value="{{ $page->position }}" />
                            @error('position')
                                <div class="inline-errors">{{ $message }}</div>
                            @enderror        
                        </div>
                    </div>
                </div> 

                <div class="form-group @error('content') has-error @enderror">                    
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="4">{{ $page->content }}</textarea>
                    @error('content')
                    <div class="inline-errors">{{ $message }}</div>
                    @enderror                    
                   
                </div>
                <div class="form-group">
                    
                    <input type="submit" class="btn btn-lg btn-primary" value="Update">
                </div>
            </div>
           
        </form>
        <div class="clear"></div>
    </div>
</div>

        </div>
    </div>
</div>
    <script>
        // CK Editor
        CKEDITOR.replace('content');

    </script>
@endsection