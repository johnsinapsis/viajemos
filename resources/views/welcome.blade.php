<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Viajemos - Humedad</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
    </head>
    <body>
        <div id="app">
            <v-app id="viajemos">
                <div class="my-title text-center">
                    @{{msg}}
                </div>
                <v-container>
                    <v-row>
                        <v-col
                            cols="12"
                            md="4"
                            sm="6"
                        >
                            <city-list :cities="cities" v-on:update="updateCity"></city-list>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                            md="8"
                            justify="center"
                        >
                            <div v-if="city===0 && !history" class="text-center my-subtitle padding-top-center" >
                                Seleccione Una ciudad para obtener información
                            </div>
                            <div v-if="city!==0">
                                <result-city :options="getDataCity" :city-id="city"></result-city>
                            </div>
                            <gmaps-map v-if="city!==0 " :options="getDataCity" class="my-map">
                            </gmaps-map>
                            <div v-if="history" class="pt-5">
                                <history-list :stories="stories" :cities="cities"></history-list>
                            </div>    
                            
                        </v-col>
                    </v-row>

                </v-container>
            </v-app>
        </div>
        <script>
            var baseUrl = "{{url('')}}" 
        </script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </body>
</html>
