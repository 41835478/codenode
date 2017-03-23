<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆成功</title>
</head>
<body>
       <div>
           登陆成功，3秒后跳转
       </div>
</body>
<script>
    localStorage.setItem('username',"{{ $user->user['login'] }}");
    localStorage.setItem('avatar',"{{ $user->avatar }}")
    setTimeout("top.location.href='" + "/" + "'", 3000);
</script>
</html>