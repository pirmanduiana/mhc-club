<section class="content">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <a href="">Download Excel xls</a> |

            <a href="">Download Excel xlsx</a> |

            <a href="">Download CSV</a>

        </div>

    </div>     

            <form method="post" name="frmimport" files="true">
            @csrf

                <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}

                            <div class="col-md-9">

                            {!! Form::file('sample_file', array('class' => 'form-control')) !!}

                            {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}

                            </div>

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}

                    </div>

                </div>

            </form>

    </div>

</div>