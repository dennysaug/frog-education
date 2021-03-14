@extends('layouts.sysadmin')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">#{{ $quizz->id }} Quizz  {{ $total }}/{{ $quizz->quizzQuestions->count() }}</h3>
                </div>



                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            <!-- /.card-header -->
                <!-- form start -->
                {!! Form::model(isset($quizz)?$quizz:null, ['route' => ['sysadmin.quizz.question-store',isset($quizz)?$quizz:null]]) !!}
                @if(isset($quizz) && $quizz->quizzQuestions->count())
                    @foreach($quizz->quizzQuestions as $question)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            {{ $question->title }}
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        @foreach($question->alternatives as $alternative)
                                            <div class="form-group">
                                                {!! Form::label('alternative'.$alternative->id, $alternative->title)!!}
                                                @if(isset($answers[$alternative->id]) && $answers[$alternative->id] == 'Y')
                                                    <i class="fas fa-check"></i>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    @endforeach
                @endif
            <!-- /.card -->
                {!! Form::close() !!}
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
@endsection
