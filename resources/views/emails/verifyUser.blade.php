<!DOCTYPE html>
<html>
<head>
    <title>Mail de Bienvenue</title>
</head>

<body>
    <h2>Bienvenue sur note site</h2>
    <br/>
    Nous vous remercions de votre inscription {{$user['name']}}.
    Votre adresse mail que vous nous avez renseigné {{$user['email']}} , Merci de cliquer sur le lien afin de valider votre adresse mail.
    <br/>
    <a href="{{url('user/verify', $user->verifyUser->token)}}">Vérification E-mail</a>
</body>
</html>