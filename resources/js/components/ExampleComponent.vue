<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tes API</div>

                    <div v-if="loading === false" class="card-body">
                        <p>Response:</p>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Dibuat Pada</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- php: foreach(item as data) -->
                                <tr v-for="item in data" :key="item.id">
                                    <td>{{ item.nama }}</td>
                                    <td>{{ item.jk }}</td>
                                    <td>{{ item.created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        {{ error }}
                    </div>
                    <div v-else class="card-body">Loading...</div>
                    
                </div>
            </div>
        </div>

        <!-- VueProgressBar -->
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>


<!-- javascript -->
<script>
    export default {
        data(){
            return{
                data:[],
                error:null,
                loading: false
            }
        },
        //untuk memastikan proses loading di halaman web telah terdownload secara sempurna
        mounted() {
            this.getData()
        },
        //object
        methods: {
            //function
            getData(){
                //sebagai titik jembatan 1
                this.$Progress.start()
                this.loading = true
                axios.get('/testapi')
                //sebagai titik jembatan 2
                .then((res) => {
                    this.data = res.data.data
                    this.loading = false
                    this.$Progress.finish()
                })
                //sebagai titik jembatan 3
                .catch((error) => {
                    this.error = error.message
                    this.loading = false
                    this.$Progress.fail()
                })
            }
        }
    }
</script>
