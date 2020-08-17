var axios = require('axios');

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
});

const sellersData = {}

async function getSellers() {
    await api.get('/seller').then(res => {

        sellersData = res.data.data;
    });

   for(var k in sellersData) {
       console.log(sellers[k])
   }

}


$(function() {

    // const sellers = getSellers();
    getSellers();

    // sellers.forEach(seller => {
    //     console.log(seller)
    //     $('#sellers').append('<p>Ola</p>');
    // });


});
