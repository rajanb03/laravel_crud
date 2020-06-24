<!DOCKTYPE html>
<html>
    <body>
        <div>
                <h1> Dear {{$user->name}}, </h1><br>
                <span> 
                    Your Account has been created. Please 
                    <a href="http://127.0.0.1:8000/api/email/verify/{{$user->id}}"> Click Here </a>to verify.
                </span>
        </div>
    </body>
</html>