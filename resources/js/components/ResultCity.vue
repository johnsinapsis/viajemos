<template>
	<div>
		<v-row>
			<v-col
				cols="12"
			>
				<div class="my-subtitle text-center"><b>Humedad {{name}}: </b>{{humidity}} </div>
			</v-col>
			
		</v-row>
	</div>
</template>
<script>
	//import auth from '../authentication.js'
	//var {app_id,auth_header,url} = auth
	
	var OAuth = require('oauth');
	var header = {
    	"X-Yahoo-App-Id": "5K2pap3w"
	};
	var request = new OAuth.OAuth(
	    null,
	    null,
	    'dj0yJmk9RGNNbm1MMlJkUDNCJmQ9WVdrOU5Vc3ljR0Z3TTNjbWNHbzlNQT09JnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWNl',
	    'd44f3931ecf3f4eb1cf7900d4465673c42ba104e',
	    '1.0',
	    null,
	    'HMAC-SHA1',
	    null,
	    header
	);

	const proxyurl = "https://cors-anywhere.herokuapp.com/";
	//console.log(auth_header)
	export default{
		props: {
			options: Object
		},
		data: function(){
			return{
				lat: this.options.center.lat,
				lng: this.options.center.lng,
				humidity: 'Cargando humedad...',
				name: ''
			}
		},
		methods:{
			loadAPI: function(){
				//var query = {'location': 'sunnyvale,ca', 'format': 'json'};
				var k = this
				request.get(
				    'https://weather-ydn-yql.media.yahoo.com/forecastrss?lon='+k.lng+'&lat='+k.lat+'&format=json',
				    null,
				    null,
				    function (err, data, result) {
				        if (err) {
				            console.log(err);
				        } else {
				        	let allData = JSON.parse(data) 
				            //console.log(allData)
				            k.humidity = allData.current_observation.atmosphere.humidity + "%",
				            k.name = 'en '+ allData.location.city
				        }
				    }
				);
			},
			resetData: function(){
				this.lat = this.options.center.lat
				this.lng = this.options.center.lng
				this.humidity = 'Cargando humedad...'
				this.name= ''
			}
		},
		watch:{
			options: function(val){
				this.resetData()
				this.loadAPI()
			}
		},
		mounted: function(){
			this.loadAPI()
		}
		
	}
</script>