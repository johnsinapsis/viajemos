/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import x5GMaps from 'x5-gmaps'

Vue.use(Vuetify)

Vue.use(x5GMaps, '')

import moment from 'moment';
//var day = moment("1995-12-25");
moment.locale('es');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('city-list', require('./components/CityList.vue').default);
Vue.component('result-city', require('./components/ResultCity.vue').default);
Vue.component('history-list', require('./components/HistoryList.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { gmapsMap, gmapsMarker } from 'x5-gmaps'

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: { gmapsMap, gmapsMarker },
    data:{
    	msg: 'Humedad',
    	cities:[
	    		{
		        id: 4164138,
		        name: "Miami",
		        state: "FL",
		        country: "US",
		        coord: {
		            lon: -80.193657,
		            lat: 25.774269
		        }
	    	},
	
			{
		        id: 4167147,
		        name: "Orlando",
		        state: "FL",
		        country: "US",
		        coord: {
		            lon: -81.379242,
		            lat: 28.53834
		        }
		    },
			{
		        id: 5128581,
		        name: "New York City",
		        state: "NY",
		        country: "US",
		        coord: {
		            lon: -74.005966,
		            lat: 40.714272
		        }
		    },
    	],
    	city: 0,
    	history:false,
    	stories:[],
    	baseUrl
    	
    },
    computed:{
    	getDataCity: function(){
    		var index = this.cities.findIndex(el=> el.id=== this.city)
    		if(index!==-1)
    			return {
    					center:{
    						lat: this.cities[index].coord.lat, 
    						lng: this.cities[index].coord.lon
    						},
        				zoom: 12,
    					}
    		else
    			return { 
    					center: { lat: -27.47, lng: 153.025 },
        				zoom: 12,
    					}
    	}
    },
    methods:{
    	updateCity(index){
    		if(index < this.cities.length){
    			this.city = this.cities[index].id
    			this.history = false
    		}
    		else{
    			this.city=0
    			this.history = true
    			this.updateStories()
    		}
    	},
    	updateStories(){
    		axios.get(this.baseUrl+'/history')
    			.then((response) =>{
    				this.stories = response.data
    				for(var i=0; i < this.stories.length; i++){
    					this.stories[i].created_at =  moment(this.stories[i].created_at).format('LLLL')
    				}
    				//console.log(this.stories)
    			})
    			.catch((error) => console.error(error))
    	}
    }

});
