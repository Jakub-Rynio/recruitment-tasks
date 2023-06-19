<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend/Full-stack recruitment task</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

<div id="container">

    <div class="starting-title">
        <h2>Jakub Rynio</h2> 
        <p>recruitment task</p>
    </div>

    <main id="user-info">
        <?php require_once './partials/main.php'; ?>
    </main>

    <h3 id="label_add_user">Add user to the list!</h3>

    <form method="POST" action="partials/add-user.php">
        <section>
            <fieldset>
                <legend>Personal Information</legend>
                <article>
                    <input placeholder="Name*" type="text" name="Name" required></input>
                    <input placeholder="Username*" type="text" name="Username" required></input>
                    <input placeholder="Email" type="email" name="Email"></input>
                    <input placeholder="Phone" type="tel" name="phone"></input>
                </article>
            </fieldset>
        </section>

        <section>
            <fieldset>
                <legend>Address</legend>
                <article>
                    <input placeholder="Street" type="text" name="Street"></input>
                    <input placeholder="Suite" type="text" name="Suite"></input>
                    <input placeholder="City" type="text" name="City"></input>
                    <input placeholder="Zipcode" type="text" name="Zipcode"></input>
                    <input placeholder="Latitude" type="text" name="lat"></input>
                    <input placeholder="Longitude" type="text" name="lng"></input>
                </article>
            </fieldset>
        </section>

        <section>
            <fieldset>
                <legend>Company Information</legend>
                <article>
                    <input placeholder="Website" type="text" name="Webside"></input>
                    <input placeholder="Company Name" type="text" name="com_name"></input>
                    <input placeholder="Catch Phrase" type="text" name="catchPhrase"></input>
                    <input placeholder="BS" type="text" name="bs"></input>
                </article>
            </fieldset>
        </section>

        <button type="submit" id="add-user-btn">Add</button>
    </form>

</div>

<script src="assets/js/script.js"></script>
</body>
</html>
