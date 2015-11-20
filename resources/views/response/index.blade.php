@extends('layout.master')

@section('container')
 
<h1>数据库内容</h1>
<div class="col-lg-8">
    {!!Form::open(['url'=>'/'])!!}
    <div class="input-group">
        {!!Form::text('url','',['class'=>'form-control input-lg','placeholder'=>'Please input the Url'])!!}
		<span class="input-group-btn">
         {!!Form::submit('Submit',['class'=>'btn btn-success btn-lg'])!!}
        </span>
       </div><!-- /input-group -->
        {!!Form::close()!!}
          <br><br>
		  @if(!empty($errors->first('url')))
             

                <div class="alert alert-warning alert-dismissable">
                <br>
                  {!!$errors->first('url')!!}
          </div>
                
          @endif

</div><!-- /.col-lg-8 -->
		
@stop
		