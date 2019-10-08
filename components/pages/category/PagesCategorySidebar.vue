<template>
	<nav v-if="!navigation" class="category__sidebar-skelleton">
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
	<nav v-else-if="navigation" class="category__sidebar">
    <ul>
      <li v-if="navigation.back" class="category__sidebar__back">
        <a :href="navigation.back.link">
        	{{ navigation.back.label }}
        </a>
      </li>
      <li v-if="navigation.current" class="category__sidebar__current">
        <a :href="navigation.current.link">{{ navigation.current.label }}</a>
      </li>
      <PagesCategorySidebarItem v-if="navigation.links" v-for="(link, index) in navigation.links" v-bind:key="index" :link="link.link">
      	{{ link.label }}
      </PagesCategorySidebarItem>
    </ul>
  </nav>
</template>

<script>
  import PagesCategorySidebarItem from '~/components/pages/category/PagesCategorySidebarItem';

	export default {
		name 				: 'PagesCategorySidebar',

		components  : {
      PagesCategorySidebarItem
    },

		data() {
			return {
				navigation : false
			}
		},

		created() {

		},

		mounted() {
      this.$axios.$post('/api/navigation.ajax.php',{
          route     : this.id
        })
        .then(response => {
        	if(response.error === false) {
        		this.$data.navigation = response.navigation;
        	}
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
		},

		updated() {
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
				line-height 						: 135%;

				margin 									: 0 0 1px 0;

				svg {
					width 								: 20px;
					height 								: 20px;

					background-color 			: #ff00ff;
				}

				a {
					@include animate(color,.25s);

					display 							: block;

					text-decoration 			: none;
					color 								: tint(dark,3);
					font-weight 					: 500;

					padding 							: 7px 0 7px 0;

					&:hover {
						color 							: tint(brand);
					}
				}

				&[class*="__back"],
				&[class*="__current"] {
					border-bottom 				: 1px dotted $border-light;
				}

				&[class*="__back"] {
					a {
						padding 						: 0 0 14px 0;
						font-size 					: 14px;
					}
				}

				&[class*="__current"] {
					a {
						padding 						: 14px 0 14px 0;
					}
				}
			}
		}
	}
</style>