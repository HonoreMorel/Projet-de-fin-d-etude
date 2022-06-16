import React from "react";

const Filter = () => {

    return(
        <>
        
            <div id="famille">
                <label htmlFor="famille_selected">Famille</label>
                <select id="famille_selected">
                    <option value="théropode">Théropode</option>
                    <option value="sauropodomorphes">Sauropodomorphes</option>
                    <option value="ornithisciens">Ornithisciens</option>
                    <option value="cétaropodes">Cétaropodes</option>
                    <option value="thyréophores">Thyréophores</option>
                </select>
            </div>    

            <div id="periode">
                <label htmlFor="periode_selected">Période</label>
                <select id="periode_selected">
                    <optgroup label='Trias'>
                        <option value="trias_inférieur">Trias Inférieur</option>
                        <option value="trias_moyen">Trias Moyen</option>
                        <option value="trias_supérieur">Trias Supérieur</option>
                    </optgroup>
                    <optgroup label="Jurassic">
                        <option value="jurassic_inférieur">Jurassic Inférieur</option>
                        <option value="jurassic_moyen">Jurassic Moyen</option>
                        <option value="jurassic_supérieur">Jurassic Supérieur</option>
                    </optgroup>
                    <optgroup label="Crétacé">
                        <option value="crétacé_inférieur">Crétacé Inférieur</option>
                        <option value="crétacé_supérieur">Crétacé Supérieur</option>
                    </optgroup>
                </select>
            </div>

            <div id="localisation">
                <label htmlFor="localisation_selected">Localisation</label>
                <select id="localisation_selected">
                    <option value="amérique_du_nord">Amérique du Nord</option>
                    <option value="amérique_du_sud">Amérique du Sud</option>
                    <option value="europe">Europe</option>
                    <option value="asie">Asie</option>
                </select>
            </div>    

            <div id="fossiles">
                <label htmlFor="fossiles_selected">Fossiles</label>
                <select id="fossiles_selected">
                    <option value="fossiles_pétrifiés">Fossiles Pétifrié</option>
                    <option value="moulage_interne">Moulage Interne</option>
                    <option value="moulage_externe">Moulage Externe</option>
                    <option value="minéralisation">Minéralisation</option>
                    <option value="l'ombre">Ombre</option>
                </select>
            </div>


            </>
    )
}

export default Filter;