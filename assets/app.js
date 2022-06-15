import './styles/app.css';
import React from 'react';
import ReactDOM from 'react-dom';
import Recherche from './components/Recherche';
import Filter from './components/Filter';

const App = () =>{


    return(
        <>
        <div>
            <Recherche/>
        </div>

        <div>
            <Filter/>
        </div>
            
        </>
    )
}






ReactDOM.render(<App/>, document.getElementById("root"));