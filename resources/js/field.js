Nova.booting((Vue, router) => {
    Vue.component('index-nova-dni-field', require('./components/IndexField'));
    Vue.component('detail-nova-dni-field', require('./components/DetailField'));
    Vue.component('form-nova-dni-field', require('./components/FormField'));
})
