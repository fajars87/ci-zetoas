var token = '326708184.1c0e522.b24ee5e2a70c41c7869f41f0cab2cd56',
    num_photos = 16;
 
$.ajax({
    url: 'https://api.instagram.com/v1/users/self/media/recent',
    dataType: 'jsonp',
    type: 'GET',
    data: {access_token: token, count: num_photos},
    success: function(data){
        console.log(data);
        for( x in data.data ){
        $('#rudr_instafeed').append('<li class="col-md-3"><img src="'+data.data[x].images.low_resolution.url+'"></li>');
        }
    },
    error: function(data){
        console.log(data);
    }
});