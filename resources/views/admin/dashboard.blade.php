<style>
    .title {
        text-align: center;
        font-size: 3em;
        color: #d60e4d;;
        font-weight: bold;
    }
    .input-group {
        width: 50%;
        left: 25%;
    }
    .links {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .row {
        margin-bottom: 25px;
    }
    #box_searchresult {
        /* display: none; */
    }
    .highlight {
        background-color: #2ecc71;
    }
</style>

<section class="content">                    
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                @if(!empty($provider))
                    {{ $provider->name }}
                @else
                    MHC
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="links">
                <a href="{{ url('/admin/billing') }}">Billing <i class="fa fa-external-link"></i></a>
                <a href="{{ url('/admin/report') }}">Reports <i class="fa fa-external-link"></i></a>
                <a href="{{ url('/admin/client') }}">Clients <i class="fa fa-external-link"></i></a>
            </div>
            <div class="title">
                <form name="frmSearchPx" method="GET" action="/admin/dashboard/search">
                    <div class="input-group">
                        <input type="text" name="s" placeholder="Cari pasien disini ..." class="form-control" value="{{app('request')->input('s')}}" required>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success btn-flat" id="btn_search">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="box box-solid" id="box_searchresult">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; padding: 7px 10px; margin-top: 0;">
                        Hasil pencarian
                    </h4>
                    <div class="media">                        
                        <div class="media-body">
                            <div class="clearfix" id="div_searchresult">
                                @if(empty($grouped))
                                    Tidak ada hasil pencarian...
                                @else
                                    <table class="table" border="0">    
                                        <tbody>
                                        @foreach($grouped as $k=>$g)
                                            <tr>
                                                <td colspan="8" class="client bold">{{$k}}</td>
                                            </tr>
                                            <tr>
                                                <td width="10%" class="bold">ID</td>
                                                <td width="10%" class="bold">Kode MHC</td>
                                                <td width="20%" class="bold">Nama</td>            
                                                <td width="10%" class="bold">Status</td>
                                                <td width="10%" class="bold">Pilihan</td>
                                            </tr>
                                            @foreach($g as $x=>$y)
                                            <tr class="tr-result">
                                                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['id']}}</td>
                                                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['mhc_code']}}</td>
                                                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['name']}}</td>
                                                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['type']}} <span class='label label-{{$y["status_name"]=="Active"?"info":"danger"}}'>{{$y['status_name']}}</span></td>
                                                <td class="{{$y["status_name"]=="Active"?"black":"red"}}"><a href="{{$y['view_url']}}">Lihat detail</a></td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>    
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>            

        </div>
    </div>
</section>

<script>

    var search = function(s){
        if (s=="") {
            return false;
        }
        $.ajax({
            url: "/admin/dashboard/search/?q=" + encodeURIComponent(s),
            type: "get",
            dataType: "html"
        }).done(function(html){
            // ...
            $("#box_searchresult").show();            
            $("#div_searchresult").html(html);

        }).fail(function(xhr){
            //...
        });
    }
    
    $(document).ready(function(){
        
        // $("#btn_search").on("click", function(){
        //     var s = $("input[name='s']").val();
        //     search(s);
        // });
        
        var term = $('input[name="s"]').val();
        $("body").highlight(term);
        
    });

</script>