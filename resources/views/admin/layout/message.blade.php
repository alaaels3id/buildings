@if(Session::has('flash_message'))
<div class="alert alert-success text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h3><strong>Messsage !!</strong> {{ Session::get('flash_message') }}.</h3>
</div>
@endif