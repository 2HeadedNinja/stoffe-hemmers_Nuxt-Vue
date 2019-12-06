<template>
  <div v-if="reviewData" class="app__footer-trustedshops__review">
    <div class="app__footer-trustedshops__review-head flex center-vertical">
      <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
        <use xlink:href="/svg/sprite.svg#avatar-circle"></use>
      </svg>
      {{ reviewData.date }}
      <AppRating :max="parseInt(reviewData.max)" :percent="reviewData.percent"></AppRating>
    </div>
    <p>{{ reviewData.excerpt }}</p>
  </div>
</template>

<script>
  import AppRating from '~/components/AppRating'

  export default {
    name : 'AppFooterTrustedShopsReview',
    
    components  : {
      AppRating
    },

    props : {
      reviewData : {
        type : Object,

        default() {
          return null
        }
      }
    },

    created() {
    },

    mounted() {
    }
  }
</script>