<h1>logIn</h1>
<body>
        <form action="<?= site_url(route_to('login')) ?>" method="post">
            
            <div>
                <label for="id">Identifiant </label>
                <input type="text" name="id" id="id" required>
            </div>
            <div>
                <label for="pwd">Prénom : </label>
                <input  type="text" name="pwd" id="pwd" required>
            </div>
            <div>
                <label for="connect">Se connecter</label>
                <input type="submit" name=connect value="login">
            </div>
        </form>
    </body>
