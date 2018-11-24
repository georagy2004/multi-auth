<template>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card card-default">
                    <div class="card-header">Task Component</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="title-form">Title</label>
                                <input type="text" class="form-control" id="title-form"  placeholder="Enter Title" name="title" v-model="title">
                                <small id="emailHelp" class="form-text text-muted">Create a new article</small>
                            </div>
                            <div class="form-group">
                                <label for="body-form">Body</label>
                                <textarea rows="8" class="form-control" id="body-form" placeholder="Type something" name="body" v-model="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-md-right" @click.prevent="addTask()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>
    export default {
        data() {
            return {
                info: '',
                title: '',
                body: '',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addTask() {
                alert('Adding Task')
                axios.post('./api/task',{
                    title: this.title,
                    body: this.body
                }).then(function(response){
                    console.log(response);
                }).catch(function(error){
                    console.log(error)
                })
            }
        }
    }
</script>
