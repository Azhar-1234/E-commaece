@extends('backend.master')
@section('mainContent')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<style type="text/css">
.gallery
{
    display: inline-block;
    margin-top: 20px;
}
.close-icon{
    border-radius: 50%;
    position: absolute;
    right: 5px;
    top: -10px;
    padding: 5px 8px;
}
.form-image-upload{
    background: #e8e8e8 none repeat scroll 0 0;
    padding: 15px;
}
</style>
 <div class='list-group gallery'>
    <div class='text-center'>
        <h1>Slider gallery</h1>
    </div> <!-- text-center / end -->
    @if($images->count())
        @foreach($images as $image)
        <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
            <a class="thumbnail" rel="ligthbox" href="/uploads/slider/{{ $image->image }}">
                <img class="img-responsive" alt="" src="/uploads/slider/{{ $image->image }}" />
            </a>
            <form action="{{route('delete-gallery',$image->id) }}" method="POST">
                <input type="hidden" name="id" value="{{$image->id}}">
                {!! csrf_field() !!}
                <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
            </form>
        </div>
     <!-- col-6 / end -->
        @endforeach
    @endif
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection