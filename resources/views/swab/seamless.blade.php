<style>
    section.container {
        padding: 30px 0 30px 0;
    }
</style>

<section class="container">
    <fieldset>
        <legend>Sembunyiin pake yg ini</legend>
        <div class="form-group">
            <form name="frmSl">
            <label class="col-sm-1 control-label"> Pilih data</label>
            <div class="col-sm-5">
                <div class="input-group input-group-sm">
                    <select name="swabs[]" class="select2 form-control" multiple="multiple">
                        @foreach ($swabs as $item)
                            <option value="{{$item->id}}">{{$item->no_identitas ." - ". $item->nama_pasien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary" id="btnProses">Sembunyikan</button>
            </div>
            </form>
        </div>
    </fieldset>

    <fieldset>
        <legend>Salah sembunyiin?, balikin pake yg ini</legend>
        <div class="form-group">
            <form name="frmSl">
            <label class="col-sm-1 control-label"> Pilih data</label>
            <div class="col-sm-5">
                <div class="input-group input-group-sm">
                    <select name="sled[]" class="select2 form-control" multiple="multiple">
                        @foreach ($yg_sudah_kadung_disl as $item)
                            <option value="{{$item->id}}">{{$item->no_identitas ." - ". $item->nama_pasien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary" id="btnBalikin">Balikin</button>
            </div>
            </form>
        </div>
    </fieldset>
</section>

<link rel="stylesheet" href="{{asset('/vendor/laravel-admin/AdminLTE/plugins/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
<script src="{{asset('/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/vendor/laravel-admin/AdminLTE/plugins/select2/select2.full.min.js')}}"></script>

<script>
    function proses(element, sl)
    {
        var data = $("select[name='"+element+"[]']").val();
        $.ajax({
            url: '/admin/swabsl/proses',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                swabs: data,
                sl: sl
            },
            dataType: 'json'
        }).done(function(res){
            alert('Data sudah diproses!');
            location.reload();
        });
    }

    (function(){
        $(".select2").select2();

        $("#btnProses").on("click", function(e){
            e.preventDefault();
            proses('swabs', 1);
        });

        $("#btnBalikin").on("click", function(e){
            e.preventDefault();
            proses('sled', 0);
        });
    })();
</script>