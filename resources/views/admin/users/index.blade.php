@extends('admin.layout.master') 
@section('title', 'Users') 
@section('style') 
    {{ Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
@stop
 
@section('content')

<section dir="rtl" class="content-header">
    <h1 class="pull-left" dir="ltr">Data Tables<small>advanced tables</small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}">Home</a></li>
        <li class="active h4">Users</li>
    </ol>
</section>

<br><br>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Display all Users</h3>
                </div>

                <div class="box-body">
                    <table id="data" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr><th>{{ __('#') }}</th><th>Name</th><th>MY Buildings</th><th>Email</th><th>DOB</th><th>Location</th><th>Iamge</th><th>Edit</th><th>Delete</th></tr>
                        </thead>

                        <tbody class="text-center" style="font-size: 15px;">
                        </tbody>

                        <tfoot>
                            <tr><th>{{ __('#') }}</th><th>Name</th><th>MY Buildings</th><th>Email</th><th>DOB</th><th>Location</th><th>Iamge</th><th>Edit</th><th>Delete</th></tr>
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
        
        if($(this).index()  < 6 && $(this).index() != 2 ){
            var classname = $(this).index() == 7  ?  'date' : 'dateslash';
            var title = $(this).html();    
            $(this).html(`<input type="text" class="${classname}" data-value="${$(this).index()}" placeholder=" Search ${title}"/>`);
        }
    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin-panal/users/data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'mybus', name: 'mybus'},
            {data: 'email', name: 'email'},
            {data: 'dob', name: 'dob'},
            {data: 'location', name: 'location'},
            {data: 'user_image', name: 'user_image'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ],
        
        "stateSave": false,
        "responsive": true,
        "order": [[0, 'ASC']],
        "pagingType": "full_numbers",
        
        aLengthMenu: [[10, 50, 100, 200, -1], [10, 50, 100, 200, "All"]],
        iDisplayLength: 10,
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
        ,initComplete: function (){
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
            table
            .column(colIdx)
            .search(this.value)
            .draw();
        });
    });
    
    table.columns().eq(0).each(function(colIdx) {
        $('select', table.column(colIdx).header()).on('change', function() {
            table
            .column(colIdx)
            .search(this.value)
            .draw();
        });

        $('select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });
    
    $('#data tbody').on( 'mouseover', 'td', function (){
        var colIdx = table.cell(this).index().column;
        if ( colIdx !== lastIdx ) {
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        }
    })
    .on( 'mouseleave', function () {
        $( table.cells().nodes() ).removeClass( 'highlight' );
    });

</script>
@stop