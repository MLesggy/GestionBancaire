const urlParams = new URLSearchParams(window.location.search);
    const erreur = urlParams.get('erreur');

    if (erreur === 'compte_existant') {
        const div = document.getElementById('erreur');
        div.innerHTML = "🚫 <strong>Impossible de supprimer ce client :</strong> il est associé à un compte bancaire.";
        // supprimer le paramètre "erreur" de l'URL sinon le message d'erreur reste affiché
        urlParams.delete('erreur');
        window.history.replaceState({}, document.title, window.location.pathname + '?' + urlParams.toString());
    }