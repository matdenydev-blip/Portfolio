<?php

// Titre de la page
$title = "Me contacter"; 
?>
<h2>Contactez moi pour toutes informations</h2>

<p>Vous pouvez me contacter via le formulaire ci-dessous :</p>

<!-- Formulaire de contact -->
<form action="index.php?controller=contact&action=index" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <label for="message">Message :</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Envoyer</button>
</form>
<!-- Fin du formulaire de contact -->

<p>Je réponds généralement sous 48h.</p>