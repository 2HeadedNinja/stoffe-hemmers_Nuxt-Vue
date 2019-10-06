<template>
	<nav v-if="!hasData" class="category__sidebar-skelleton">
		<span class="category__sidebar-skelleton__back"></span>
		<span class="category__sidebar-skelleton__current"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
		<span class="category__sidebar-skelleton__link"></span>
	</nav>
	<nav v-else-if="hasData" class="category__sidebar">
    <ul>
      <li class="back">
        <a href="#">
          <svg role="img" class="icon" title="Zurück" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
            <use xlink:href="/library/distributed/svg/sprite.svg#arrow-left-thick"></use>
          </svg>    
          Zurück        
        </a>
      </li>
      <li class="current back" data-id="60">
        <a href="#">Dekostoffe</a>
      </li>
      <li>
        <a href="#">Bettwäschestoffe</a>
      </li>
      <li>
        <a href="#">Dekostoffe Digitaldruck</a>
      </li>
      <li>
        <a href="#">Extrabreite &amp; Raumhohe Dekostoffe</a>
      </li>
      <li>
        <a href="#">Gardinen &amp; Vorhänge</a>
      </li>
      <li>
        <a href="#">Kissen- &amp; Deckenstoffe</a>
      </li>
      <li>
        <a href="#">Landhausstoffe</a>
      </li>
      <li>
        <a href="#">Markisenstoffe</a>
      </li>
      <li>
        <a href="#">Möbelstoffe</a>
      </li>
      <li>
        <a href="#">Outdoorstoffe</a>
      </li>
      <li>
        <a href="#">Tischdeckenstoffe</a>
      </li>
      <li>
        <a href="#">Kinder Dekostoffe</a>
      </li>
    </ul>
  </nav>
</template>

<script>
	export default {
		name : 'PagesCategorySidebar',

		data() {
			return {
				hasData 								: false
			}
		},

		created() {

		},

		mounted() {
			const __rect = this.$el.getBoundingClientRect();
			const __h 	 = Math.ceil(Math.max(document.documentElement.clientHeight, window.innerHeight || 0) * .8);

			if(__rect.height <= __h) {
				this.$el.classList.add('sticky');
			}
		}
	}
</script>

<style lang="scss">
	[class*="category__sidebar"] {
		&.sticky {
			position 									: sticky;
			top 											: 20px;
		}
	}

	.category__sidebar-skelleton {
		span {
			display 									: block;

			&:before {
				content 								: '';
				display 								: block;
				
				background-color 				: $skelleton;

				width 									: 100%;
				height 									: 24px;

				border-radius 					: 12px;
			}

			&[class*="__back"] {
				&:before {
					width 								: 30%;
				}
			}

			&[class*="__back"],
			&[class*="__current"] {
				margin-bottom 					: 20px;
				padding-bottom 					: 20px;
				border-bottom 					: 1px dotted $border-light;
			}

			&[class*="__link"] {
				margin-bottom 					: 20px;

				&:last-of-type {
					margin-bottom 				: 0;
				}
			}
		}
	}

	.category__sidebar {
		ul,
		ul li {
			margin 										: 0;
			padding 									: 0;
		}

		ul {
			li {
				list-style-type 				: none;

				svg {
					width 								: 20px;
					height 								: 20px;

					background-color 			: #ff00ff;
				}
			}
		}
	}
</style>