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
@if($errors->has('email_reset'))
    <script>swal('Error!', '{{$errors->first('email_reset')}}', 'error');</script>

@endif
@if(session('error_change_password'))
    <script>swal('Error!', '{{session('error_change_password')}}', 'error');</script>

@endif
@if($errors->has('new_password_update'))
    <script>swal('Error!', '{{$errors->first('new_password_update')}}', 'error');</script>

@endif
@if(session('error_update_password'))
    <script>swal('Error!', '{{session('error_update_password')}}', 'error');</script>
@endif
@if(session('messageStatus') && session('error') == false)
    <script>
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title: '{{session('messageStatus')}}',
            showConfirmButton: false,
            timer: 800
        });
    </script>
@endif
@if(session('messageStatus') && session('error') == true)
    <script>
        Swal.fire({
            position: 'top-end',
            type: 'error',
            title: '{{session('messageStatus')}}',
            showConfirmButton: false,
            timer: 800
        });
    </script>
@endif

