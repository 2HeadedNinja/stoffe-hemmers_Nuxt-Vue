<template>
  <div style="--padding-top: 50px; --padding-bottom: 50px;"> 
    <ProductSlider :category="2" :quantity="15"></ProductSlider>
    <hr class="content__seperator__dotted" />
    <div class="grid content" style="--grid-template: auto/repeat(25,1fr); --grid-gap: 50px;">
      <div class="continuous__text" style="--grid-column: span 10;">
        <h1>All in one bei Stoffe Hemmers</h1>
        <p>
          Kaufe Stoffe als Meterware, Schnittmuster & Kurzwaren für Dein Nähprojekt. Stoffe Hemmers ist mit über 7000 Stoffen zur Auswahl Deutschlands bestausgestatteter Stoffhändler.
        </p>
      </div>
      <div style="--grid-column: span 15;">
        right
      </div>
    </div>
    <hr class="content__seperator__dotted" />
    <ProductSlider :category="1" :quantity="12" :visible="4" :format="'portrait'" :details="false">
      Lass dich inspirieren!
    </ProductSlider>
    <hr class="content__seperator__dotted" />
    <ProductSlider :category="2" :quantity="5">Entdecke unsere Bestseller</ProductSlider>
    <hr class="content__seperator__dotted" />
    <div class="grid content" style="--grid-template: auto/repeat(24,1fr);">
      <div style="--grid-column: span 7;">
        left
      </div>
      <div class="continuous__text" style="--grid-column: span 17;">
        <h2>Stoffe von A-Z – Den richtigen Stoff finden</h2>
        <blockquote>
          <svg role="presentation" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
            <use xlink:href="/svg/sprite.svg#quotation-mark"></use>
          </svg>
          <p>
            Zeit für was Neues! Bei Stoffe Hemmers finde ich alles, was ich für meine Nähprojekte brauche: Hier kaufe ich Stoffe gleich in Meterware auf Vorrat, z.B. Jerseystoff für T-Shirts, Bio-Baumwollstoff für Decken und Mützen. Diesmal interessiere ich mich für einen mir neuen Stoff – Panama. Könnte ideal sein für einen neuen Couchbezug. Ich bestelle ihn als Muster.
          </p>
        </blockquote>
        <p>
          Stoffe kaufen kann so einfach sein, wenn man weiß, was man braucht. Jedoch, bei über 7000 Stoffen ist die richtige Auswahl gar nicht so einfach. Für nahezu jedes Nähprojekt stehen verschiedene Stoffarten bereit. Unter <a href="/">Stoffe A-Z</a> findest Du alle Stoffarten bei Stoffe Hemmers – sowie alle zur Stoffart gehörigen Informationen:
        </p>
        <ul>
          <li>Eigenschaften</li>
          <li>Verarbeitungshinweise,</li>
          <li>Pflegehinweise und</li>
          <li>passende Nähideen.</li>
        </ul>
        <h3>Stoffideen von A-Z: Was Du morgen bereits selbst nähen kannst</h3>
        <p>
          Hast Du eine konkrete Nähidee? Weißt aber nicht, wie es geht? Stoffe Hemmers steht mit Rat und Tat zur Seite. Du findest in unserem Online Shop sicher den richtigen Stoff. Unter unseren <a href="/">Nähanleitungen</a> findest Du die nötige Inspiration, diese zu verarbeiten und ins richtige Licht zu rücken.
        </p>
        <h3>Über uns</h3>
        <p>
          Stoffe Hemmers wurde 1983 als Stoffe Brünink & Hemmers in Nordhorn gegründet. Das ist nahe der niederländischen Grenze in der Grafschaft Bentheim. Unsere qualifizierten Mitarbeiter beraten Dich gerne bei Fragen und helfen Dir bei der Auswahl der richtigen Produkte.
        </p>
        <p>
          Unser Sortiment wird ständig nach Kundenwünschen orientiert angepasst. Unsere langjährigen Mitarbeiter sind jederzeit rund um Fragen zu Deiner Bestellung oder zur Stoffberatung für Dich da. Stoffe Hemmers gibt es online auch in <a href="/">Französisch</a>, <a href="/">Englisch</a> und <a href="/">Niederländisch</a>. Hier wirst Du in Deiner Landessprache beraten und kannst sicher sein, den richtigen Shop für Dich gefunden zu haben.
        </p>
        <p>Als Gewerbetreibender wirf mal einen <a href="/">Blick auf unsere besonderen Einkaufskonditionen!</a></p>
        <p>
          <AppButton :role="'link'" :css="'app__button-default-auto'">Hier mehr Details über Stoffe Hemmers erfahren</AppButton>
        </p>
      </div>
    </div>
  </div>
</template>
<script>
  import Position from '~/plugins/Position.plugin.js'
  import DOMElement from '~/plugins/DOMElement.plugin.js'

  import AppButton from '~/components/AppButton'
  import ProductSlider from '~/components/slider/ProductSlider'

  export default {
    layout     : 'default',

    components : {
      AppButton,
      ProductSlider
    },
      
    created() {
    },

    mounted() {
      this.$root.$on('scrollToProducts', () => {
        if(DOMElement.is(this.$el)) {
          const __y = Position.get(this.$el,{
            offset : 0
          });

          if(__y !== false) {
            window.scrollTo({
              top       : __y, 
              behavior  : 'smooth'
            });
          }
        }
      });
    }
  }
</script>