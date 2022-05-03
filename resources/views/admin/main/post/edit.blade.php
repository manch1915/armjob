@extends('admin.layout.layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.card-header -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group w-50">
                    <strong>Post title:</strong>
                    <input type="text" value="{{ $post->title }}" name="title" class="form-control " placeholder="Tag Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <srtong>Post body:</srtong>
                    <textarea id="full-featured" name="body">
                        {{ $post->body }}
                    </textarea>
                </div>
                <div class="form-group">
                    <strong>Breaking</strong>
                    <input type="checkbox" name="breaking" value="1" {{ $post->breaking ? 'checked' : '' }}>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3 w-25">Submit</button>
        </div>
    </form>
    <!-- /.card-body -->
</div>
<!-- /.content-wrapper -->
<script src="{{ asset('plugins/tinymce/tinymce.min.js')  }}"></script>
<script>
    tinymce.init({
        /* replace textarea having class .tinymce with tinymce editor */
        selector: "#full-featured",


        /* width and height of the editor */
        width: "100%",
        height: 400,

        /* display statusbar */
        statubar: true,

        /* plugin */
        plugins: [
            "advlist autolink link image lists charmap preview hr anchor pagebreak",
            "wordcount visualblocks visualchars code fullscreen nonbreaking",
            "save table directionality emoticons template paste"
        ],
        images_upload_url: "",
        images_upload_handler: function (blobInfo, success, failure) {
            success('data: ' + blobInfo.blob().type + ';base64,' + blobInfo.base64());
        },
        /* toolbar */
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| forecolor backcolor emoticons",

        /* style */
        style_formats: [
            {
                title: "Headers", items: [
                    {title: "Header 1", format: "h1"},
                    {title: "Header 2", format: "h2"},
                    {title: "Header 3", format: "h3"},
                    {title: "Header 4", format: "h4"},
                    {title: "Header 5", format: "h5"},
                    {title: "Header 6", format: "h6"}
                ]
            },
            {
                title: "Inline", items: [
                    {title: "Bold", icon: "bold", format: "bold"},
                    {title: "Italic", icon: "italic", format: "italic"},
                    {title: "Underline", icon: "underline", format: "underline"},
                    {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                    {title: "Superscript", icon: "superscript", format: "superscript"},
                    {title: "Subscript", icon: "subscript", format: "subscript"},
                    {title: "Code", icon: "code", format: "code"}
                ]
            },
            {
                title: "Blocks", items: [
                    {title: "Paragraph", format: "p"},
                    {title: "Blockquote", format: "blockquote"},
                    {title: "Div", format: "div"},
                    {title: "Pre", format: "pre"}
                ]
            },
            {
                title: "Alignment", items: [
                    {title: "Left", icon: "alignleft", format: "alignleft"},
                    {title: "Center", icon: "aligncenter", format: "aligncenter"},
                    {title: "Right", icon: "alignright", format: "alignright"},
                    {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                ]
            }
        ]
    });

</script>
@endsection


