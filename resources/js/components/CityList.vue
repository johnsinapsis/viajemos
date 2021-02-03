<template>
  <v-card
    class="mx-auto"
    max-width="300"
    tile
  >
    <v-list 
      rounded
    >
      <v-subheader>Ciudades</v-subheader>
      <v-list-item-group
        v-model="selectedItem"
        color="primary"
      >
        <v-list-item
          v-for="(item, i) in cities"
          :key="i"
        >
          <v-list-item-icon>
            <v-icon v-text="'mdi-numeric-'+(i+1)+'-circle-outline'"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.name"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item>
          <v-list-item-icon>
            <v-icon v-text="'mdi-history'"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="'Historial de Consultas'"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-card>
</template>
<script>
  export default {
    props:{
      cities: Array
    },
    data: () => ({
      selectedItem: -1,
      items: [
        { text: 'Real-Time', icon: 'mdi-numeric-1-circle-outline' },
        { text: 'Audience', icon: 'mdi-numeric-2-circle-outline' },
        { text: 'Conversions', icon: 'mdi-numeric-3-circle-outline' },
      ],
    }),
    watch:{
      selectedItem: function(val){
        if(val!==-1){
          this.$emit('update',val)
        }
      }
    },
    methods:{
      /*selectCity: function(cityID){
        console.log(cityID)
      }*/
    }
  }
</script>