<template>
  <div id="app">
    <div id="wrap">
      <div class="container">
        <v_header></v_header>
        <router-view></router-view>
        <v_footer></v_footer>
      </div>
      <!--<passport-clients></passport-clients>-->
      <!--<passport-authorized-clients></passport-authorized-clients>-->
      <!--<passport-personal-access-tokens></passport-personal-access-tokens>-->
    </div>
  </div>
</template>
<script>
  import V_header from './components/V_header.vue';
 // import Index from './components/Index.vue';
  import V_footer from './components/V_footer.vue';
  export default {
    name: 'app',
    components: {
        V_header,

        V_footer,


    },

  };
</script>
