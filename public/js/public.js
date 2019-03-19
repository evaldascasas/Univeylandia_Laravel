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
        "theme": "classic",
        "position": "bottom-right",
        "content": {
            "message": "Aquesta pàgina web utilitza cookies per millorar l'experiència d'usuari.",
            "dismiss": "D'acord!",
            "link": "Més info",
            "href": "#"
        }
    })
});