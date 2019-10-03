import Vue from 'vue';

if(process.browser) {
  window.Event = new class {
    constructor() {
      this.vue = new Vue();
    }

    broadcast(event, data = null) {
      this.vue.$emit(event,data);
    }

    listen(event, callback) {
      this.vue.$on(event,callback);
    }
  }
}