<html>
<head>
    {include file="head.tpl"}
    <script src="app/js/validacionRegistro.js"></script>
</head>
<body>
    {include file="navbar.tpl"}

    <form id="form" class="container" action="registry" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Contrasena</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Contrasena" required>
        </div>
        <div class="form-group">
            <label>Confirmar contrasena</label>
            <input id="cPassword" type="password" class="form-control" name="cPassword" placeholder="Confirme la contrasena" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <p style="color: red" id="bad"></p>
    </form>

</body>
</html>