<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form action="/inscription" method="post">

    {{ csrf_field() }}

    <input type="email" name="email" placeholder="votre email" required>
    <input type="password" name="password" placeholder="votre mot de passe" required>
    <input type="password" name="confirm_password" placeholder="confirmer votre mot de passe" required>
    <input type="submit" value="M'inscrire">

  </form>
</body>
</html>
