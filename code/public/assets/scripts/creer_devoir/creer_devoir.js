import formulaire_infos_devoir from "/assets/scripts/component/formulaire_infos_devoir.js";

if (id){
    Promise.all([
        fetch('/api/modules-' + id + '/groups'),
        fetch('/api/modules-' + id + '/teachers'),
        fetch('/api/salles')
    ]).then((responses) => {
        return Promise.all(responses.map((response) => {
            return response.json();
        }));
    }).then((json) => {
        var data = {}
        data.GROUPES_AVAILABLE = json[0];
        data.ORGANISATEUR_AVAILABLE = json[1];
        data.SALLES_AVAILABLE = json[2];

        data.ORGANISATEUR_AVAILABLE.forEach(elt => {elt.val = elt.PRENOMPROF + " " + elt.NOMEPROF});

        var submit = (result) => {
            result.module = id;

            result.orga = result.orga.map(elt => elt.LOGINPROF); //Réarrangement profs;

            var header = {
                method : 'PUT', 
                headers: {
                'Content-Type': 'application/json'
                },
                body : JSON.stringify(result)
            }

            fetch("/api/devoir/create-ds", header).then(res => {
                if (res.ok){
                    return res.text();
                } else {
                    return new Error(res.code);
                }
            }).then(text => {
                location.replace(text);
            }).catch(err => {
                console.log(err);
            })
        }

        var form = formulaire_infos_devoir(data, submit);

        document.getElementById("creer-devoir").appendChild(form);
        
    }).catch(function (error) {
        console.log(error);
    });
}