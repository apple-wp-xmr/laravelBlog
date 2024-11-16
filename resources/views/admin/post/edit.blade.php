@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Post v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">post form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group w-50">
                                        <label for="postName">post</label>
                                        <input type="text" class="form-control" id="postName" name="title"
                                            value="{{ $post->title }}" placeholder="post name">
                                        @error('title')
                                            <div class="text-danger">This field can't be empty</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                        @error('content')
                                            <div class="text-danger">This field can't be empty</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img class="w-25" src="{{ asset('storage/' . $post->preview_image) }}"
                                            alt="">
                                    </div>
                                    <div class="form-group w-50">
                                        <label for="exampleInputFile">Add preview image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="preview_image"
                                                    name="preview_image">
                                                <label class="custom-file-label" for="preview_image">Choose Image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('preview_image')
                                            <div class="text-danger">This field can't be empty</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img class="w-25" src="{{ asset('storage/' . $post->main_image) }}"
                                            alt="">
                                    </div>
                                    <div class="form-group w-50">
                                        <label for="exampleInputFile">Add main image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="main_image"
                                                    name="main_image">
                                                <label class="custom-file-label" for="main_image">Choose Image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('main_image')
                                            <div class="text-danger">This field can't be empty</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-50">
                                        <label>Select Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                    {{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <div class="select2-purple">
                                            <select class="select2" multiple="multiple" name="tag_ids[]"
                                                data-placeholder="Select Tags" data-dropdown-css-class="select2-purple"
                                                style="width: 100%;">
                                                @foreach ($tags as $tag)
                                                    <option
                                                        {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                                        value="{{ $tag->id }}">{{ $tag->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update post</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection('content')
