<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Test Form</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css">
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .column {
            max-width: 450px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/g/jquery@3.2.1,semantic-ui@2.2.10"></script>
    <script type="text/javascript">
        $(function() {
            $('.ui.checkbox').checkbox();
        });
    </script>
</head>
<body>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <i class="add user icon"></i>
            <div class="content">
                Create A User
            </div>
        </h2>
        <form method="post" class="ui large form">
            <div class="ui segment">
                <div class="field">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" tabindex="0" class="hidden" name="terms">
                        <label>I agree to the Terms and Conditions</label>
                    </div>
                </div>
                <button class="ui button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/g/jquery@3.2.1,semantic-ui@2.2.10"></script>
</body>
</html>

<?php
if($_POST) {

    try {
        /* NEVER hardcode configuration and credentials into code */
        $dbh = new PDO("mysql:dbname=vagrant_intro;host=10.0.0.20", 'vagrant', 'password');

        createUser($dbh, $_POST['username']);

        $users = getUsers($dbh);

    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }

}

function createUser($dbh, $username) {
    $query = $dbh->prepare("INSERT INTO users (username) VALUES (:username)");
    $query->bindParam(':username', $username);
    $query->execute() or die(var_dump($dbh->errorInfo()));
}

function getUsers($dbh) {
    // TODO: get users so that that can be output in a table.
    // Docs: http://php.net/manual/en/pdostatement.fetchall.php
}