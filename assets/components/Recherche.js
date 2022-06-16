import React from "react";

const Recherche = () => {
    
    const [recherche, setRecherche] = React.useState("");

    //prévoir un state qui contiendra les résultats de la recherche , par défaut c'est un tableau vide  
    const [result, setResult] = React.useState([]);
    
        //exécuter du code que lorsque un state a changé
        React.useEffect(() =>{
            
            //envoyer une requête ajax (fetch) pour consulter la bdd sur les dinosaures dont le nom contient ce qui a été tapé dans l'input
            window.fetch('/search/' + recherche)
    
            .then(response => {
                console.log(response);
                return response.json()
            })
    
            .then(resultat => {
                setResult(resultat);
                console.log(result);
            })
        }, [recherche]);


        const changeValue = (e) => {
            setRecherche(e.target.value);
        }

        
        //prévoir un container vide dans le JSX<ul> par ex
        return(
            <>
                <input type="text" value={recherche} onChange={changeValue} placeholder='Recherche' />

                <ul>
                    {result.map((res, i) => <li key={i}>{res}</li>)}
                </ul>

                <button type="button" >Reptiles Volants</button>
                <button type="button" >Dinosaures</button>
                <button type="button" >Reptiles Marins</button>

            </>
        )
}

export default Recherche;