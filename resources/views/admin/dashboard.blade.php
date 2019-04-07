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
        display: none;
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
                <div class="input-group">
                    <input type="text" name="search_value" placeholder="Cari pasien disini ..." class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat" id="btn_search">Cari</button>
                    </span>
                </div>
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
                                <!-- ... -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>            

        </div>
    </div>
</section>

<script>

    var search = function(search_value){
        if (search_value=="") {
            return false;
        }
        $.ajax({
            url: "/admin/dashboard/search/?q=" + encodeURIComponent(search_value),
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
        
        $("#btn_search").on("click", function(){
            var search_value = $("input[name='search_value']").val();
            search(search_value);
        });

    });

</script>