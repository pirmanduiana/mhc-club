<section class="content">
    <div class="row">        
        <div class="col-md-12">
            <div class="box box-info">                
                <div class="box-header with-border">
                    <h3 class="box-title">Halaman ini digunakan untuk import data karyawan pada suatu client</h3>                    
                </div>                
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('salah'))
                        <div class="alert alert-danger">
                            {{ session('salah') }}
                        </div>
                    @endif
                    <form method="post" action="{{ url('/admin/import/karyawan/proses') }}" name="frmimport" files="true" enctype="multipart/form-data">
                    @csrf
                        <p class="margin">Pilih client</p>
                        <div class="input-group input-group-sm">
                            <select class="form-control" name="client_id">
                                @foreach($clients as $k=>$c)
                                <option value="{{$c->id}}">{{$c->code ." - ". $c->name}}</option>
                                @endforeach
                            </select>                            
                        </div>
                        <p class="margin">Metode import</p>
                        <div class="input-group input-group-sm">
                            <input type="radio" name="import_type" value="0"> Timpa data sebelumnya!
                            &nbsp;&nbsp;
                            <input type="radio" name="import_type" value="1" checked> Tambahkan data sebelumnya!
                        </div>
                        <p class="margin">Buka file csv</p>
                        <div class="input-group input-group-sm">
                            <input type="file" name="sample_file" class="form-control">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-info btn-flat">Import!</button>
                            </span>
                        </div>
                    </form>

                </div>            
            </div>
        </div>  
    </div>   
</section>

<script>

    $(function(){
        $('select').select2();
    })

</script>