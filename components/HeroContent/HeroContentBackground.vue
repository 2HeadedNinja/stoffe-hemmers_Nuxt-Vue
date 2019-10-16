<template>
  <div v-if="backgroundData.image" class="layout__herocontent__image-background">
    <img :src="backgroundData.image" alt="" />
  </div>
  <video v-else-if="(backgroundData.mp4 || backgroundData.ogv) && !backgroundData.image" class="layout__herocontent__video-background" muted="muted" playinline="playinline" preload="auto" > 
    <source v-if="backgroundData.mp4" :src="backgroundData.mp4" type="video/mp4"> 
    <source v-if="backgroundData.ogv" :src="backgroundData.ogv" type="video/ogv"> 
  </video>
</template>

<script>
  // -> https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4
  // -> https://lib.shcdn.de/videos/nuxt__cherry_blossom.mp4
  // -> https://lib.shcdn.de/videos/nuxt__sewing_teaching.mp4
  // -> https://lib.shcdn.de/videos/nuxt__strawberry-falling.mp4
  // -> https://images.shcdn.de/resized/original/wpi/nuxt__living-room-modern.jpg
  // -> https://images.shcdn.de/resized/original/wpi/nuxt__comfortable-room.jpg

  export default {
    name  : 'HeroContentBackground',
    
    props : {
      backgroundData : {
        type : Object,

        default() {
          return {
            image : null,
            mp4   : null,
            ogv   : null
          }
        }
      }
    }
  }
</script>