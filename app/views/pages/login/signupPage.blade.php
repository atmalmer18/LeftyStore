@extends('layouts.default')

@section('pageTitle')
	<title>Sign up</title>

@stop

@section('content')
    <div class="container">
		
		<h1>Create a new account</h1>
		
		{{ Form::open(array('url'=>'/user/signup', 'files'=> true)) }}
			{{
				Form::macro('inputRow', function($inputType, $id, $placeholder, $rowSize){
					echo '<div class="col '.$rowSize.' input-field">';
					echo Form::input($inputType, $id, '' , array('id'=>$id, 'placeholder'=>$placeholder));
					echo Form::label($id, $placeholder, array('for'=>$id));
					echo '</div>';
				})
			}}
		
			<div class="row">
				{{ Form::inputRow('text', 'first_name','First Name','s4') }}
				{{ Form::inputRow('text', 'middle_name','Middle Name','s4') }}
				{{ Form::inputRow('text', 'last_name','Last Name','s4') }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'bank_acct_no','Bank Account No','s12') }}
			</div>
		
			<div class="row">
				<div class="col s6 input-field">
					{{ Form::input('date','birthday', ' ' , array('class'=>'datepicker','id'=>'birthday')) }}
					{{ Form::label('birthday', 'Birthday', array('for'=>'birthday')) }}
				</div>
				{{ Form::inputRow('number', 'age','Age','s6') }}
			</div>
		
			<div class="row">
			</div>
			<div class="row">
				{{ Form::hidden('interestNo',1,array('id'=>'interestNo')) }}
				<div class="col s11 input-field">
					{{ Form::label('interest', 'Interest 1', array('class' => '', 'for' => 'interest1')) }}
					{{ Form::input('text','interest1', '' , array('class'=>'interest','id'=>'interest1')) }}
				</div>
				<div class="col s1">
					<a id="incrementInterest" class="btn-floating addInterest"><i class="material-icons">add</i></a>
				</div>
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'username','Username','s12') }}
			</div>

			<div class="row">
				{{ Form::inputRow('password', 'password','Password','s6') }}
				{{ Form::inputRow('password', 'retype_password','Retype Password','s6') }}
			</div>

			<div class="row">
				{{ Form::inputRow('text', 'address','Address','s12') }}
			</div>
			
			<div class="row">
				<div class="file-field input-field">
					<div class="btn-flat btn waves-ripple waves-effect waves-teal">
						<span>File</span>
						{{ Form::file('avatar') }}
					</div>
					<div class="file-path-wrapper">
						{{ Form::text('avatarPath','',array('class'=>'file-path')) }}
					</div>
				</div>
			</div>
			
			<div class="row">
				<button type="submit" class="btn waves-effect waves-light green">Submit</button>
			</div>
		{{ Form::close() }}
		
	</div>

	<script>
		$('#incrementInterest').on('click',function(){
			var incre = ($('.interest').length + 1);
			var html = '' +
				'<div class="col s11 input-field">' +
					'<label for="interest'+incre+'" class="active">Interest '+incre+'</label>' +
					'<input class="interest" id="interest' + incre +'" name="interest'+incre+'" type="text" autocomplete="off">' +
				'</div>';
			$('#interestNo').val(incre);
			$(this).closest('.row').find('.col').last().after(html);
		});

		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 100 // Creates a dropdown of 15 years to control year
		});
	</script>
@stop