<!DOCTYPE html>
<html>
<head>
    <title>Bulltrap</title>
</head>
<body style="background-color: #181623; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5em; margin: 0; padding: 0; display: grid; ">

<div style="margin: 40px auto; padding: 20px;  display: grid;">
{{--    <img src="https://i.ibb.co/2yVS2dx/quotes-Icon.png" alt="quote icon" style="border:0; display:flex; align-items:center; justify-content: center; margin: auto">--}}
    <p style="color: #DDCCAA; text-align: center">Bulltrap</p>
    <h1 style="color: #fff; font-size: 16px;
     margin-top: 8px; text-align: left">Hola </h1>

    <h1 style="color: #fff; font-size:16px;
     margin-top: 14px; text-align: left">{{ $user->name }}, thanks for joining Bulltrap! Please click the button below to verify your account:</h1>
    <button style="padding: 8px 12px; background-color: #E31221; border-radius: 4px;
     color: #fff; border: none; outline: none; margin-right: auto; margin-top: 22px;"><a href="{{ $activationLink }}" style="text-decoration: none; color: white"> Verify account</a></button>
{{--    <h1 style="color: #fff; font-size:16px;  margin-bottom: 20px;--}}
{{--     margin-top: 14px; text-align: left">If clicking doesn't work, you can try copying and pasting it to your browser:</h1>--}}
{{--    <p style="color: #DDCCAA; text-align: left">https://movie-quotes.com/activate/</p>--}}
    <h1 style="color: #fff; font-size:16px; font-weight: bold; margin-bottom: 20px;
     margin-top: 14px; text-align: left">If you have any problems, please contact us: support@bulltrap.cc</h1>
    <h1 style="color: #fff; font-size:16px; font-weight: bold; margin-bottom: 20px; margin-top: 14px; text-align: left">Bulltrap Crew</h1>
</div>
</body>
</html>
