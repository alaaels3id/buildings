  	<!-- jQuery 3 -->
    {{ Html::script('admin/bower_components/jquery/dist/jquery.min.js') }}
  	
    <!-- jQuery UI 1.11.4 -->
  	{{ Html::script('admin/bower_components/jquery-ui/jquery-ui.min.js') }}
  	
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  	<script>
  		$.widget.bridge('uibutton', $.ui.button);
  	</script>
  	
		<!-- Bootstrap 3.3.7 -->

  	{{ Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
  	
    <!-- Morris.js charts -->
  	{{ Html::script('admin/bower_components/raphael/raphael.min.js') }}
  	{{ Html::script('admin/bower_components/morris.js/morris.min.js') }}
  	
    <!-- Sparkline -->
  	{{ Html::script('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}
  	
    <!-- jvectormap -->
  	{{ Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
  	{{ Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
  	
    <!-- jQuery Knob Chart -->
  	{{ Html::script('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}
  	
    <!-- daterangepicker -->
  	{{ Html::script('admin/bower_components/moment/min/moment.min.js') }}
  	{{ Html::script('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}
  	
    <!-- datepicker -->
  	{{ Html::script('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
  	
    <!-- Bootstrap WYSIHTML5 -->
  	{{ Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
  	
    <!-- Slimscroll -->
  	{{ Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}
  	
    <!-- FastClick -->
  	{{ Html::script('admin/bower_components/fastclick/lib/fastclick.js') }}
  	
    <!-- AdminLTE App -->
  	{{ Html::script('admin/dist/js/adminlte.min.js') }}
  	
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  	{{ Html::script('admin/dist/js/pages/dashboard.js') }}

    {{-- dashboard 2 --}}
    {{ Html::script('admin/dist/js/pages/dashboard2.js') }}

    <!-- SlimScroll -->
    {{ Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}
    <!-- ChartJS -->
    {{ Html::script('admin/bower_components/chart.js/Chart.js') }}  	
    <!-- AdminLTE for demo purposes -->
  	{{ Html::script('admin/dist/js/demo.js') }}
		{{ Html::script('admin/cus/sweetalert2.all.js') }}
    {{ Html::script('admin/dist/js/select2.min.js') }}
    <script type="text/javascript">
        $('.select2').select2();
    </script>