import React from "react";

const Recherche = () => {

        const [recherche, setRecherche] = React.useState("");
    
        const changeValue = (e) => {
            setRecherche(e.target.value);
        }
    
        return(
            <>
                <input type="text" value={recherche} onChange={changeValue} />
                <button type="button" >Reptiles Volants</button>
                <button type="button" >Dinosaures</button>
                <button type="button" >Reptiles Marins</button>

            </>
        )
}

export default Recherche;