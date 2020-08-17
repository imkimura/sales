var axios = require('axios');

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
});

$(function() {
    api.get('/seller').then(res => {

        const sellers = res.data.data;
        console.log(sellers)
    });

    for (var [key, val] of Object.entries(sellers)) {}

    sellers.forEach(seller => {
        console.log(seller)
        $('#sellers').append('<p>Ola</p>');
    });


});