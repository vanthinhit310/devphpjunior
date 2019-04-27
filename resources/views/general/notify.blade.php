@if(session('message'))
    <script>swal('Successfully!', 'Your message has been sent. Thank you!', 'success');</script>
@endif
@if(session('messageError'))
    <script>swal('Sorry!', 'Error, your message hasn\'t been sent', 'error');</script>
@endif
@if(session('success'))
    <script>swal('Congratulations!', '{{session('success')}}', 'success');</script>
@endif
@if(session('error'))
    <script>swal('Error!', '{{session('error')}}', 'error');</script>
@endif
@if ($errors->has('email'))
    <script>swal('Error!', 'This email already exists.', 'error');</script>
@endif
@if($errors->has('email_log'))
    <script>swal('Error!', '{{$errors->first('email_log')}}', 'error');</script>

@endif


