document.getElementById("formClient").addEventListener("submit", function (event) {
    let isValid = true;

    const nom = document.getElementById("nom_client").value.trim();
    const prenom = document.getElementById("prenom_client").value.trim();
    const email = document.getElementById("email_client").value.trim();
    const telephone = document.getElementById("telephone_client").value.trim();
    const adresse = document.getElementById("adresse_client").value.trim();

    const regexNomPrenom = /^[A-Za-zÀ-ÿ\s\-']{2,}$/; // Lettres, espaces, apostrophes et tirets
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Format email classique
    const regexTelephone = /^\d{10}$/; // 10 chiffres

    // Nom
    if (!regexNomPrenom.test(nom)) {
        isValid = false;
        document.getElementById("erreurNom").innerHTML = "❗ Nom invalide (lettres et minimum 2 caractères)";
    } else {
        document.getElementById("erreurNom").innerHTML = "";
    }

    // Prénom
    if (!regexNomPrenom.test(prenom)) {
        isValid = false;
        document.getElementById("erreurPrenom").innerHTML = "❗ Prénom invalide (lettres uniquement)";
    } else {
        document.getElementById("erreurPrenom").innerHTML = "";
    }

    // Email
    if (!regexEmail.test(email)) {
        isValid = false;
        document.getElementById("erreurEmail").innerHTML = "📧 Email invalide";
    } else {
        document.getElementById("erreurEmail").innerHTML = "";
    }

    // Téléphone
    if (!regexTelephone.test(telephone)) {
        isValid = false;
        document.getElementById("erreurTelephone").innerHTML = "📵 Téléphone invalide (10 chiffres)";
    } else {
        document.getElementById("erreurTelephone").innerHTML = "";
    }

    // Adresse
    if (adresse.length < 5) {
        isValid = false;
        document.getElementById("erreurAdresse").innerHTML = "🏠 Adresse trop courte";
    } else {
        document.getElementById("erreurAdresse").innerHTML = "";
    }

    // Si l'une des validations échoue, on empêche l'envoi du formulaire
    if (!isValid) {
        event.preventDefault();
    }
});