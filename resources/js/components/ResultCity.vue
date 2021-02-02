<template>
	<div>
		<v-row>
			<v-col
				cols="12"
			>
				<div>Acá va la humedad</div>
			</v-col>
			
		</v-row>
	</div>
</template>
<script>

	export default{
		props: {
			options: Object
		},
		data: function(){
			return{
				lat: this.options.center.lat,
				lng: this.options.center.lng,
			}
		}
		
	}
</script>