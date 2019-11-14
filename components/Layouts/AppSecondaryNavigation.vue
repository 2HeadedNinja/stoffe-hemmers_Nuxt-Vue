<template>
  <ul class="secondary__navigation">
    <li>
      <AppButton @AppButtonClick="click" :css="'secondary__navigation__menue-button account'" :icon="'avatar-line'">
        Anmelden
      </AppButton>
    </li>
    <li class="flex align-left-center">
      <AppButton @AppButtonClick="click" :css="'secondary__navigation__menue-button wishlist'" :icon="'heart-line'">
        <span v-if="this.$data.wishlistCount" class="secondary__navigation__menue-button__counter">{{ this.$data.wishlistCount }}</span>
        Mein Wunschzettel
      </AppButton>
    </li>
    <li>
      <AppButton @AppButtonClick="click" :css="'secondary__navigation__menue-button cart'" :icon="'shopping-bag-line'">
        <span v-if="this.$data.cartCount" class="secondary__navigation__menue-button__counter">{{ this.$data.cartCount }}</span>
        Mein Warenkorb
      </AppButton>
    </li>
  </ul>
</template>

<script>
  import AppButton from '~/components/AppButton'

  export default {
    name : 'AppSecondaryNavigation',
    
    components  : {
      AppButton
    },

    data() {
      return {
        cartCount     : null,
        wishlistCount : 7,
      }
    },

    methods : {
      click() {
        console.log('click');
      },

      addWishlistProduct(__id = false) {
        if(this.$data.wishlistCount === null) {
          this.$data.wishlistCount = 1;
        } else {
          ++this.$data.wishlistCount;
        }
      },

      removeWishlistProduct(__id = false) {
        if(--this.$data.wishlistCount < 1) {
          this.$data.wishlistCount = null;
        }
      }
    },

    created() {
    },

    mounted() {
      this.$root.$on('AddWishlistProduct',this.addWishlistProduct);
      this.$root.$on('RemoveWishlistProduct',this.removeWishlistProduct);
    }
  }
</script>