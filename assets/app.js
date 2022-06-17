import './styles/app.css';
import React from 'react';
import ReactDOM from 'react-dom';
import Recherche from './components/Recherche';
import Filter from './components/Filter';

const App = () =>{

    function close (){
        document.getElementById('root').classList.remove('active');
        document.getElementById('overlay').classList.remove('active');
        
    }


    return(
        <div id='recherche'>
            <button onClick={close} data-close-button className="close-button">&times;</button>

            <div>
                <Recherche/>
            </div>

            <div>
                <Filter/>
            </div>
            
        </div>
    )
}




ReactDOM.render(<App/>, document.getElementById("root"));