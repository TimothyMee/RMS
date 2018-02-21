<template>
    <div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>

                    <form action="">
                        <button @click.prevent="api1">Api 1</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            api1(){
                axios.get('api1')
                    .then(response => {
                        console.log('api call 1');
                    })
            }
        }
    }
</script>
