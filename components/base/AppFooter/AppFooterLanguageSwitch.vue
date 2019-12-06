<template>
  <nav role="navigation" class="app__footer-misc__languages flex">
    <AppButton v-for="(locale,index) in availableLocales" v-bind:key="index" :role="'link'" :href="switchLocalePath(locale.code)" :css="getCSS(locale.code)">{{ locale.name }}</AppButton>
  </nav>
</template>

<script>
  import AppButton from '~/components/AppButton'

  export default {
    name : 'AppFooterLanguageSwitch',
    
    components  : {
      AppButton
    },

    data() {
      return {
        language : this.$root.$i18n.locale
      }
    },

    computed: {
      availableLocales() {
        return this.$i18n.locales
      }
    },

    methods : {
      getCSS(language) {
        let __class = 'app__footer-misc__languages-button';

        if(language === this.$data.language) {
          __class += ' active';
        }

        return __class;
      }
    },

    created() {
      this.$emit('AppFooterLanguageSwitchCreated');
    },

    mounted() {
      this.$emit('AppFooterLanguageSwitchMounted');
    }
  }
</script>