@extends('layouts.pages')

@section('title', 'Contact-Us')

@section('content')

<div class="about">
	<div class="container">
		<section class="title-section">
			<h1 class="title-header">Contact Us</h1>
		</section>
	</div>
</div>

<div class="contact">
	@include('admin.layout.message')
	<div class="container">
		<div class="row contact_top">
			<div class="col-md-4 contact_details">
				<h5>Mailing address:</h5>
				<div class="contact_address">{{ GetSettings('address') }}</div>
			</div>
			<div class="col-md-4 contact_details">
				<h5>Call us:</h5>
				<div class="contact_address">{{ GetSettings('mobile') }}<br>
				</div>
			</div>
			<div class="col-md-4 contact_details">
				<h5>Email us:</h5>
				<div class="contact_mail"><a href="mailto:{{ GetSettings('email') }}">{{ GetSettings('email') }}</a></div>
			</div>
		</div>
		<hr>
		<h3>Contact Form</h3>
		<p class="text-justify lead">
			{{ GetSettings('discription') }}
		</p>
		<hr>
		<div class="row">
			<div class="col-md-8" style="padding:15px">
				{!! Form::open(['url' => '/contact-us', 'method' => 'POST']) !!}
				<input type="hidden" value="{{ $auth->user_image }}" name="image">
				<div class="form-group">
					<input type="text" class="form-control" name="co_name" placeholder="Name">
				</div>
				<div class="form-group">
					<input type="email" value="{{ $auth->email }}" class="form-control" name="co_email" placeholder="Email">
				</div>
			
				<div class="form-group">
					<input type="text" class="form-control" name="co_subject" placeholder="Subject">
				</div>
			
				<div class="form-group">
					<select name="co_type" class="form-control">
						<option selected disabled value="">Select a Value</option>
						@foreach(contacts() as $key => $value)
							<option value="{{ $value }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>
			
				<div class="form-group">
					<textarea name="co_message" class="form-control" style="resize:none;" cols="9" rows="5" placeholder="Message.."></textarea>
				</div>
			
				<div class="form-group">
					<button style="width:150px;" type="submit" class="btn banner_btn btn-lg">{{ __('Send Message') }}</button>
				</div>
				{{ Form::close() }}
			</div>
			<div class="col-md-4">
				<h1>{{ __('What is Lorem Ipsum?') }}</h1>
				<p>
					{{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
					industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
					a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
					unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
					recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.') }}
				</p>
			</div>
		</div>
	</div>
</div>
@endsection