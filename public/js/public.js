feather.replace({style: "width:1em"});

window.addEventListener("load", function () {
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#237afc"
            },
            "button": {
                "background": "#fff",
                "text": "#237afc"
            }
        },
        "type": "opt-out",
        "theme": "classic",
        "position": "bottom-left",
        "content": {
            "message": "Aquesta pàgina web utilitza cookies per millorar l'experiència d'usuari.",
            "allow": "D'acord!",
            "deny": "No, gràcies.",
            "link": "Més info",
            "href": "#"
        }
    })
});