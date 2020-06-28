<style>
    .has-many label {
        margin-right: 10px;
        padding: 5px 0 5px 0 !important;
    }
    .has-many .fields-group {
        display: flex;
        padding-left: 13%;
    }
    .has-many .fields-group .form-group {
        margin-right: 10px !important;
        margin-left: 0px !important;
        width: 212px;
    }
    .has-many .form-group.button {
        width: 100px;
    }
    .total {
        border-top: 1px solid #eccccc;
        padding-top: 8px;
        font-weight: bold;
        font-size: 18pt;
    }
    .ttlQty, .ttlPrice {
        text-align: center;
    }
    .grand-total {
        background-color: orange;
    }
</style>

<div class="row">
    {{-- <div class="{{$viewClass['label']}}"><h4 class="pull-right">{{ $label }}</h4></div> --}}
    <div class="{{$viewClass['field']}}"></div>
</div>

<hr style="margin-top: 0px;">

<div class="has-many">
    <div id="has-many-{{$column}}" class="has-many-{{$column}}">
        <div class="has-many-{{$column}}-forms">
            @foreach($forms as $pk => $form)
                <div class="has-many-{{$column}}-form fields-group" style="display: flex;">
                    @foreach($form->fields() as $field)
                        {!! $field->render() !!}
                    @endforeach
                    @if($options['allowDelete'])
                        <div class="form-group button">
                            <label class="{{$viewClass['label']}} control-label"></label>
                            <div class="{{$viewClass['field']}}">
                                <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash">&nbsp;</i>{{ trans('admin.remove') }}</div>
                            </div>
                        </div>
                    @endif
                    <hr>
                </div>
            @endforeach
        </div>

        <template class="{{$column}}-tpl">
            <div class="has-many-{{$column}}-form fields-group" style="display: flex;">
                {!! $template !!}
                <div class="form-group button">
                    <label class="{{$viewClass['label']}} control-label"></label>
                    <div class="{{$viewClass['field']}}">
                        <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;{{ trans('admin.remove') }}</div>
                    </div>
                </div>
                <hr>
            </div>
        </template>

        @if($options['allowCreate'])
        <div class="form-group">
            <label class="{{$viewClass['label']}} control-label"></label>
            <div class="{{$viewClass['field']}}">
                <div id="btnAdd" class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;{{ trans('admin.new') }}</div>
            </div>
        </div>
        @endif
    </div>
    
    <div class="fields-group total">
        <div class="form-group">
            <label for="price" class="col-sm-2  control-label"></label>
            <div class="col-sm-8">                        
                Total (Rp.)
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2  control-label"></label>
            <div class="col-sm-8 ttlQty">
                {{--  --}}
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2  control-label"></label>
            <div class="col-sm-8">                        
                {{--  --}}
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2  control-label"></label>
            <div class="col-sm-8 ttlPrice">
                {{--  --}}
            </div>
        </div>
        <div class="form-group grand-total">
            <label for="price" class="col-sm-2  control-label"></label>
            <div class="col-sm-8 grandTotal">
                {{--  --}}
            </div>
        </div>
    </div>
</div>

{{-- hiddens --}}
<input type="hidden" value="{{$column}}" name="im">

<script>
    qtys = ".qty:visible";
    prices = ".price:visible";
    totals = ".rwTtl:visible";
    im = $("input[name='im']").val();

    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    function getSumQty(){
        var tq = parseFloat(0);
        $(qtys).each(function(){
            tq = tq + parseFloat(this.value);
        });
        return tq;
    }
    function getSumPrice(){
        var tp = parseFloat(0);
        $(prices).each(function(){
            tp = tp + parseFloat(this.value);
        });
        return tp;
    }
    function getGrandTtl(){
        var rwTtl = parseFloat(0);
        $(totals).each(function(){
            rwTtl = rwTtl + parseFloat(this.value);
        })
        return rwTtl;
    }
    function getRowTotal(elId, qty){
        var rwTtl = parseFloat(qty) * parseFloat($("input[name='"+im+"["+elId+"][price]']").val());        
        return rwTtl;
    }
    function getEachRowTotal(){
        $(totals).each(function(){
            var elName = this.name;
            var itmId = item.getId(elName);            
            var qty = $("input[name='"+im+"["+itmId+"][qty]']").val();
            $("input[name='"+im+"["+itmId+"][rwTtl]']").val(getRowTotal(itmId, qty));
        })
    }

    var item = {
        'getId' : function(en){
            id = en.replace(im,'');
            id = id.replace(/inv_items_id|qty|rwTtl|price/g,'')
            id = id.replace(/[\[\]']+/g,'');
            return id;
        },
        'getProp' : function(brgId, itmId)
        {
            $.ajax({
                url: '/admin/inventory/barang/' + brgId,
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    console.log('waiting...!');
                }
            }).done(function(res){
                console.log('finish...!');
                if (res.success) {
                    $("select[name='"+im+"["+itmId+"][inv_units_id]']").val(res.data.inv_units_id).trigger('change');
                    $("input[name='"+im+"["+itmId+"][price]']").val(res.data.sales_price);
                    $("input[name='"+im+"["+itmId+"][qty]']").focus().select();
                }
            }).fail(function(fail){
                return fail;
            });
        }
    };

    $(function(){

        getEachRowTotal();
        $("div.grandTotal").html(addCommas(getGrandTtl()));

        $(document).on('keyup', qtys, function(){
            var elName = this.name;
            var itmId = item.getId(elName);
            $("input[name='"+im+"["+itmId+"][rwTtl]']").val(getRowTotal(itmId, this.value));
            $("div.grandTotal").html(addCommas(getGrandTtl()));
        });
        $(document).on('keyup', prices, function(){
            var elName = this.name;
            var itmId = item.getId(elName);
            var qty = $("input[name='"+im+"["+itmId+"][qty]']").val();
            $("input[name='"+im+"["+itmId+"][rwTtl]']").val(getRowTotal(itmId, qty));
            $("div.grandTotal").html(addCommas(getGrandTtl()));
        });
        $(document).on('click', '.remove', function(){            
            $("div.grandTotal").html(addCommas(getGrandTtl()));
        });

        console.clear();
        $(document).on('change', '.inv_items_id', function(){
            console.clear();
            var elName = this.name;
            var itmId = item.getId(elName);            
            var brgId = this.value;
            item.getProp(brgId, itmId);
        });

    });
</script>