const { createApp } = Vue

createApp({
    data() {
        return {
            username: '',
            password: '',
        }
    },
    computed: {
        form_method: function () {
            return this.$el.method.toLowerCase();
        },
        form_action: function () {
            return this.$el.action.toLowerCase();
        },
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            var payload = { username: this.username, password: this.password };
            console.log(this.form_method);
        }
    }
}).mount('#loginModal')
