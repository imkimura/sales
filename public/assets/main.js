import axios from '../../node_modules/axios';

const api = axios.create({
    baseURL: 'http://localhost:8000',
});

api.get('/seller').then(res => {
    console.log(res);
});

$(function() {

    $('#sellers').append('<p>Ola</p>')
});