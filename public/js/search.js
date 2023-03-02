import {search} from './export_search.js'; //instanciamos la clase 
const mysearchc=document.querySelector("#mysearch");
const ul_add_lipc=document.querySelector("#showlist");
//Paso de parametros al constructor
const searchCuenta = new search(mysearchc,ul_add_lipc);
//Ejecucion de la funcion
searchCuenta.InputSearch();
