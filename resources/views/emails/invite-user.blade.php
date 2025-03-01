<!DOCTYPE html>
<html>
<head>
    <title>Invitation to Register</title>
</head>
<body>
    <h2>Hello,</h2>
    <p>You have been invited to register. Click the link below to complete your registration:</p>
    <a href="{{ route('user.invitation', ['token' => $token]) }}">Register Here</a>

    <p>If you did not request this, please ignore this email.</p>
</body>
</html>
