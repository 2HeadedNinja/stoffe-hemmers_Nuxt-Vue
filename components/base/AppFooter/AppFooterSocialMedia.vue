<template>
  <div class="app__footer-misc__inspire">
    <h6>{{ $t('appFooter.inspire.headline') }}:</h6>
    <nav role="navigation">
      <AppButton :role="'link'" :title="$t('appFooter.inspire.instagram')" :target="'_blank'" :href="'https://www.instagram.com/stoffehemmers.de'" :css="'app__footer-misc__inspire-button'" :icon="'instagramnocircle'" :hovericon="'socialmediahover'"></AppButton>
      <AppButton :role="'link'" :title="$t('appFooter.inspire.facebook')" :target="'_blank'" :href="'https://www.facebook.com/stoffehemmers.de'" :css="'app__footer-misc__inspire-button'" :icon="'facebooknocircle'" :hovericon="'socialmediahover'"></AppButton>
      <AppButton :role="'link'" :title="$t('appFooter.inspire.pinterest')" :target="'_blank'" :href="'https://www.pinterest.de/stoffehemmers/'" :css="'app__footer-misc__inspire-button'" :icon="'pinterestnocircle'" :hovericon="'socialmediahover'"></AppButton>
      <AppButton :role="'link'" :title="$t('appFooter.inspire.whatsapp')" :href="'/whatsapp.php'" :css="'app__footer-misc__inspire-button'" :icon="'whatsappnocircle'" :hovericon="'socialmediahover'"></AppButton>
      <AppButton :role="'link'" :title="$t('appFooter.inspire.youtube')" :target="'_blank'" :href="'https://www.youtube.com/channel/UCXkyHTyPOcjr900iKfzh4nw'" :css="'app__footer-misc__inspire-button'" :icon="'youtubenocircle'" :hovericon="'socialmediahover'"></AppButton>
    </nav>
  </div>
</template>

<script>
  import AppButton from '~/components/AppButton'

  export default {
    name : 'AppFooterSocialMedia',
    
    components  : {
      AppButton
    },

    created() {
      this.$emit('AppFooterSocialMediaCreated');
    },

    mounted() {
      this.$emit('AppFooterSocialMediaMounted');
    }
  }
</script>