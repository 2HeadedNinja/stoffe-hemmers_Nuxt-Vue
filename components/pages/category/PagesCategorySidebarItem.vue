<template>
	<li>
		<a :href="link">
			<slot></slot>
		</a>
	</li>
</template>

<script>
	export default {
		name : 'PagesCategorySidebarItem',

		props : {
      link : {
        type : String,

        default() {
          return null;
        }
      }
    },
	}
</script>