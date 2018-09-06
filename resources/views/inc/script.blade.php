{{ Html::script('one/js/jquery.flexslider.js') }}
{{ Html::script('one/js/responsive-nav.js') }} 
{{ Html::script('one/js/bootstrap.min.js') }}
{{ Html::script('one/js/select2.min.js') }}
<script type="text/javascript">
	$(function(){
    	$('.select2').select2();
		$('.active-link a').css({
			'background-color':'#2ABB9B',
			'color':'#fff',
			'border-color':'#2ABB9B' 
		});
		$('.active-link span').css({
			'color':'#fff',
		});
	});
</script>