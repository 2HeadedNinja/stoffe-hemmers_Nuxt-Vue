<template>
  <footer class="app__footer">
    <AppFooterTrustedShops></AppFooterTrustedShops>
    <div class="app__footer-additional grid content">
      <div class="app__footer-additional__service">
        <h6>{{ $t('appFooter.additional.service') }}</h6>
        <nav role="navigation">
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Musterversand
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            FAQ / Hilfe
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Händlerrabatt
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Nähanleitungen
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
           Nähen für Anfänger
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Newsletter
          </AppButton>
        </nav>
      </div>
      <div class="app__footer-additional__information">
        <h6>{{ $t('appFooter.additional.information') }}</h6>
        <nav role="navigation">
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Über uns
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Versandkosten
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Portoflat
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Zahlungsarten
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Partnerprogramm
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Jobs & Karriere
          </AppButton>
          <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-additional__service-button'">
            Lizenzstoffe
          </AppButton>
        </nav>
      </div>
      <div class="app__footer-additional__contact">
        <h6>{{ $t('appFooter.additional.contact') }}</h6>
        <p>Wir sind montags bis freitags von 09:00 bis 15:00 Uhr erreichbar:</p>
        <AppButton :role="'link'" :href="'tel:+49 (0) 5921 / 308388-12'" :icon="'phone'" :css="'app__footer-logos__shipping-button'">
          +49 (0) 5921 / 308388-12
        </AppButton>
        <AppButton :role="'link'" :href="'mailto:service@stoffe-hemmers.de'" :icon="'email'" :css="'app__footer-logos__shipping-button'">
          service@stoffe-hemmers.de
        </AppButton>
      </div>
      <div class="app__footer-additional__security">
        <h6>{{ $t('appFooter.additional.security') }}</h6>
        <div class="app__footer-additional__security-slot flex center-vertical">
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 250 250">
            <use xlink:href="/svg/sprite.svg#trusted-shops"></use>
          </svg>
          <p>
            <strong>Trusted Shop</strong><br />
            Unser Shop trägt das Trusted Shop Zertifikat
          </p>
        </div>
        <div class="app__footer-additional__security-slot flex center-vertical">
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 250 250">
            <use xlink:href="/svg/sprite.svg#ssl-security"></use>
          </svg>
          <p>
            <strong>SSL-Verschlüsselung</strong><br />
            Sicheres Einkaufen garantiert
          </p>
        </div>
        <div class="app__footer-additional__security-slot flex center-vertical">
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 250 250">
            <use xlink:href="/svg/sprite.svg#shopusabilityaward"></use>
          </svg>
          <p>
            <strong>Shop Usability Award 2018</strong><br />
            Dritter Platz in der Kategorie: "Special Interest"
          </p>
        </div>
      </div>
    </div>
    <div class="app__footer-logos flex content">
      <div class="app__footer-logos__payment">
        <h6>Bezahlen mit:</h6>
        <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-logos__payment-button'">
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1000 324">
            <use xlink:href="/svg/sprite.svg#VisaInc"></use>
          </svg>
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 580 110">
            <use xlink:href="/svg/sprite.svg#Mastercard_alt"></use>
          </svg>
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 135 33">
            <use xlink:href="/svg/sprite.svg#PayPal"></use>
          </svg>
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 250 166.7">
            <use xlink:href="/svg/sprite.svg#sofortueberweisung_de_DE"></use>
          </svg>
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 212 62">
            <use xlink:href="/svg/sprite.svg#invoice"></use>
          </svg>
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 212 62">
            <use xlink:href="/svg/sprite.svg#advancepayment"></use>
          </svg>
        </AppButton>
      </div>
      <div class="app__footer-logos__shipping">
        <h6>Unsere Versandpartner:</h6>
        <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-logos__shipping-button'">
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 176 39">
            <use xlink:href="/svg/sprite.svg#DHL_logo"></use>
          </svg>
          <svg role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 142 60">
            <use xlink:href="/svg/sprite.svg#DPD_logo"></use>
          </svg>
        </AppButton>
      </div>
    </div>
    <div class="app__footer-misc">
      <div class="content flex">
        <div class="app__footer-misc__legal">
          <nav role="navigation">
            <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-misc__legal-button'">Impressum</AppButton>
            <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-misc__legal-button'">AGB</AppButton>
            <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-misc__legal-button'">Datenschutz</AppButton>
            <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-misc__legal-button'">Widerrufsrecht</AppButton>
            <AppButton :role="'link'" :target="'_blank'" :href="'/'" :css="'app__footer-misc__legal-button'">Kontakt</AppButton>
          </nav>
          <p>
            Alle Preise inkl. der gesetzl. MwSt.<br />
            Die durchgestrichenen Preise entsprechen dem bisherigen Preis bei Stoffe Hemmers.
          </p>
        </div>
        <a class="app__footer-misc__logo" href="/">
          <svg role="img" alt="Stoffe Hemmers" preserveAspectRatio="xMidYMid meet" viewBox="0 0 946 156">
            <use xlink:href="/svg/sprite.svg#logo-wide-de_DE_light"></use>
          </svg>
        </a>
        <AppFooterSocialMedia></AppFooterSocialMedia>
        <AppFooterLanguageSwitch></AppFooterLanguageSwitch>
      </div>
    </div>
    <transition name="fade">
      <AppButton v-show="toTop" @AppButtonClick="moveToTop" :css="'app__button to__top'" :icon="'arrow-up-thick'" :label="'Nach oben'">Nach oben</AppButton>
    </transition>
  </footer>
</template>

<script>
  import AppFooterSocialMedia from '~/components/base/AppFooter/AppFooterSocialMedia'
  import AppFooterTrustedShops from '~/components/base/AppFooter/AppFooterTrustedShops'
  import AppFooterLanguageSwitch from '~/components/base/AppFooter/AppFooterLanguageSwitch'

  import AppButton from '~/components/AppButton'

  export default {
    name : 'AppFooter',
    
    components  : {
      AppButton,
      AppFooterSocialMedia,
      AppFooterTrustedShops,
      AppFooterLanguageSwitch
    },

    data() {
      return {
        toTop : null
      }
    },

    methods : {
      moveToTop() {
        window.scrollTo({
          top       : 0, 
          behavior  : 'smooth'
        });
      }
    },

    created() {
    },

    mounted() {
      this.$root.$on('LayoutScrollEvent',() => {
        if(window.scrollY >= Math.round(window.innerHeight * 1.2)) {
          if(this.$data.toTop === null) {
            this.$data.toTop = true;
          }
        } else {
          if(this.$data.toTop === true) {
            this.$data.toTop = null;
          }
        }
      });
    }
  }
</script>