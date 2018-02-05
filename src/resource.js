import Vue from 'vue'
let YouTube = Vue.resource('http://localhost:8000/api/{id}')

export {YouTube}