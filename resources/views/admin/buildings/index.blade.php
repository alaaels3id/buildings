@extends('admin.layout.master') 

@section('title', 'Buildings') 

@section('style') 
  {{ Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
@stop
 
@section('content')

    <section class="content-header">
        <h1>Data Tables<small>advanced tables</small></h1>
        <ol class="breadcrumb">
            <li class="h4"><a href="{{ route('admin-panal') }}">Home</a></li>
            <li class="active h4">Buildings</li>
        </ol>
    </section>

    <br><br>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header"><h3 class="box-title">Display all Buildings</h3></div>
                    <div class="box-body">
                        <table id="data" class="table table-bordered table-hover text-center" style="font-size: 15px;">
                            <thead>
                                <tr><th>{{ __('#') }}</th><th>Name</th><th>Price</th><th>Governmente</th><th>Rent</th><th>Type</th><th>Status</th><th>Edit</th><th>Delete</th></tr>
                            </thead>

                            <tbody></tbody>
                            
                            <tfoot>
                                <tr><th>{{ __('#') }}</th><th>Name</th><th>Price</th><th>Governmente</th><th>Rent</th><th>Type</th><th>Status</th><th>Edit</th><th>Delete</th></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
 
@section('script') 
    {{ Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }} 
    {{ Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    
    <script type="text/javascript">
    var lastIdx = null;

    $('#data thead th').each( function () {
        if($(this).index()  < 2){
        
            var classname = $(this).index() == 6  ?  'date' : 'dateslash';
            var title = $(this).html();
            $(this).html(`<input type="text" class="${classname}" data-value="${$(this).index()}" placeholder="Search ${title}"/>`);
        
        }else if($(this).index() == 4){
        
            $(this).html('<select>'@foreach (rent() as $key => $value)+'<option value="{{ $key }}">{{ $value }}</option>'@endforeach+'</select>');
        
        }else if($(this).index() == 3){
        
            $(this).html('<select>'@foreach (gov() as $key => $value)+'<option value="{{ $key }}">{{ $value }}</option>'@endforeach+'</select>');
        
        }else if($(this).index() == 5){
        
            $(this).html('<select>'@foreach (type() as $key => $value)+'<option value="{{ $key }}">{{ $value }}</option>'@endforeach+'</select>');
        
        }else if($(this).index() == 6){
            $(this).html('<select>'@foreach (status() as $key => $value)+'<option value="{{ $key }}">{{ $value }}</option>'@endforeach+'</select>');
        }
    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin-panal/buildings/data'.$id) }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'bu_name', name: 'bu_name'},
            {data: 'bu_price', name: 'bu_price'},
            {data: 'bu_gov', name: 'bu_gov'},
            {data: 'bu_rent', name: 'bu_rent'},
            {data: 'bu_type', name: 'bu_type'},
            {data: 'bu_status', name: 'bu_status'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'},
        ],
        "stateSave": false,
        "responsive": true,
        "order": [[0, 'desc']],
        "pagingType": "full_numbers",
        aLengthMenu: [
            [50, 60, 100, 500, -1],
            [50, 60, 100, 500, "All"]
        ],
        iDisplayLength: 50,
        fixedHeader: true,

        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "csv",
                    "sButtonText": "Excel File",
                    "sCharSet": "utf16le"
                },
                {
                    "sExtends": "copy",
                    "sButtonText": "Copy Information",
                },
                {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "mColumns": "visible",
                }
            ],
            "sSwfPath": "{{ Request::root() }}/admin/cus/copy_csv_xls_pdf.swf"
        },

        "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
        ,initComplete: function ()
        {
            var r = $('#data tfoot tr');
            r.find('th').each(function(){
                $(this).css('padding', 5);
            });
            $('#data thead').append(r);
            $('#search_0').css('text-align', 'center');
        }
    });

    table.columns().eq(0).each(function(colIdx) {
        $('input', table.column(colIdx).header()).on('keyup change', function() {
            table.column(colIdx).search(this.value).draw();
        });
    });

    table.columns().eq(0).each(function(colIdx) {
        $('select', table.column(colIdx).header()).on('change', function() {
            table.column(colIdx).search(this.value).draw();
        });

        $('select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });
    </script>
@stop