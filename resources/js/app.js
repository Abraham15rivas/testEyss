require('./bootstrap');
import axios from 'axios';

axios.get('/categories').then( response => {
    console.log(response.data)
});