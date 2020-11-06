<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}

    <form class="container" action="verifyuser" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Contrasena</label>
            <input type="password" class="form-control" name="password" placeholder="Contrasena" required>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

</body>
</html>