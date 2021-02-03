<template>
	<v-row justify="space-around">
        <v-card width="400">
          <v-card-text>
            <div class="font-weight-bold ml-8 mb-2">
              Historial de Consultas
            </div>
  
            <v-timeline
              align-top
              dense
            >
              <v-timeline-item
                v-for="history in stories"
                :key="history.id"
                :color="getColor(history.id)"
                small
              >
                <div>
                  <div class="font-weight-normal">
                    <strong>{{ getCity(history.city_id)}}</strong> @{{ history.created_at }}
                  </div>
                  <div> <b>Humedad:</b>  {{ history.humedity }}</div>
                </div>
              </v-timeline-item>
            </v-timeline>
          </v-card-text>
        </v-card>
      </v-row>
</template>
<script>
	
	//console.log(moment().format('LLLL'));
  export default {
  	props:{
  		stories: Array,
  		cities: Array
  	},
    data: () => ({
      
      baseUrl
    }),
    methods:{
    	getColor: function(id){
    		if(id%2)
    			return 'deep-purple lighten-1'
    		else
    			return 'green'
    	},

    	getCity: function(cityId){
    		var index = this.cities.findIndex((el) => el.id === cityId)
    		if(index!==-1)
    			return this.cities[index].name
    		return ''
    	}
    }

  }
</script>