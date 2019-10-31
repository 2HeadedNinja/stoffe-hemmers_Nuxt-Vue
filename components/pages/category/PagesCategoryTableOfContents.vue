<template>
  <aside v-if="tableOfContent">
    <nav>
      <h6>Inhaltsverzeichnis</h6>
      <ol>
        <li v-for="(obj, index) in tableOfContent" v-bind:key="index">
          <PagesCategoryTableOfContentsLabel :DOMobj="obj.obj" @TableOfContentsLabelClick="labelClick">{{ obj.label }}</PagesCategoryTableOfContentsLabel>
          <ol v-if="obj.sub">
            <li v-for="(sub, index) in obj.sub" v-bind:key="index">
              <PagesCategoryTableOfContentsLabel :DOMobj="sub.obj" @TableOfContentsLabelClick="labelClick">{{ sub.label }}</PagesCategoryTableOfContentsLabel>
            </li>
          </ol>
        </li>
      </ol>
    </nav>
  </aside>
</template>

<script>
  import PagesCategoryTableOfContentsLabel from '~/components/pages/category/PagesCategoryTableOfContentsLabel'

  export default {
    name : 'PagesCategoryTableOfContents',

    components : {
      PagesCategoryTableOfContentsLabel
    },

    props : {
      tableOfContent : {
        type : Array,

        default() {
          return null;
        }
      }
    },

    methods : {
      labelClick(y = false) {
        if(y !== false) {
          window.scrollTo({
            top       : y, 
            behavior  : 'smooth'
          });
        }
      }
    }
  }
</script>

<style lang="scss">
  .product__listing-category__description {
    aside {
      grid-column                     : span 4;

      nav {
        position                      : sticky;
        top                           : 20px;

        ol,
        ol li {
          margin                      : 0;
          padding                     : 0;

          list-style-type             : none;
        }

        ol {
          li {
            position                : relative;
            counter-increment       : section; 

            margin                  : 0 0 20px 0;
            padding                 : 0 0 0 20px;

            color                   : tint(dark,1);

            &:before {
              content               : counter(section) ".";

              position              : absolute;
              top                   : 0;
              left                  : 0;
              bottom                : 0;
              z-index               : 1;
              min-width             : 20px;
              letter-spacing        : 1px;

              background-color      : $white;
            }

            ol {
              margin                : 20px 0 0 8px;

              li {
                counter-increment   : subsection;

                margin              : 0 0 20px 0;
                padding             : 0 0 0 30px;

                &:after {
                  left              : 0;
                }

                &:before {
                  content           : counter(section) "." counter(subsection) ".";
                  min-width         : 30px;
                }

                &:last-of-type {
                  margin            : 0;

                  &:after {
                    display         : none;
                  }
                }
              }
            }
          }

          [class="product__listing-category__tableofcontents__button"] {
            @include animate(color,.25s);

            display                   : block;
            width                     : 100%;
            cursor                    : pointer;

            position                  : relative;
            z-index                   : 0;

            border                    : none;
            background-color          : transparent;

            font-size                 : 16px;
            font-weight               : 400;
            line-height               : 160%;
            text-align                : left;

            color                     : tint(dark,3);

            &:hover {
              color                   : tint(brand);
            }

            &:after {
              content                 : '';
              display                 : block;

              position                : absolute;
              bottom                  : 7px;
              left                    : 14px;

              width                   : 100%;
              border-bottom           : 1px dotted $border-light;
            }

            span {
              position                : relative;
              z-index                 : 1;

              padding                 : 0 10px 0 0;
              background-color        : $white;
            }
          }
        }
      }
    }
  }
</style>