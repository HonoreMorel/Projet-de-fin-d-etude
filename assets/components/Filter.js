import React from "react";

const Filter = () => {

    return(
        <>
            <div>
                <label for="filter">Famille</label>
                <select name="filter" id="famille_selected">
                    <option value="théropode">Théropode</option>
                    <option value="sauropodomorphes">Sauropodomorphes</option>
                    <option value="ornithisciens">Ornithisciens</option>
                    <option value="cétaropodes">Cétaropodes</option>
                    <option value="thyréophores">Thyréophores</option>
                </select>
            </div>    

            <div>
                <label for="filter">Période</label>
                <select name="filter" id="periode_selected">
                    <option value="trias">Trias</option>
                    <select name="trias" id="trias_selected" >
                        <option value="trias_inférieur">Trias Inférieur</option>
                        <option value="trias_moyen">Trias Moyen</option>
                        <option value="trias_supérieur">Trias Supérieur</option>
                    </select>
                    <option value="jurassic">Jurasic</option>
                        <select name="trias" id="jurassic_selected" >
                            <option value="jurassic_inférieur">Jurassic Inférieur</option>
                            <option value="jurassic_moyen">Jurassic Moyen</option>
                            <option value="jurassic_supérieur">Jurassic Supérieur</option>
                        </select>
                    <option value="crétacé">Crétacé</option>
                        <select name="crétacé" id="crétacé_selected" >
                            <option value="crétacé_inférieur">Crétacé Inférieur</option>
                            <option value="crétacé_supérieur">Crétacé Supérieur</option>
                        </select>
                </select>
            </div>

            <div>
                <label for="filter">Localisation</label>
                <select name="filter" id="localisation_selected">
                    <option value="amérique_du_nord">Amérique du Nord</option>
                    <option value="amérique_du_sud">Amérique du Sud</option>
                    <option value="europe">Europe</option>
                    <option value="asie">Asie</option>
                </select>
            </div>    

            <div>
                <label for="filter">Fossiles</label>
                <select name="filter" id="fossiles_selected">
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