<template>
  <nav v-if="navigation" role="navigation" class="app__header__content-bottom mega__menue__navigation">
    <div class="mega__menue__navigation__inner content" v-for="(data, index) in navigation" v-if="data.sub" v-bind:key="index" :data-id="data.id">
      <ul>
        <li v-for="(link, index) in data.sub" v-bind:key="index">
          <a :href="link.url">
            {{ link.label }}
          </a>
        </li>
      </ul>
    </div>
    <!--<section class="submenu" data-id="1132">
      <div class="container">
        <div class="row">
          <ul class="col-5">
                        <li>
              <a href="/stoffe-a-z" title="Stoffe A-Z" data-label="Stoffe A-Z">
                Stoffe A-Z
              </a>
            </li>
                                      <li>
              <a href="/bekleidungsstoffe" title="Bekleidungsstoffe" data-label="Bekleidungsstoffe">
                Bekleidungsstoffe
              </a>
            </li>
                                      <li>
              <a href="/stoffe/dekostoffe" title="Dekostoffe" data-label="Dekostoffe">
                Dekostoffe
              </a>
            </li>
                                      <li>
              <a href="/filz-bastelstoffe" title="Filz &amp; Bastelstoffe" data-label="Filz &amp; Bastelstoffe">
                Filz &amp; Bastelstoffe
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/stoffe/kinderstoffe" title="Kinderstoffe" data-label="Kinderstoffe">
                Kinderstoffe
              </a>
            </li>
                                      <li>
              <a href="/kombistoffe" title="Kombistoffe" data-label="Kombistoffe">
                Kombistoffe
              </a>
            </li>
                                      <li>
              <a href="/stoffe/magische-stoffe" title="Magische Stoffe" data-label="Magische Stoffe">
                Magische Stoffe
              </a>
            </li>
                                      <li>
              <a href="/stoffe/markenstoffe" title="Markenstoffe" data-label="Markenstoffe">
                Markenstoffe
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/musterkarten" title="Musterkarten" data-label="Musterkarten">
                Musterkarten
              </a>
            </li>
                                      <li>
              <a href="/patchworkstoffe" title="Patchworkstoffe" data-label="Patchworkstoffe">
                Patchworkstoffe
              </a>
            </li>
                                      <li>
              <a href="/saisonale-stoffe" title="Saisonale Stoffe" data-label="Saisonale Stoffe">
                Saisonale Stoffe
              </a>
            </li>
                                      <li>
              <a href="/stoffpakete" title="Stoffpakete" data-label="Stoffpakete">
                Stoffpakete
              </a>
            </li>
                                    </ul>
        </div>
      </div>
    </section>
    <section class="submenu" data-id="1133">
      <div class="container">
        <div class="row">
          <ul class="col-5">
                        <li>
              <a href="/applikationen" title="Applikationen" data-label="Applikationen">
                Applikationen
              </a>
            </li>
                                      <li>
              <a href="/baender" title="Bänder" data-label="Bänder">
                Bänder
              </a>
            </li>
                                      <li>
              <a href="/bastelsets-naehpakete" title="Bastelsets &amp; Nähpakete" data-label="Bastelsets &amp; Nähpakete">
                Bastelsets &amp; Nähpakete
              </a>
            </li>
                                      <li>
              <a href="/borten" title="Borten" data-label="Borten">
                Borten
              </a>
            </li>
                                      <li>
              <a href="/buecher-zeitschriften" title="Bücher &amp; Zeitschriften" data-label="Bücher &amp; Zeitschriften">
                Bücher &amp; Zeitschriften
              </a>
            </li>
                                      <li>
              <a href="/gutscheine" title="Gutscheine" data-label="Gutscheine">
                Gutscheine
              </a>
            </li>
                                      <li>
              <a href="/knoepfe" title="Knöpfe" data-label="Knöpfe">
                Knöpfe
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/kordeln" title="Kordeln" data-label="Kordeln">
                Kordeln
              </a>
            </li>
                                      <li>
              <a href="/nadeln" title="Nadeln" data-label="Nadeln">
                Nadeln
              </a>
            </li>
                                      <li>
              <a href="/naeh-und-markierhilfen" title="Näh- und Markierhilfen" data-label="Näh- und Markierhilfen">
                Näh- und Markierhilfen
              </a>
            </li>
                                      <li>
              <a href="/naehgarn" title="Nähgarn" data-label="Nähgarn">
                Nähgarn
              </a>
            </li>
                                      <li>
              <a href="/naehkaestchen" title="Nähkästchen" data-label="Nähkästchen">
                Nähkästchen
              </a>
            </li>
                                      <li>
              <a href="/naehmaschinen-zubehoer" title="Nähmaschinen &amp; Zubehör" data-label="Nähmaschinen &amp; Zubehör">
                Nähmaschinen &amp; Zubehör
              </a>
            </li>
                                      <li>
              <a href="/naehzubehoer/reissverschluesse" title="Reissverschlüsse" data-label="Reissverschlüsse">
                Reissverschlüsse
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/scheren-werkzeuge" title="Scheren &amp; Werkzeuge" data-label="Scheren &amp; Werkzeuge">
                Scheren &amp; Werkzeuge
              </a>
            </li>
                                      <li>
              <a href="/schneiderpuppen" title="Schneiderpuppen" data-label="Schneiderpuppen">
                Schneiderpuppen
              </a>
            </li>
                                      <li>
              <a href="/sicherheitsreflektoren" title="Sicherheitsreflektoren" data-label="Sicherheitsreflektoren">
                Sicherheitsreflektoren
              </a>
            </li>
                                      <li>
              <a href="/verschlusssysteme" title="Verschlusssysteme" data-label="Verschlusssysteme">
                Verschlusssysteme
              </a>
            </li>
                                      <li>
              <a href="/weiteres-naehzubehoer" title="Weiteres Nähzubehör" data-label="Weiteres Nähzubehör">
                Weiteres Nähzubehör
              </a>
            </li>
                                      <li>
              <a href="/wolle" title="Wolle" data-label="Wolle">
                Wolle
              </a>
            </li>
                                    </ul>
        </div>
      </div>
    </section>
    <section class="submenu" data-id="282">
      <div class="container">
        <div class="row">
          <ul class="col-5">
                        <li>
              <a href="/schnittmuster-accessoires" title="Schnittmuster Accessoires" data-label="Schnittmuster Accessoires">
                Schnittmuster Accessoires
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-anlaesse" title="Schnittmuster Anlässe" data-label="Schnittmuster Anlässe">
                Schnittmuster Anlässe
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-baby-kinder" title="Schnittmuster Baby &amp; Kinder" data-label="Schnittmuster Baby &amp; Kinder">
                Schnittmuster Baby &amp; Kinder
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-bekleidung" title="Schnittmuster Bekleidung" data-label="Schnittmuster Bekleidung">
                Schnittmuster Bekleidung
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/schnittmuster-cosplay" title="Schnittmuster Cosplay" data-label="Schnittmuster Cosplay">
                Schnittmuster Cosplay
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-dekoration" title="Schnittmuster Dekoration" data-label="Schnittmuster Dekoration">
                Schnittmuster Dekoration
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-fuer-tierbekleidung" title="Schnittmuster für Tierbekleidung" data-label="Schnittmuster für Tierbekleidung">
                Schnittmuster für Tierbekleidung
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-herren" title="Schnittmuster Herren" data-label="Schnittmuster Herren">
                Schnittmuster Herren
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/schnittmuster-marken" title="Schnittmuster Marken" data-label="Schnittmuster Marken">
                Schnittmuster Marken
              </a>
            </li>
                                      <li>
              <a href="/schnittmuster-puppenkleider" title="Schnittmuster Puppenkleider" data-label="Schnittmuster Puppenkleider">
                Schnittmuster Puppenkleider
              </a>
            </li>
                                      <li>
              <a href="/e-books" title="E-Books" data-label="E-Books">
                E-Books
              </a>
            </li>
                                    </ul>
        </div>
      </div>
    </section>
    <section class="submenu" data-id="797">
      <div class="container">
        <div class="row">
          <ul class="col-5">
                        <li>
              <a href="/babywelt" title="Babywelt" data-label="Babywelt">
                Babywelt
              </a>
            </li>
                                      <li>
              <a href="/cosplay" title="Cosplay" data-label="Cosplay">
                Cosplay
              </a>
            </li>
                                      <li>
              <a href="/fussball" title="Fußball" data-label="Fußball">
                Fußball
              </a>
            </li>
                                      <li>
              <a href="/gartenwelt" title="Gartenwelt" data-label="Gartenwelt">
                Gartenwelt
              </a>
            </li>
                                      <li>
              <a href="/halloween" title="Halloween" data-label="Halloween">
                Halloween
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/karneval-fasching" title="Karneval &amp; Fasching" data-label="Karneval &amp; Fasching">
                Karneval &amp; Fasching
              </a>
            </li>
                                      <li>
              <a href="/kinderwelt" title="Kinderwelt" data-label="Kinderwelt">
                Kinderwelt
              </a>
            </li>
                                      <li>
              <a href="/oktoberfest" title="Oktoberfest" data-label="Oktoberfest">
                Oktoberfest
              </a>
            </li>
                                      <li>
              <a href="/schulstart" title="Schulstart" data-label="Schulstart">
                Schulstart
              </a>
            </li>
                                      <li>
              <a href="/strandwelt" title="Strandwelt" data-label="Strandwelt">
                Strandwelt
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/inspiration/taschen-naehen" title="Taschen nähen" data-label="Taschen nähen">
                Taschen nähen
              </a>
            </li>
                                      <li>
              <a href="/tiermotivstoffe" title="Tiermotivstoffe" data-label="Tiermotivstoffe">
                Tiermotivstoffe
              </a>
            </li>
                                      <li>
              <a href="/trends" title="Trends" data-label="Trends">
                Trends
              </a>
            </li>
                                      <li>
              <a href="/weihnachten" title="Weihnachten" data-label="Weihnachten">
                Weihnachten
              </a>
            </li>
                                    </ul>
        </div>
      </div>
    </section>
    <section class="submenu" data-id="794">
      <div class="container">
        <div class="row">
          <ul class="col-5">
                        <li>
              <a href="/mega-deal" title="MEGA DEAL" data-label="MEGA DEAL">
                MEGA DEAL
              </a>
            </li>
                                      <li>
              <a href="/reduzierte-baender-borten" title="Reduzierte Bänder &amp; Borten" data-label="Reduzierte Bänder &amp; Borten">
                Reduzierte Bänder &amp; Borten
              </a>
            </li>
                                      <li>
              <a href="/reduzierte-bekleidungsstoffe" title="Reduzierte Bekleidungsstoffe" data-label="Reduzierte Bekleidungsstoffe">
                Reduzierte Bekleidungsstoffe
              </a>
            </li>
                                      <li>
              <a href="/reduzierte-dekostoffe" title="Reduzierte Dekostoffe" data-label="Reduzierte Dekostoffe">
                Reduzierte Dekostoffe
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/reduzierte-faschingstoffe" title="Reduzierte Faschingstoffe" data-label="Reduzierte Faschingstoffe">
                Reduzierte Faschingstoffe
              </a>
            </li>
                                      <li>
              <a href="/reduzierte-kinderstoffe" title="Reduzierte Kinderstoffe" data-label="Reduzierte Kinderstoffe">
                Reduzierte Kinderstoffe
              </a>
            </li>
                                      <li>
              <a href="/reduzierte-polsterstoffe" title="Reduzierte Polsterstoffe" data-label="Reduzierte Polsterstoffe">
                Reduzierte Polsterstoffe
              </a>
            </li>
                                      <li>
              <a href="/reduzierte-stoffpakete" title="Reduzierte Stoffpakete" data-label="Reduzierte Stoffpakete">
                Reduzierte Stoffpakete
              </a>
            </li>
                          </ul>
            <ul class="col-5">
                                      <li>
              <a href="/reduzierte-weihnachtsstoffe" title="Reduzierte Weihnachtsstoffe" data-label="Reduzierte Weihnachtsstoffe">
                Reduzierte Weihnachtsstoffe
              </a>
            </li>
                                      <li>
              <a href="/reduziertes-naehzubehoer" title="Reduziertes Nähzubehör" data-label="Reduziertes Nähzubehör">
                Reduziertes Nähzubehör
              </a>
            </li>
                                      <li>
              <a href="/stoffreste" title="Stoffreste" data-label="Stoffreste">
                Stoffreste
              </a>
            </li>
                                    </ul>
        </div>
      </div>
    </section>//-->
  </nav>
</template>

<script>
  export default {
    name  : 'AppMegaMenue',

    data() {
      return {
        navigation : null
      }
    },

    created() {
      this.$root.$on('onNavigationData', data => {
        this.$data.navigation = data;
      });
    },

    mounted() {
    }
  }
</script>